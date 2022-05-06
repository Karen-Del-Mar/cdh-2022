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
    public function update(Request $request, Survey $survey)
    {
        //
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
        return view('dashboard.surveys.create',['survey'=> new Survey(), 'id_receiver'=> $id_receiver]);
    }

    public function barchart(){
        $users = User::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');

        $months = User::select(DB::raw("Month(created_at) as month"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('month');
        
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index => $month) {
           $datas[$month-1] = $users[$index];
        }
        

        return view('dashboard.partials.bar-chart', compact('datas'));
    }
}