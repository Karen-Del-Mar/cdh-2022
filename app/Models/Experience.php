<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_student',
        'experience'
    ];


    public function student(){
        return $this->hasOne(Student::class,'id_student','id');
    }
}
