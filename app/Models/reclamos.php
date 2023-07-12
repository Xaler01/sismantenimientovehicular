<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reclamos extends Model
{
    use HasFactory;

    protected $fillable = [
        'circuito_id',
        'subcircuito_id',
        'tipo_reclamo_id',
        'detalle',
        'contacto',
        'apellidos',
        'nombres'
    ];

    public function circuito()
    {
        return $this->belongsTo(circuitos::class, 'circuito_id');
    }

    public function subcircuito()
    {
        return $this->belongsTo(subcircuitos::class, 'subcircuito_id');
    }

    public function tiporeclamo()
    {
        return $this->belongsTo(Tiporeclamo::class, 'tiporeclamo_id');
    }
}
