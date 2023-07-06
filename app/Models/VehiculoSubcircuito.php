<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculoSubcircuito extends Model
{
    use HasFactory;

    protected $table = 'vehiculo_subcircuito';
    protected $fillable = [
        'vehiculo_id',
        'dependencia_id'
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }
}