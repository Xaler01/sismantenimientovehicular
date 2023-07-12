<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class circuitos extends Model
{
    use HasFactory;

    protected $table = 'circuitos';

    protected $fillable = [
        'nombre',
    ];

}
