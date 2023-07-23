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
        'tipo_sangre_id',
        'ciudad_nacimiento_id',
        'celular',
        'rango_id',
        'dependencia_id',
        'rol',
        'estado_id'
    ];

    //public $timestamps = false;

    public function dependencia()
    {
        return $this->belongsTo(Subcircuitos::class, 'dependencia_id');
    }

    public function tipoSangre()
    {
        return $this->belongsTo(TipoSangre::class, 'tipo_sangre_id');
    }

    public function rango()
    {
        return $this->belongsTo(Rangos::class, 'rango_id');
    }
    
}
