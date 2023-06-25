<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';

    protected $fillable = [
        'tipo_vehiculo',
        'placa',
        'chasis',
        'marca',
        'modelo',
        'motor',
        'kilometraje',
        'cilindraje',
        'capacidad_carga',
        'capacidad_pasajeros'
    ];
    
    public $timestamp = false;
}
