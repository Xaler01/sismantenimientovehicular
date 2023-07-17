<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquias extends Model
{
    use HasFactory;
    protected $table = 'parroquia';

    protected $fillable = [
        'nombre',
        'provincia_id'
    ];

    public function provincias()
    {
        return $this->belongsTo(Provincias::class, 'provincia_id');
    }
}

