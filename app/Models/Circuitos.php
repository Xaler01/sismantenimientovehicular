<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuitos extends Model
{
    use HasFactory;
    protected $table = 'circuito';

    protected $fillable = [
        'distrito_id',
        'codigo',
        'nombre',
        'estado'
    ];

    public function distritos()
    {
        return $this->belongsTo(Distritos::class, 'distrito_id');
    }
}
