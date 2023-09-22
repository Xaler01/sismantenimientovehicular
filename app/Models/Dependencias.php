<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    use HasFactory;

    protected $table ="dependencia";
     

    protected $fillable = [ 
        'provincia_id',
        'provincia_nombre',
        'parroquia_id',
        'parroquia_nombre',
        'distrito_id',
        'distrito_codigo',
        'distrito_nombre',
        'circuito_id',
        'circuito_codigo',
        'circuito_nombre',
        'subcircuito_id',
        'subcircuito_codigo',
        'subcircuito_nombre'
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
