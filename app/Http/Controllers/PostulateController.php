<?php

namespace App\Http\Controllers;

use App\Models\Postulate;
use App\Models\Student;
use App\Models\User;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class PostulateController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_user = $request->id_user;
        $student = (Student::where('id_user', $id_user)->get())[0];

        try {
            $postulation = new Postulate();
            $postulation->id_student = $student->id;
            $postulation->id_vacancy = $request->id_vacancy;
            $postulation->save();

            return redirect()->route('home')->with('status','Postulación enviada');
          } catch(\Illuminate\Database\QueryException $ex){

            return redirect()->route('vacancies.index')->with('status','Ya estás postulado a esta vacante');
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postulate  $postulate
     * @return \Illuminate\Http\Response
     */
    public function show($id_postulate)
    {
        $postulate = (Postulate::where('id', $id_postulate)->get())[0];
        $student = (Student::where('id',$postulate->id_student)->get())[0];

        $user = (User::where('id',$student->id_user)->get())[0];

        $vacancy = (Vacancy::where('id', $postulate->id_vacancy)->get())[0];


        return view('dashboard.postulates.show',['user'=>$user,'vacancy'=>$vacancy,'postulate'=>$postulate, 'student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postulate  $postulate
     * @return \Illuminate\Http\Response
     */
    public function edit(Postulate $postulate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postulate  $postulate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postulate $postulate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postulate  $postulate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postulate $postulate)
    {
        //
    }
}
