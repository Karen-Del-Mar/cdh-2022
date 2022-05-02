<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\Employer;
use App\Models\Postulate;
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
        date_default_timezone_set('America/Bogota');
        $time = date('Y-m-d');     

        $prueba = Vacancy::whereDate('limit_date', '<=', $time)->update(array('state' => 1));

        $lista = (Employer::select("users.name","employers.company","users.email","vacancies.job","employers.location","users.avatar","users.phone", "vacancies.profile","vacancies.availability", "vacancies.payment","vacancies.id", "vacancies.state", "vacancies.limit_date", "vacancies.places")
        ->join("vacancies", "vacancies.id_employer","=","employers.id")
        ->join("users", "users.id", "=", "employers.id_user")
        ->where("vacancies.state", "!=", "2")
        ->orderby("vacancies.id", "DESC")
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
        $vacancy->places = $request->places;
        $vacancy->limit_date = $request->limit_date;

        $vacancy->availability = $request->availability;
  
        $vacancy->save();

       // return back()->with('status','Vacante creada');
        return redirect()->route('vacancies.index')->with('status','Vacante creada');
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
        $vacancy ->availability = $request->availability;
        $vacancy->places = $request->places;
        $vacancy->limit_date = $request->limit_date;
        $vacancy->state = $request->state;
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
        $hasPostulates = Postulate::select(['postulates.*'])
                       ->where('id_vacancy','=',$id)
                       ->count();
        if($hasPostulates>0){
            return back()->with('deleteV', "fail");
        }
        else{
            $vacancy = (Vacancy::where('id', $id)->get())[0];
            $vacancy->delete();
            return back()->with('deleteV', "ok");
        }
       
    }
    public function set_state($id, $state){
       
        $vacancy = (Vacancy::where('id',$id)->get())[0];
        $vacancy->state = $state;
        $vacancy ->save();

        if($state == 0){
            return back()->with('vacaState', 'ok');
        } if($state == 1){
            return back()->with('vacaState', 'expired');
        }
        return back()->with('vacaState', "reported");
    }
/** No se esta usando se usa el de EmployerController*/
    // public function index_perfil(){

    //     $id_user = auth()->user()->id;
    //     $employer = (Employer::where('id_user', $id_user)->get())[0];
    //     $id_employer = $employer->id;

    //     date_default_timezone_set('America/Bogota');
    //     $time = date('Y-m-d');     

    //     $prueba = Vacancy::whereDate('limit_date', '<=', $time)->update(array('state' => 1));
        
    //     $lista = (Vacancy::select("vacancies.job", "vacancies.profile","vacancies.availability", "vacancies.payment","vacancies.id", "vacancies.hidden", "vacancies.places", "vacancies.state")
    //              ->where("vacancies.id_employer","=",$id_employer)
    //              ->get());

    //     return view('dashboard.vacancies.index_perfil',['vacancies'=> $lista, 'id_user'=> $id_user]);
    // }
}
