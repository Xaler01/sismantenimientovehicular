<?php

namespace App\Http\Controllers;

use App\Models\AsignarVehiculo;
use Illuminate\Http\Request;
use App\Models\Policias;
use App\Models\PersonalSubcircuito;
use App\Models\Dependencias;
use App\Models\Subcircuitos;

class PersonalSubcircuitoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"){

            return redirect('Inicio');

        }
        $policias = Policias::where('estado_id', 1)
                            ->where('rol', 'Policia')->get();
        $dependencias = Subcircuitos::where('estado', 'Activo')->get();

        return view('modulos.PersonalSubcircuito', compact('policias', 'dependencias'));
    }

    public function edit($id)
    {
        $policia = Policias::findOrFail($id);
        $dependencias = Subcircuitos::where('estado','Activo');
        $personalSubcircuito = PersonalSubcircuito::where('user_id', $policia->id)->first();
        //$dependencias = Dependencias::all();

        return view('modulos.PersonalSubcircuito', compact('policia', 'personalSubcircuito', 'dependencias'));
    }

    public function update(Request $request, $id)
    {
        $policia = Policias::findOrFail($id);
        $dependencia_id = $request->input('dependencia');

         // Verificar si el policía ya estaba asignado a un subcircuito diferente
        $oldDependenciaId = $policia->dependencia_id;
        
        // Actualizar el campo dependencia_id en la tabla users
        $policia->dependencia_id = $dependencia_id;
        $policia->save();

        // Verificar si ya existe una asignación en la tabla personal_subcircuito para el policía
        $personalSubcircuito = PersonalSubcircuito::where('user_id', $policia->id)->first();
        
        if ($personalSubcircuito) {
            // Verificar si el subcircuito anterior es diferente al nuevo subcircuito
            if ($oldDependenciaId != $dependencia_id) {
                // Actualizar la dependencia existente
                $personalSubcircuito->dependencia_id = $dependencia_id;
                $personalSubcircuito->save();
                 // Actualizar la tabla vehiculo_subcircuito a null
                AsignarVehiculo::where('dependencia_id', $oldDependenciaId)
                                ->where('user1_id', $policia->id)
                                ->update(['user1_id' => null]); 
                // Actualizar la tabla vehiculo_subcircuito a null para el usuario 2
                AsignarVehiculo::where('dependencia_id', $oldDependenciaId)
                                ->where('user2_id', $policia->id)
                                ->update(['user2_id' => null]);

                // Actualizar la tabla vehiculo_subcircuito a null para el usuario 3
                AsignarVehiculo::where('dependencia_id', $oldDependenciaId)
                                ->where('user3_id', $policia->id)
                                ->update(['user3_id' => null]);

                // Actualizar la tabla vehiculo_subcircuito a null para el usuario 4
                AsignarVehiculo::where('dependencia_id', $oldDependenciaId)
                                ->where('user4_id', $policia->id)
                                ->update(['user4_id' => null]);
            }
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
