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
            return back()->with('postulated', 'ok'); // a donde direccionar? perfil, home, vacancies index?
           // return redirect()->route('home')->with('status','Postulación enviada');
          } catch(\Illuminate\Database\QueryException $ex){
            
            return redirect()->route('vacancies.index')->with('postulated','no');
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postulate  $postulate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $postulate = (Postulate::where('id', $id)->get())[0];
        $postulate->delete();
        return redirect()->route('home')->with('deletePost','ok');
    }
    /**
    * Lista las postulaciones según la vacante seleccionada 
    */
    public function postulate_vacancy($id_vacancy){

        $lista = Postulate::join("students","students.id","=","postulates.id_student")
        ->join("users","users.id","=","students.id_user")
        ->select("postulates.id","postulates.created_at","users.name","users.email", "users.id AS id_user", "students.career")
        ->where("postulates.state","=",1)
        ->where("postulates.id_vacancy", "=",$id_vacancy )
        ->get();

        return view('dashboard.postulates.index_postulateforv', ['lista'=>$lista]);
    }
}
