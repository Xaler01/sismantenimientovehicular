<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiporeclamo extends Model
{
    use HasFactory;

    protected $table = 'tipos_reclamo';

    protected $fillable = [
        'nombre',
    ];
}
