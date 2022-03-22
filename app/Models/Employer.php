<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'company',
        'location',
        'sector',
        'description',
        'score',
        'hidden',
       
    ];

    public function rol(){
        return $this->belongsTo(User::class);
    }
}
