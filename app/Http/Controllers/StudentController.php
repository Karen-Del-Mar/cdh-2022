<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Survey;
use App\Models\Contract;
use App\Models\Skill;
use App\Models\Skillsstudent;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Helpers\auxCode;

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
        $skills = Skill::pluck('id','skill');
        return view('dashboard.students.create', ['skills'=>$skills]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {   
        try {
            $user = User::create($request->validated());
            $user->password = Hash::make($request->document);

            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $name = time().$file->getClientOriginalName();
                $file->move(public_path().'/images/students-profiles/', $name); 
                $user -> avatar = $name;
            }
            $user->save();
        
            $student = new Student();
            $student->id_user=$user->id;
            $student->fill($request->validated());
            $student->save();
        } catch(\Illuminate\Database\QueryException $ex){
            
            return back()->with('status','La solicitud no fue aceptada, verifique los datos ingresados');
          }
          $skills = Skill::get()->count();
       
          for ($i=1; $i <=$skills; $i++) { 
              $n = "skill".$i;
              if($request->$n !== null){
                  $skill = new Skillsstudent(); 
                  $skill->id_student = $student->id;
                  $skill->id_skill = $request->skill.$i;
                  $skill->save();
              }
         }   
        return redirect()->route('login')->with('status','Usuario registrado, inicie sesión con correo y número de documento');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id, Auxcode $codifica)
    {   
        $datas = $codifica->avgQuestion($id);

        $user = (User::where('id', $id)->get())[0];
        $student = (Student::where('id_user', $id)->get())[0];

        $count= Survey::where('receiver','=',$id)->get()->count();
        $empleo = null;
        $company = null;
        if($student->state=='Contratado'){
            $empleo = (Contract::where('id_student',$student->id)
                        ->join('employers', 'employers.id','contracts.id_employer')
                        ->select('employers.company')->get())[0];
            $company = $empleo -> company;
        }
        $studentSkills = (Skillsstudent::where('id_student',$student->id)
                                    ->join('skills', 'skills.id','skillsstudents.id_skill')
                                    ->select('skills.skill')->get());

        return view('dashboard.students.show',['user'=>$user, 'student'=>$student, 'datas'=>$datas, 'count'=>$count,'empleo'=>$company, 'job_skills'=>$studentSkills]);
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

        $skills = Skill::pluck('id','skill');

        return view('dashboard.students.edit',['user'=>$user, 'student'=>$student, "skills"=>$skills]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $user = (User::where('id', $id)->get())[0];
        
        $student = (Student::where('id_user', $id)->get())[0];

        $user->update($request->validated());
        $student->update($request->validated());

        $skills = Skill::get()->count();
       
        for ($i=1; $i <=$skills; $i++) { 
            $n = "skill".$i;
            if($request->$n !== null){
                $skill = new Skillsstudent(); 
                $skill->id_student = $student->id;
                $skill->id_skill = $request->skill.$i;
                $skill->save();
            }
       }   

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
    public function hasPostulates($id){
        $hasPostulates = Postulate::select(['postulates.*'])
                       ->where('id_student','=',$id)
                       ->count();
        if($hasPostulates>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function hasContracts(){
         $hasContracts = Contract::select(['contracts.*'])
                       ->where('id_student','=',$id)
                       ->count();
        if($hasContracts>0){
            return true;
        }
        else{
            return false;
        }
    }

    public function avgQuestion(){
        
        $q1 = DB::table('surveys')
        ->where('receiver', '=', 2)  /* $request->receiver */
        ->select(\DB::raw('AVG(q1) as q1_avg'))
        ->get();

        $q2 = DB::table('surveys')
        ->where('receiver', '=', 2)  /* $request->receiver */
        ->select(\DB::raw('AVG(q2) as q2_avg'))
        ->get();

        $q3 = DB::table('surveys')
        ->where('receiver', '=', 2)  /* $request->receiver */
        ->select(\DB::raw('AVG(q3) as q3_avg'))
        ->get();

        $q4 = DB::table('surveys')
        ->where('receiver', '=', 2)  /* $request->receiver */
        ->select(\DB::raw('AVG(q4) as q4_avg'))
        ->get();

        $q5 = DB::table('surveys')
        ->where('receiver', '=', 2)  /* $request->receiver */
        ->select(\DB::raw('AVG(q5) as q5_avg'))
        ->get();

       // dd($q1);
    }
}
