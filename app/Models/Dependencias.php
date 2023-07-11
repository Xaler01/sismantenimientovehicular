<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    use HasFactory;

    protected $table ="dependencias";
     

    protected $fillable = [ 
        'provincia_id',
        'num_distritos',
        'parroquia_id',
        'cod_distrito',
        'nombre_distrito',
        'num_circuitos',
        'cod_circuito',
        'nombre_circuito',
        'num_subcircuitos',
        'cod_subcircuito',
        'nombre_subcircuito',
        'estado_id'     
    ];

    public $timestamp = false;

    public function provincia()
    {
        return $this->belongsTo(Provincias::class, 'provincia_id');
    }

        public function parroquia()
    {
        return $this->belongsTo(Parroquias::class, 'parroquia_id');
    }
    
}
