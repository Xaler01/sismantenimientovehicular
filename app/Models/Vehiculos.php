<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculos extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';

    protected $fillable = [
        'tipo_vehiculo_id',
        'placa',
        'chasis',
        'marca_id',
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
        return $this->belongsTo(Subcircuitos::class, 'dependencia_id');
    }

    public function tipoVehiculo()
    {
        return $this->belongsTo(TipoVehiculos::class, 'tipo_vehiculo_id');
    }
 
    public function marcas()
    {
        return $this->belongsTo(Marcas::class, 'marca_id');
    }


    public function asignarVehiculo()
    {
        return $this->hasOne(AsignarVehiculo::class, 'marca_id');
    }
}
