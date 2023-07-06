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
        'capacidad_pasajeros',
        'dependencia_id',
        'estado'
    ];
    
    public $timestamp = false;

    public function dependencia()
    {
        return $this->belongsTo(Dependencias::class, 'dependencia_id');
    }
    
}
