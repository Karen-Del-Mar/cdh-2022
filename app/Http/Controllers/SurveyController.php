<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Employer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SurveyRequest;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurveyRequest $request)
    {  
      Survey::create($request->validated());

       if (auth()->user()->rol->key=='employer') {
        $receiver = (Student::where('id_user', $request->receiver)->get())[0];
       }else {
        $receiver = (Employer::where('id_user', $request->receiver)->get())[0];  
       }
      
        $suma = DB::table('surveys')
        ->where('receiver', '=', $request->receiver)
        ->sum(\DB::raw('(q1 + q2 + q3 + q4 + q5)/5'));
        
        $cant = Survey::where('receiver', '=', $request->receiver)->count();
        
        $score = $suma/$cant;

        $receiver->score = $score;
        $receiver->save();
       
        return redirect()->route('home')->with('status', 'Hecho');     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(SurveyRequest $request, Survey $survey)
    {
        $survey->update($request->validated());
        return redirect()->route('home')->with('status', 'Hecho');       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        //
    }
    public function createSurvey($id_receiver)
    {
        $edit = Survey::where('receiver',$id_receiver)
                        ->where('emitter', auth()->user()->id)
                        ->count();
       
        if($edit>=1){
            $survey = (Survey::where('receiver',$id_receiver)
            ->where('emitter', auth()->user()->id)
            ->get())[0];
            return view('dashboard.surveys.edit',['survey'=> $survey, 'id_receiver'=> $id_receiver]);
        }

        return view('dashboard.surveys.create',['survey'=> new Survey(), 'id_receiver'=> $id_receiver]);
    }

    public function barchart(){
        $users = Student::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        $months = Student::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');
        
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index => $month) {
           $datas[$month-1] = $users[$index];
        }

        $employers = Employer::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        

        $months2 = Employer::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))->pluck('month');
        
       // dd($months2);
        $datas2 = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months2 as $index => $month) {
           $datas2[$month-1] = $employers[$index];
        }

        $employer = Employer::select(DB::raw("COUNT(*) as count"))->groupBy(DB::raw("sector"))
        ->pluck('count');

        $sector_employer = Employer::select(DB::raw("sector"))->groupBy(DB::raw("sector"))->pluck('sector');
        //DB::table('employers')->get()->groupBy('sector');

        for($i=0; $i<sizeof($sector_employer); $i++ ){
            if ($sector_employer[$i]=="Restaurante") {
                $sector_employer[$i]=0;
            } else if ($sector_employer[$i]=="Bar") {
                $sector_employer[$i]=1;
            }  else if ($sector_employer[$i]=="Comercio") {
                $sector_employer[$i]=2;
            } else if ($sector_employer[$i]=="Entretenimiento") {
                $sector_employer[$i]=3;
            } else if ($sector_employer[$i]=="Atención al cliente") {
                $sector_employer[$i]=4;
            } else if ($sector_employer[$i]=="Marketing") {
                $sector_employer[$i]=5;
            }else if ($sector_employer[$i]=="Tecnología") {
                $sector_employer[$i]=6;
            }else {
                $sector_employer[$i]=7;
            }                     
        }

        $sectors = array(0,0,0,0,0,0,0,0);
        foreach ($sector_employer as $index => $sector) {
           $sectors[$sector] = $employer[$index];
        }

        $student = Student::select(DB::raw("COUNT(*) as count"))->groupBy(DB::raw("state"))
        ->pluck('count');

        $state_student = Student::select(DB::raw("state"))->groupBy(DB::raw("state"))->pluck('state');
        
        for($i=0; $i<sizeof($state_student); $i++ ){
            if ($state_student[$i]=="Postulado") {
                $state_student[$i]=0;
            } else if ($state_student[$i]=="No postulado") {
                $state_student[$i]=1;
            }  else{
                $state_student[$i]=2;
            }
        }

        $states = array(0,0,0);
        foreach ($state_student as $index => $state) {
           $states[$state] = $student[$index];
        }

        return view('dashboard.partials.bar-chart', compact('datas','datas2', 'sectors','states'));
    }

    public function avgQuestion(){

        $q1 = DB::table('surveys')
        ->where('receiver', '=', 2)  /* $request->receiver */
        ->select(\DB::raw('AVG(q1) as q1_avg'))
        ->get();

        $q2 = DB::table('surveys')
        ->where('receiver', '=', 2)  /* $request->receiver */
        ->select(\DB::raw('AVG(q2) as q2_avg'))
        ->get();

        $q3 = DB::table('surveys')
        ->where('receiver', '=', 2)  /* $request->receiver */
        ->select(\DB::raw('AVG(q3) as q3_avg'))
        ->get();

        $q4 = DB::table('surveys')
        ->where('receiver', '=', 2)  /* $request->receiver */
        ->select(\DB::raw('AVG(q4) as q4_avg'))
        ->get();

        $q5 = DB::table('surveys')
        ->where('receiver', '=', 2)  /* $request->receiver */
        ->select(\DB::raw('AVG(q5) as q5_avg'))
        ->get();

        $count= Survey::where('receiver','=',2)->get()->count();
        $datas = array((float)$q1[0]->q1_avg, (float)$q2[0]->q2_avg, (float)$q3[0]->q3_avg, (float)$q4[0]->q4_avg, (float)$q5[0]->q5_avg);

        return view('dashboard.partials.rating-user', compact('datas'));
    }
}