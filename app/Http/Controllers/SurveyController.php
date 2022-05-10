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
        

        return view('dashboard.partials.bar-chart', compact('datas'));
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