<?php

 namespace Helpers;

 use Intervention\Image\Facades\Image;
 use Illuminate\Support\Facades\DB;

 class Auxcode
 {

     function encodePicture($input)
     {
         $resize = 400;
         return Image::make($input)->resize($resize, $resize, function ($constraint) {
             $constraint->aspectRatio();
         })->encode('jpeg');
     }

     public function assignImage($sector){
        if($sector == "Restaurante"){
            return 'restaurant-profile.svg';
        }else if($sector == "Bar"){
            return 'bar-profile.svg';
        }else if($sector == "Comercio"){
            return 'commerce-profile.svg';
        }else if($sector == "Tecnología"){
            return 'tech-profile.svg';
        }else if($sector == "Atención al cliente"){
            return 'client-profile.svg';
        }else if($sector == "Marketing"){
            return 'marketing-profile.svg';
        }else if($sector == "Entretenimiento"){
            return 'entertainment-profile.svg';
        }else if($sector == "Otro"){
            return 'default-employer-profile.svg';
        }
    }


    public function avgQuestion($id){

        $q1 = DB::table('surveys')
        ->where('receiver', '=', $id)  /* $request->receiver */
        ->select(\DB::raw('AVG(q1) as q1_avg'))
        ->get();

        $q2 = DB::table('surveys')
        ->where('receiver', '=', $id)  /* $request->receiver */
        ->select(\DB::raw('AVG(q2) as q2_avg'))
        ->get();

        $q3 = DB::table('surveys')
        ->where('receiver', '=', $id)  /* $request->receiver */
        ->select(\DB::raw('AVG(q3) as q3_avg'))
        ->get();

        $q4 = DB::table('surveys')
        ->where('receiver', '=', $id)  /* $request->receiver */
        ->select(\DB::raw('AVG(q4) as q4_avg'))
        ->get();

        $q5 = DB::table('surveys')
        ->where('receiver', '=', $id)  /* $request->receiver */
        ->select(\DB::raw('AVG(q5) as q5_avg'))
        ->get();

        $datas = array((float)$q1[0]->q1_avg, (float)$q2[0]->q2_avg, (float)$q3[0]->q3_avg, (float)$q4[0]->q4_avg, (float)$q5[0]->q5_avg);

        return $datas;
    }

    public function calculateScore(){
        
        foreach ($users as $user) {
            //$users = User::where('id', $employer->id_user)->get();

            $hasVacancies = Vacancy::select(['vacancies.*'])
            ->where('vacancies.id_employer','=', $employer->id)
            ->count();
            array_push($count, strval($hasVacancies));
            
        }
    }
 }