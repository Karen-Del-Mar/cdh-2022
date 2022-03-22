<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Adldap\Laravel\Facades\Adldap;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'document',
        'name',
        'email',
        'password',
        'phone',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function rol(){
        return $this->belongsTo(Rol::class);
    }

    public function comprobarUsuario()
    {

        $primerIngresoEstudiante = false;

      

            $adldap = Adldap::getFacadeRoot();
            $user = $adldap->search()
                ->users()
                ->findBy('samaccountname', $this->getUsername());

            $grupoLdap = implode(' ', $user['memberof']);

            $coincidencia = strpos($grupoLdap, 'Estudiantes');

        

        return ($primerIngresoEstudiante) ? 1 : $this->habilitado;
    }
}
