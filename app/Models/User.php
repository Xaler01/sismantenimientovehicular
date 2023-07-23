<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     
    protected $fillable = [
        'name',
        'email',
        'password',
        'cedula',
        'fecha_nacimiento',
        'tipo_sangre',
        'ciudad_nacimiento',
        'celular',
        'rango',
        'rol'
    ];
    */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cedula',
        'fecha_nacimiento',
        'tipo_sangre_id',
        'ciudad_nacimiento_id',
        'celular',
        'rango_id',
        'dependenci_id',
        'rol',
        'estado_id'
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
        'password' => 'hashed',
    ];

  
    public function personalSubcircuito()
    {
        return $this->hasOne(PersonalSubcircuito::class, 'user_id', 'id')->with('dependencia');
    } 

    public function dependencia()
    {
        return $this->belongsTo(Subcircuitos::class, 'dependencia_id');
    }
}
