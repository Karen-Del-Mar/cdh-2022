<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Postulate;
use App\Models\Vacancy;
use App\Models\Student;
use App\Http\Requests\ContractRequest;

use Illuminate\Http\Request;



class ContractController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista_employer = Contract::join("employers", "employers.id", "=", "contracts.id_employer")
            ->join("users", "users.id", "=", "employers.id_user")
            ->select("users.name", "employers.company")
            ->get();

        $lista_student = Contract::join("students", "students.id", "=", "contracts.id_student")
            ->join("users", "users.id", "=", "students.id_user")
            ->select("users.name", "users.email", "users.phone", "contracts.start_date",
                    "contracts.final_date", "contracts.description", "contracts.payment",
                    "contracts.job")
            ->get();

        return view('dashboard.contracts.index',
                    ['lista_employer' => $lista_employer, 'lista_student' => $lista_student]);
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
    public function store(ContractRequest $request)
    {
        Contract::create($request->validated());

        $student = (Student::where('id', $request->id_student)->get())[0];
        $student->state = 'Contratado';
        $student->save();
    
        return redirect()->route('home')->with('status','Contrato realizado');
       // return view('home', ['lista_post' => $lista_post, 'lista_student' => $lista_student])->with('status', 'Contrato creado exitosamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }

    public function create_contract($id_student, $id_postulate)
    {

        $postulados = (Postulate::where('id', $id_postulate)->get())[0];
        $postulados->state = 2;
        $postulados->save();

        $id_student = $postulados->id_student;

        $vacancy = (Vacancy::where('id',$postulados->id_vacancy)->get())[0];
        // return redirect()->route('home')->with('status','Solicitud aceptada');
        return view('dashboard.contracts.create', ['contract' => new Contract(), 'id' => $id_student,'vacancy'=>$vacancy]);
    }

}
