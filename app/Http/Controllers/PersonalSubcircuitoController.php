<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policias;
use App\Models\PersonalSubcircuito;
use App\Models\Dependencias;

class PersonalSubcircuitoController extends Controller
{
    public function index()
    {
        $policias = Policias::all();
        $dependencias = Dependencias::all();

        return view('modulos.PersonalSubcircuito', compact('policias', 'dependencias'));
    }

    
    public function edit($id)
    {
        $policia = Policias::findOrFail($id);
        $personalSubcircuito = PersonalSubcircuito::where('user_id', $policia->id)->first();
        $dependencias = Dependencias::all();

        return view('modulos.PersonalSubcircuito', compact('policia', 'personalSubcircuito', 'dependencias'));
    }

    
    
    public function update(Request $request, $id)
    {
        $policia = Policias::findOrFail($id);
        $dependencia_id = $request->input('dependencia');
        
        // Verificar si ya existe una asignación en la tabla personal_subcircuito para el policía
        $personalSubcircuito = PersonalSubcircuito::where('user_id', $policia->id)->first();
        
        if ($personalSubcircuito) {
            // Actualizar la dependencia existente
            $personalSubcircuito->dependencia_id = $dependencia_id;
            $personalSubcircuito->save();
        } else {
            // Crear una nueva asignación en la tabla personal_subcircuito
            $personalSubcircuito = new PersonalSubcircuito();
            $personalSubcircuito->user_id = $policia->id; // Corregir el nombre del atributo
            $personalSubcircuito->dependencia_id = $dependencia_id;
            $personalSubcircuito->save();
        }
        
        //return redirect()->route('PersonalSubcircuito')->with('success', 'La dependencia del policía se ha actualizado correctamente.');
        return redirect('PersonalSubcircuito')->with('asignadoDep', 'Si');
    }
}
