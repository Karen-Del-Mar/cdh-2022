<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_student',
        'id_vacancy',
        'state'
    ];


    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function vacancy(){
        return $this->belongsTo(Vacancy::class);
    }
}
