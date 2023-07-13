<?php

namespace App\Http\Controllers;

use App\Models\subcircuitos;
use Illuminate\Http\Request;

class SubcircuitosController extends Controller
{
    public function getSubcircuitos($circuitoId)
    {
        $subcircuitos = subcircuitos::where('circuito_id', $circuitoId)->get();

        return response()->json($subcircuitos);
    }
}
