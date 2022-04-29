<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'q1',
        'q2',
        'q3',
        'q4',
        'q5',
        'emitter',
        'receiver'
    ];

    public function student(){
        return $this->belongsTo(User::class);
    }
    public function employer(){
        return $this->belongsTo(User::class);
    }
}
