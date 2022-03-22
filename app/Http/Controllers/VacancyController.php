<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\Employer;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = (Employer::join("vacancies", "vacancies.id_employer","=","employers.id")
        ->join("users", "users.id", "=", "employers.id_user")
        ->select("users.name","employers.company","users.email","vacancies.job","employers.location","users.phone", "vacancies.profile","vacancies.availability", "vacancies.payment","vacancies.id")
        ->orderby("vacancies.created_at", "desc")
        ->get());
        return view('dashboard.vacancies.index',['vacancies'=> $lista]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.vacancies.create',['vacancies'=>new Vacancy()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_user = auth()->user()->id;
        $employer = (Employer::where('id_user', $id_user)->get())[0];
        $id_employer = $employer->id;
        
        $vacancy = new Vacancy();
        $vacancy->id_employer = $id_employer;
        $vacancy->job = $request->job;
        $vacancy->profile = $request->profile;
        $vacancy->payment = $request->payment;
        $vacancy->availability = $request->availability;
  
        $vacancy->save();

        return back()->with('status','Vacante creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacancy = (Vacancy::where('id', $id)->get())[0];

        return view('dashboard.vacancies.edit',['vacancy'=>$vacancy]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vacancy = (Vacancy::where('id', $id)->get())[0];      
        $vacancy ->job = $request->job;
        $vacancy ->profile = $request->profile;
        $vacancy ->payment = $request->payment;
        $vacancy ->availability = $request->availability ;
       // $vacancy ->hidden = $request->hidden;

        $vacancy ->save();
      
        return back()->with('status', 'Experiencia actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
         $vacancy = (Vacancy::where('id', $id)->get())[0];
         $vacancy->delete();
         return back()->with('status', "La vacante ha sido eliminada con éxito");
        
    }

    public function index_perfil(){

        $id_user = auth()->user()->id;
        $employer = (Employer::where('id_user', $id_user)->get())[0];
        $id_employer = $employer->id;

        $lista = (Vacancy::select("vacancies.job", "vacancies.profile","vacancies.availability", "vacancies.payment","vacancies.id")
                 ->where("vacancies.id_employer","=",$id_employer)
                 ->get());

        return view('dashboard.vacancies.index_perfil',['vacancies'=> $lista, 'id_user'=> $id_user]);
    }
}
