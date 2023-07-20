<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcircuitos extends Model
{
    use HasFactory;

    protected $table = 'subcircuito';

    protected $fillable = [
        'circuito_id',
        'parroquia_id',
        'codigo'.
        'nombre',
        'estado'
    ];

    public function circuito()
    {
        return $this->belongsTo(Circuitos::class, 'circuito_id');
    }

    public function parroquia()
    {
        return $this->belongsTo(Parroquias::class, 'parroquia_id');
    }
}
