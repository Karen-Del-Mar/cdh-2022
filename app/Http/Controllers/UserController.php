<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employer;
use App\Models\Solicitude;
use App\Models\Vacancy;
use App\Models\Student;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Adldap\Laravel\Facades\Adldap;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // Listar solo las empresas 
        // Envia lista de empresas y lista de usuarios asociados a esas empresas
        // $users;

        // $employers = Employer::get();

        // foreach ($employers as $employer) {
        //     $users = User::where('id', $employer->id_user)->get();

        // }

        // return view('dashboard.employers.index',['users'=>$users,'employers'=>$employers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  LDAP
        // $adldap = Adldap::getFacadeRoot();
        //     $user = $adldap->search()
        //         ->users()
        //         ->findBy('samaccountname', 'karend.patinog');

       $user = new User();
        $user->comprobarUsuario();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = (User::where('id', $id)->get())[0];

        if($user->rol_id == 2){           
            //return view('dashboard.employers.show',['user'=>$user, 'employer'=>$employer, 'vacancies'=>$lista]);
            return redirect()->route('employer.show',[$id]);
        }
       
        if($user->rol_id == 3){
           /// $student = (Student::where('id_user', $id)->get())[0];

            return redirect()->route('student.show',[$id]);

        }     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function accept_request(StoreUserRequest $request, $id){
    //     // Cambiar estado de solicitud
    //     // Estado:  2 => solicitud aceptada

    //     $solicitudes = (Solicitude::where('id',$id)->get())[0];
    //     $solicitudes->state = 2;
    //     $solicitudes->save();

    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = Hash::make($request->password);
    //     $user->document = $request->document;
    //     $user->phone = $request->phone;
    //     $user->rol_id='2';
    //     $user->save();
      
    //     $id_user=$user->id;

    //     $employer = new Employer();
    //     $employer->id_user=$id_user;
    //     $employer->company=$request->company;
    //     $employer->location=$request->location;
    //     $employer->description=$request->description;
    //     $employer->score=0;
    //     $employer->hidden=0;

    //     $employer->save();

    //     return redirect()->route('home')->with('status','Solictud aprobada exitosamente');
    // }
}
