<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitude extends Model
{
    use HasFactory;

    protected $fillable = [
        'document',
        'email',
        'name',
        'company',
        'location',
        'phone',
        'sector',
        'description',
        'state'
    ];
}
