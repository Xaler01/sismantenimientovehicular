<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculos;
use App\Models\VehiculoSubcircuito;
use App\Models\Dependencias;

class VehiculoSubcircuitoController extends Controller
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
        $vehiculos = Vehiculos::all();
        $dependencias = Dependencias::all();

        return view('modulos.VehiculoSubcircuito', compact('vehiculos', 'dependencias'));
    }

    public function edit($id)
    {
        $vehiculo = Vehiculos::findOrFail($id);
        $vehiculoSubcircuito = VehiculoSubcircuito::where('user_id', $vehiculo->id)->first();
        $dependencias = Dependencias::all();

        return view('modulos.VehiculoSubcircuito', compact('vehiculo','vehiculoSubcircuito' ,'dependencias'));
    }

    public function update(Request $request, $id)
    {
        $vehiculo = Vehiculos::findOrFail($id);
        $dependencia_id = $request->input('dependencia');

        // Actualizar el campo dependencia_id en la tabla vehiculos
        $vehiculo->dependencia_id = $dependencia_id;
        $vehiculo->save();

        // Verificar si ya existe una asignación en la tabla vehiculo_subcircuito para el vehículo
        $vehiculoSubcircuito = VehiculoSubcircuito::where('vehiculo_id', $vehiculo->id)->first();

        if ($vehiculoSubcircuito) {
            // Actualizar la dependencia existente
            $vehiculoSubcircuito->dependencia_id = $dependencia_id;
            $vehiculoSubcircuito->save();
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
