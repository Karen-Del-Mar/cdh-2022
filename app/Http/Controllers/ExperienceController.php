<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Student;
use Illuminate\Http\Request;

class ExperienceController extends Controller
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
        $lista_experience = Experience::
        select("experiences.experience", "experiences.created_at", "users.name","rols.rol", "users.id AS id_user", "experiences.id", "experiences.hidden")
        ->from("experiences")
        ->join("students","experiences.id_student", "=", "students.id")
        ->join("users", "students.id_user","=","users.id")
        ->join("rols","users.rol_id","=","rols.id")
        ->orderby("experiences.created_at", "desc")
        ->get();

        $hasComments = Experience::select(['experiences.*'])
                       ->count();

        return view('dashboard.experiences.create', ['experience' => new Experience(), 'lista'=>$lista_experience, 'comments'=>$hasComments]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $id = auth()->user()->id;
        
        $student = (Student::where('id_user', $id)->get())[0];
        $id_student = $student-> id;

        $experience = new Experience();
        $experience ->experience = $request->experience;
        $experience ->id_student = $id_student;
        $experience ->save();
      
        return back()->with('status', 'Experiencia registrada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {            
        $experience = (Experience::where('id', $id)->get())[0];      
        $experience ->experience = $request->experience;
        $experience ->save();
      
        return back()->with('updated', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = (Experience::where('id', $id)->get())[0];
        $experience->delete();
        return back()->with('deleted', 'ok');
    }
/** Añadir campo hidden a base de datos */
    public function change_hidden($id, $hidden){
        $experience = (Experience::where('id', $id)->get())[0];
        $experience -> hidden = $hidden;
        $experience -> save();
        if($hidden == 1){
            return back()->with('hideExp', 'ok');
        }
        return back()->with('showExp', 'ok');
    }
}
