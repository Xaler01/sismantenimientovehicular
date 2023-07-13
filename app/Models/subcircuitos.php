<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcircuitos extends Model
{
    use HasFactory;
    protected $table = 'subcircuitos';

    protected $fillable = [
        'circuito_id',
        'nombre',
        'estado',
    ];

    public function circuito()
    {
        return $this->belongsTo(circuitos::class, 'circuito_id');
    }

    
}
