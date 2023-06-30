<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policias extends Model
{
    use HasFactory;

    protected $table = 'users';

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
        'id_dependencia',
        'rol'

    ];

    //public $timestamps = false;

    public function dependenciaid()
    {
        return $this->belongsTo(Dependencias::class,'id_dependencia');
    }
}
