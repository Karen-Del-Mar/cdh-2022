<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_employer',
        'job',
        'profile',
        'payment',
        'availability', /** Horario */
        'hidden',
        'state',
        'limit_date',
        'places'
    ];


    public function employer(){
        return $this->belongsTo(Employer::class);
    }

    // relación uno a muchos
    public function postulates(){
        return $this->hasMany(Postulate::class);
    }
}
