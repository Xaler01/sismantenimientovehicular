<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudMantenimiento extends Model
{
    use HasFactory;
    protected $table = 'solicitud_mantenimiento';
    protected $fillable = [
        'user_id',
        'vehiculo_id',
        'tipo_mantenimiento_id',
        'fecha_solicitud',
        'hora_solicitud',
        'kilometraje_actual',
        'observaciones',
        'estado_solicitud'        
    ];

    public function mantenimiento()
    {
        return $this->belongsTo(TipoMantenimiento::class, 'tipo_mantenimiento_id');
    }
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculos::class, 'vehiculo_id');
    }
    
    public function usuarios()
    {
        return $this->belongsTo(Policias::class, 'user_id');
    }
}
