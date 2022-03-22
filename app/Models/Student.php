<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id_user',
        'birthday',
        'gender',
        'career', 
        'semester',
        'average',
        'eps',
        'blood_type',
        'job_skills', 
        'office_tools', 
        'work_experience',
        'languages',
        'basic_tools',
        'score', 
        'hidden',
    ];

    public function rol(){
        return $this->belongsTo(User::class);
    }
}
