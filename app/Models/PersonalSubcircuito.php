<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalSubcircuito extends Model
{
    use HasFactory;

    protected $table = 'personal_subcircuito';
    protected $fillable = [
        'user_id',
        'dependencia_id'
    ];

    public function dependencia()
    {
        return $this->belongsTo(Dependencia::class, 'dependencia_id');
    }
}
