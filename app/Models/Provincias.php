<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{
    use HasFactory;
    protected $table = 'provincia';

    protected $fillable = [
        'nombre',
    ];

    public function parroquias()
    {
        return $this->hasMany(Parroquias::class, 'provincia_id');
    }

    public function circuitos()
    {
        return $this->hasMany(Circuitos::class, 'provincia_id');
    }
    

    }
