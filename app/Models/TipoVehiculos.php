<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoVehiculos extends Model
{
    use HasFactory;
    protected $table = 'tipo_vehiculo';

    protected $fillable = [
        'nombre',
    ];
}