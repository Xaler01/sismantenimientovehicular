<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignarVehiculo extends Model
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

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculos::class, 'vehiculo_id');
    }
    public function dependencia()
    {
        return $this->belongsTo(Subcircuitos    ::class, 'dependencia_id');
    }
    public function policia1()
    {
        return $this->belongsTo(Policias::class, 'user1_id');
    }

    public function policia2()
    {
        return $this->belongsTo(Policias::class, 'user2_id');
    }

    public function policia3()
    {
        return $this->belongsTo(Policias::class, 'user3_id');
    }

    public function policia4()
    {
        return $this->belongsTo(Policias::class, 'user4_id');
    }
    
}
