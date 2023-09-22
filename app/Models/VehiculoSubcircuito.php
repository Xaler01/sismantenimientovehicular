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
        'dependencia_id',
        'user1_id',
        'user2_id',
        'user3_id',
        'user4_id'
    ];

    public function dependencia()
    {
        return $this->belongsTo(Subcircuitos::class, 'dependencia_id');
    }
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculos::class, 'vehiculo_id');
    }
}