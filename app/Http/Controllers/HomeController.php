<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Solicitude;
use App\Models\Postulate;
use App\Models\Vacancy;
use App\Models\Contract;
use App\Models\Employer;
use App\Models\Experience;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lista = User::get();
        if(auth()->user()->rol->key=='admin')
        {
            $lista = Solicitude::where("state","=",1)
                            ->get();
            $lista_student = User::where("rol_id","=",3)->join("students","students.id_user","=","users.id")
                            ->get();

            $list_employer_dis = Employer::where("hidden", 1)
                            ->join("users","users.id","=","employers.id_user")
                            ->select("employers.id AS id_employer", "employers.id_user", "users.document", "users.name", "employers.company", "employers.description")
                            ->get();

            $list_vacancies_dis = Vacancy::where("state", 2)
                            ->join("employers","employers.id","=","vacancies.id_employer")
                            ->join("users", "users.id","employers.id_user")
                            ->select("vacancies.job","vacancies.profile","vacancies.availability","vacancies.id","employers.company","users.phone" ,"vacancies.payment")
                            ->get();
            $list_experiences_dis = Experience::where("experiences.hidden", 1)
                            ->join("students","students.id","=","experiences.id_student")
                            ->join("users", "users.id", "=","students.id_user")
                            ->select("users.name", "users.email", "users.phone", "experiences.experience", "experiences.created_at", "experiences.id")
                            ->get();
               
            return view('home', ['lista'=>$lista, 'lista_student'=>$lista_student, 'users'=>$list_employer_dis, 'vacancies'=>$list_vacancies_dis, 'list_exp'=>$list_experiences_dis]);
        }

        if(auth()->user()->rol->key=='employer')
        {
            // $lista = Postulate::get();
            $lista_post = Postulate::join("students","students.id","=","postulates.id_student")
                    ->join("users","users.id","=","students.id_user")
                    ->join("vacancies","vacancies.id","=","postulates.id_vacancy")
                    ->join("employers","employers.id","=","vacancies.id_employer")
                    ->select("postulates.id","postulates.created_at","users.name","users.email","vacancies.job","vacancies.profile", "users.id AS id_user")
                    ->where("postulates.state","=",1)
                    ->where("employers.id_user","=",auth()->user()->id)
                    ->get();

            $lista_student = Contract::join("students", "students.id", "=", "contracts.id_student")
                    ->join("users", "users.id", "=", "students.id_user")
                    ->join("employers", "employers.id", "=", "contracts.id_employer")
                    ->select("users.name", "users.email", "users.phone", "contracts.start_date",
                            "contracts.final_date", "contracts.description", "contracts.payment",
                            "contracts.job", "contracts.state", "contracts.id", "users.id AS id_receiver", "contracts.id AS id_contract")
                    ->where("employers.id_user","=",auth()->user()->id)
                    ->get();

             return view('home', ['lista_post'=>$lista_post, 'lista_student' => $lista_student]);
        }
        if(auth()->user()->rol->key=='student')
        {
            $my_postulates = Postulate::join("students","students.id","=","postulates.id_student")
                    ->join("vacancies","vacancies.id","=","postulates.id_vacancy")
                    ->join("employers","employers.id","=","vacancies.id_employer")
                    ->join("users","users.id","=","employers.id_user")
                    ->select("postulates.id","postulates.created_at","users.name","users.email","employers.company","vacancies.job","vacancies.profile", "users.id AS id_user")
                    ->where("postulates.state","=",1)
                    ->where("students.id_user","=",auth()->user()->id)
                    ->get();

            $my_contracts = Contract::join("students", "students.id", "=", "contracts.id_student")
                    ->join("employers", "employers.id", "=", "contracts.id_employer")
                    ->join("users", "users.id", "=", "employers.id_user")
                    ->select("users.name","employers.company","users.id AS id_receiver","users.email", "users.phone", "contracts.start_date",
                            "contracts.final_date", "contracts.description", "contracts.payment", "contracts.state",
                            "contracts.job")
                    ->orderby("contracts.state", "ASC")
                    ->where("students.id_user","=",auth()->user()->id)
                    ->get();

            return view('home', ['my_postulates'=>$my_postulates, 'my_contracts' => $my_contracts]);
        }

        return view('home');
    }
}
