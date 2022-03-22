<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Solicitude;
use App\Models\Postulate;
use App\Models\Vacancy;

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
            $lista_student = User::where("rol_id","=",3)
                            ->get();

            return view('home', ['lista'=>$lista, 'lista_student'=>$lista_student]);
        }

        if(auth()->user()->rol->key=='employer')
        {
            // $lista = Postulate::get();
            $lista = Postulate::join("users","users.id","=","postulates.id_student")
                    ->join("vacancies","vacancies.id","=","postulates.id_vacancy")
                    ->select("postulates.id","postulates.created_at","users.name","users.email",
                    "vacancies.job","vacancies.profile","users.document","postulates.id_vacancy","vacancies.id_employer")
                    ->where("vacancies.id_employer","=",auth()->user()->id)
                    ->where("postulates.state","=",1)
                    ->get();

             return view('home', ['lista'=>$lista]);
        }
        if(auth()->user()->rol->key=='student')
        {
            $lista = Vacancy::get();
             return view('home', ['lista'=>$lista]);
        }

        return view('home');
    }
}
