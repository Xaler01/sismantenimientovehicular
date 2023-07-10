<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquias extends Model
{
    use HasFactory;

    protected $table = 'parroquias';

    protected $fillable = [
        'nombre',
    ];
}
