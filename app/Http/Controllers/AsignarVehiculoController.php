<?php

namespace App\Http\Controllers;

use App\Models\AsignarVehiculo;
use App\Models\Policias;
use App\Models\Vehiculos;
use App\Models\Dependencias;
use App\Models\TipoMantenimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignarVehiculoController extends Controller
{
    public function index()
    {
        if (auth()->user()->rol == "Policia" && auth()->user()->rol != "Encargado") {
            return redirect('Inicio');
        }

        $policia = DB::select('select * from users where rol = "Policia" and estado = "Activo"');
        $vehiculos = Vehiculos::all();
        $vehiculo_usuario = collect(); // Crear una colección vacía

        foreach ($vehiculos as $vehiculo) {
            $asignacion = $vehiculo->AsignarVehiculo()->latest()->first(); // Obtener la última asignación
            if ($asignacion) {
                $vehiculo_usuario->push($asignacion);
            }
        }

        $tiposMantenimiento = TipoMantenimiento::all();

        return view('modulos.AsignarVehiculo', compact('policia', 'vehiculos', 'vehiculo_usuario', 'tiposMantenimiento'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     
    public function store(Request $request)
    {
        // Aquí irá la lógica para guardar la asignación en la base de datos
        // Puedes adaptarla según tus necesidades
        
        return redirect('AsignarVehiculo')->with('vehiculoPersonal', 'Si');
    }*/
/** 
    public function store(Request $request)
    {
        // Obtener los valores del formulario
        $vehiculoId = $request->input('vehiculo_id');
        $dependenciaId = $request->input('dependenciaId'); // Obtener dependencia_id desde el campo oculto correcto
        $usuario1Id = $request->input('usuario1');
        $usuario2Id = $request->input('usuario2');
        $usuario3Id = $request->input('usuario3');
        $usuario4Id = $request->input('usuario4');

        // Crear una nueva instancia del modelo AsignarVehiculo
        $asignarVehiculo = new AsignarVehiculo();
        $asignarVehiculo->vehiculo_id = $vehiculoId;
        $asignarVehiculo->dependencia_id = $dependenciaId;
        $asignarVehiculo->user1_id = $usuario1Id;
        $asignarVehiculo->user2_id = $usuario2Id;
        $asignarVehiculo->user3_id = $usuario3Id;
        $asignarVehiculo->user4_id = $usuario4Id;

        // Guardar el registro en la tabla vehiculo_subcircuito
        $asignarVehiculo->save();

        return redirect('AsignarVehiculo')->with('vehiculoPersonal', 'Si');
    }

*/

    public function store(Request $request)
    {
        // Obtener los valores del formulario
        $vehiculoId = $request->input('vehiculo_id');
        $dependenciaId = $request->input('dependenciaId'); // Obtener dependenciaId desde el campo oculto correcto
        $usuario1Id = $request->input('usuario1');
        $usuario2Id = $request->input('usuario2');
        $usuario3Id = $request->input('usuario3');
        $usuario4Id = $request->input('usuario4');

        // Verificar si el usuario ya está asignado a otro vehículo
        $usuarioAsignado = AsignarVehiculo::where('user1_id', $usuario1Id)
            ->orWhere('user2_id', $usuario1Id)
            ->orWhere('user3_id', $usuario1Id)
            ->orWhere('user4_id', $usuario1Id)
            ->exists();

        if ($usuarioAsignado) {
            return redirect('AsignarVehiculo')->with('error', 'El usuario ya está asignado a otro vehículo');
        }

        // Crear una nueva instancia del modelo AsignarVehiculo
        $asignarVehiculo = new AsignarVehiculo();
        $asignarVehiculo->vehiculo_id = $vehiculoId;
        $asignarVehiculo->dependencia_id = $dependenciaId;
        $asignarVehiculo->user1_id = $usuario1Id;
        $asignarVehiculo->user2_id = $usuario2Id;
        $asignarVehiculo->user3_id = $usuario3Id;
        $asignarVehiculo->user4_id = $usuario4Id;

        // Guardar el registro en la tabla vehiculo_subcircuito
        $asignarVehiculo->save();

        return redirect('AsignarVehiculo')->with('vehiculoPersonal', 'Si');
    }



    /**
     * Display the specified resource.
     */
    public function show(AsignarVehiculo $asignarVehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AsignarVehiculo $asignarVehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsignarVehiculo $asignarVehiculo)
    {
        //
    }
}
