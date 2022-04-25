<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use App\Models\Solicitude;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Helpers\auxCode;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listar solo las empresas que están habilitadas 
        // Envia lista de empresas y lista de usuarios asociados a esas empresas
        $users = null;
        $count = array();
        $employers = Employer::join("users", "users.id","=","employers.id_user")
        ->select("users.avatar","employers.company","employers.sector","employers.id_user", "employers.id")
        ->where("employers.hidden", 0)->get();
        
        foreach ($employers as $employer) {
            //$users = User::where('id', $employer->id_user)->get();

            $hasVacancies = Vacancy::select(['vacancies.*'])
            ->where('vacancies.id_employer','=', $employer->id)
            ->count();
            array_push($count, strval($hasVacancies));
            
        }
        return view('dashboard.employers.index',['employers'=>$employers,'count'=> $count]);
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
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {          
        $user = (User::where('id', $id)->get())[0];
        $employer = (Employer::where('id_user', $id)->get())[0];

        $id_employer = $employer->id;

        $hasVacancies = Vacancy::select(['vacancies.*'])
        ->where('vacancies.id_employer','=', $id_employer)
        ->count();

        $lista = (Vacancy::select("vacancies.job", "vacancies.profile","vacancies.availability", "vacancies.payment","vacancies.id", "vacancies.hidden")
                 ->where("vacancies.id_employer","=",$id_employer)
                 ->get());

        return view('dashboard.employers.show',['user'=>$user, 'employer'=>$employer, 'vacancies'=>$lista, 'count'=>$hasVacancies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $user = (User::where('id', $id)->get())[0];
        $employer = (Employer::where('id_user', $id)->get())[0];
       // $user = (User::where('document', $document)->get())[0];
        if (auth()->user()->rol->key == 'employer'){
            return view('dashboard.employers.edit',['user'=>$user, 'employer'=>$employer]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, $id)
    {   
        /** 
         *  Debería poder editar la cédula?
         */
        $user = (User::where('id', $id)->get())[0];
        $employer = (Employer::where('id_user', $id)->get())[0];

        $user -> name = $request ->name;
        $user -> email = $request ->email;
        $user -> phone = $request ->phone;
        /** Estaba acá */
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/employers-profile/', $name); 
            //$user -> avatar = $request ->file('avatar')->store('public');
            $user -> avatar = $name;
        }
        //$user -> password = $request -> password;

        $user->save();

        $employer -> company = $request -> company;
        $employer -> location = $request -> location;
        $employer -> description = $request -> description;

        $employer ->save();

        return back()->with('status','Perfil actualizado con éxito');
    }

    /**
     * Se usa para deshabilitar un empleador NO ELIMINAR.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employer $employer)
    {
        
    }
    public function accept_request(StoreUserRequest $request, Auxcode $codifica, $id){
        // Hacer un try catch para que no cambie el estado sin guardar el usuario
        // Cambiar estado de solicitud
        // Estado:  2 => solicitud aceptada
        $avatar = $codifica->assignImage($request->sector);
  
        $solicitudes = (Solicitude::where('id',$id)->get())[0];
        $solicitudes->state = 2;
        $solicitudes->save();

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->document = $request->document;
        $user->phone = $request->phone;
        $user->rol_id='2';
        $user->avatar = $avatar;
        $user->save();
      
        $id_user=$user->id;

        $employer = new Employer();
        $employer->id_user=$id_user;
        $employer->company=$request->company;
        $employer->location=$request->location;
        $employer->sector=$request->sector;
        $employer->description=$request->description;
        $employer->score=0;
        $employer->hidden=0;

        $employer->save();

        return redirect()->route('home')->with('status','Solictud aprobada exitosamente');
    }

    public function confirm_disable($id){
        $employer = (Employer::where('id_user', $id)->get())[0];
       
        return view('dashboard.employers.disable',['employer'=>$employer]);
    }

    public function disable_employer($id, $action){
        
        $employer = (Employer::where('id', $id)->get())[0];

        if($action == 1){
            $employer -> hidden = 1;}
        else{
            $employer -> hidden = 0;
        }
        $employer -> save();

        return redirect()->route('employer.index');
    }

    public function disable_list(){
        $users;

        $employers = Employer::where('hidden', 1)->get();

        foreach ($employers as $employer) {
            $users = User::where('id', $employer->id_user)->get();

        }

        return view('dashboard.employers.index',['users'=>$users,'employers'=>$employers]);
    }

    public function index_perfil(){

        $id_user = auth()->user()->id;
        $employer = (Employer::where('id_user', $id_user)->get())[0];
        $id_employer = $employer->id;

        $lista = (Vacancy::select("vacancies.job", "vacancies.profile","vacancies.availability", "vacancies.payment","vacancies.id", "vacancies.hidden")
                 ->where("vacancies.id_employer","=",$id_employer)
                 ->get());

        return view('dashboard.employers.show', ['vacancies'=>$lista]);
        // return view('dashboard.vacancies.index_perfil',['vacancies'=> $lista]);
    }

    
}
