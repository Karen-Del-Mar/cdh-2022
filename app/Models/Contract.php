<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'final_date',
        'job',
        'payment',
        'id_student',
        'id_employer',      
        'description'
    ];


    public function user(){
        return $this->belongsTo(Student::class);
    }

    public function contract(){
        return $this->belongsTo(Employer::class);
    }
}
