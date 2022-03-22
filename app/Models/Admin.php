<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'job',
    ];

    public function rol(){
        return $this->belongsTo(User::class);
    }
}
