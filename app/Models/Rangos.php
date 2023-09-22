<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rangos extends Model
{
    use HasFactory;
    protected $table = 'rango';

    protected $fillable = [
        'nombre',
    ];
}
