<?php

namespace App\Http\Controllers;

use App\Models\AsignarVehiculo;
use Illuminate\Http\Request;
use App\Models\Vehiculos;
use App\Models\VehiculoSubcircuito;
use App\Models\Dependencias;
use App\Models\Subcircuitos;

class VehiculoSubcircuitoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        if(auth()->user()->rol != "Administrador" && auth()->user()->rol != "Encargado") {
            return redirect('Inicio');
        }
        
        $vehiculos = Vehiculos::all();
        $dependencias = Subcircuitos::where('estado', 'Activo')->get();

        return view('modulos.VehiculoSubcircuito', compact('vehiculos', 'dependencias'));
    }

    public function edit($id)
    {
        $vehiculo = Vehiculos::findOrFail($id);
        $dependencias = Subcircuitos::where('estado', 'Activo')->get();
        $vehiculoSubcircuito = VehiculoSubcircuito::where('vehiculo_id', $vehiculo->id)->first();

        return view('modulos.VehiculoSubcircuito', compact('vehiculo', 'vehiculoSubcircuito', 'dependencias'));
    }

    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculos::findOrFail($id);
        $dependencia_id = $request->input('dependencia');

         // Verificar si el vehículo ya estaba asignado a una dependencia diferente
        $oldDependenciaId = $vehiculo->dependencia_id;

        // Actualizar el campo dependencia_id en la tabla vehiculos
        $vehiculo->dependencia_id = $dependencia_id;
        $vehiculo->save();

        // Verificar si ya existe una asignación en la tabla vehiculo_subcircuito para el vehículo
        $vehiculoSubcircuito = VehiculoSubcircuito::where('vehiculo_id', $vehiculo->id)->first();

        if ($vehiculoSubcircuito) {
            // Verificar si la dependencia anterior es diferente a la nueva dependencia
            if ($oldDependenciaId != $dependencia_id) {
                // Actualizar la dependencia existente
                $vehiculoSubcircuito->dependencia_id = $dependencia_id;
                $vehiculoSubcircuito->save();
                 // Actualizar la tabla vehiculo_subcircuito a null para los usuarios 1, 2, 3 y 4
                  /**  AsignarVehiculo::where('dependencia_id', $oldDependenciaId)
                    ->whereIn('user1_id', [$vehiculo->user1_id, $vehiculo->user2_id, $vehiculo->user3_id, $vehiculo->user4_id])
                    ->update([
                        'user1_id' => null,
                        'user2_id' => null,
                        'user3_id' => null,
                        'user4_id' => null,
                    ]);
                 }*/
                AsignarVehiculo::where('dependencia_id', $oldDependenciaId)
                ->where('user1_id', $vehiculo->user1_id)
                ->update(['user1_id' => null]); 
                // Actualizar la tabla vehiculo_subcircuito a null para el usuario 2
                AsignarVehiculo::where('dependencia_id', $oldDependenciaId)
                            ->where('user2_id', $vehiculo->user2_id)
                            ->update(['user2_id' => null]);

                // Actualizar la tabla vehiculo_subcircuito a null para el usuario 3
                AsignarVehiculo::where('dependencia_id', $oldDependenciaId)
                            ->where('user3_id', $vehiculo->user3_id)
                            ->update(['user3_id' => null]);

                // Actualizar la tabla vehiculo_subcircuito a null para el usuario 4
                AsignarVehiculo::where('dependencia_id', $oldDependenciaId)
                            ->where('user4_id', $vehiculo->user4_id)
                            ->update(['user4_id' => null]);
                }
            } else {
            // Crear una nueva asignación en la tabla vehiculo_subcircuito
            $vehiculoSubcircuito = new VehiculoSubcircuito();
            $vehiculoSubcircuito->vehiculo_id = $vehiculo->id;
            $vehiculoSubcircuito->dependencia_id = $dependencia_id;
            $vehiculoSubcircuito->save();
        }

        return redirect('VehiculoSubcircuito')->with('asignadoVeh', 'Si');
    }

    
}
