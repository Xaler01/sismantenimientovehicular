<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    use HasFactory;

    protected $table ="dependencias";
     

    protected $fillable = [ 
        'provincia',
        'num_distritos',
        'parroquia',
        'cod_distrito',
        'nombre_distrito',
        'num_circuitos',
        'cod_circuito',
        'nombre_circuito',
        'num_subcircuitos',
        'cod_subcircuito',
        'nombre_subcircuito',
        'estado'     
    ];

    public $timestamp = false;
    
}
