<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StudentRequest;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$students = Student::get();
        $lista_student = User::where("rol_id","=",3)
                            ->get();

        return view ('dashboard.students.index',['lista_student'=>$lista_student]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $student = (Student::where('id', $id)->get())[0];
        $user = (User::where('id', $student->id_user)->get())[0];

        return view('dashboard.students.show',['user'=>$user, 'student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $user = (User::where('id', $id)->get())[0];
        
        $student = (Student::where('id_user', $id)->get())[0];

        return view('dashboard.students.edit',['user'=>$user, 'student'=>$student]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, StudentRequest $request2, $id)
    {
        $user = (User::where('id', $id)->get())[0];
        
        $student = (Student::where('id_user', $id)->get())[0];

        $user->update($request->validated());
        $student->update($request2->validated());

        return back()->with('status','Perfil actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
