<?php

namespace App\Http\Controllers;

use App\Models\AsignarVehiculo;
use App\Models\Policias;
use App\Models\Vehiculos;
use App\Models\Dependencias;
use App\Models\Subcircuitos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsignarVehiculoController extends Controller
{

    public function index()
    {
        if (auth()->user()->rol == "Policia" && auth()->user()->rol != "Encargado") {
            return redirect('Inicio');
        }

        $datospolicia = Policias::where('rol', 'Policia')->where('estado_id',1)->get();
        $datosvehiculos = Vehiculos::where('estado_id', 1)->get();
        
        $vehiculo_usuario = AsignarVehiculo::all();
        
        

        
        return view('modulos.AsignarVehiculo', compact('datospolicia', 'datosvehiculos', 'vehiculo_usuario'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {

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
    public function edit($id)
    {
        $datosvehiculos = Vehiculos::findOrFail($id);
        $asignarVehiculo = AsignarVehiculo::where('vehiculo_id', $datosvehiculos->id)->first();
        $dependencias = Subcircuitos::all();
        $datospolicia = Policias::where('rol', 'Policia')
                                ->where('estado_id',1)->get();
        $usuario1_id = $asignarVehiculo ? $asignarVehiculo->user1_id : null;
        

        return view('modulos.AsignarVehiculo', compact('datosvehiculos', 'asignarVehiculo', 'dependencias', 'datospolicia', 'usuario1_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // Buscar el registro existente de AsignarVehiculo por el vehiculo_id
        $asignarVehiculo = AsignarVehiculo::where('vehiculo_id', $id)->first();

        // Si no existe el registro, crear una nueva instancia del modelo
        if (!$asignarVehiculo) {
            $asignarVehiculo = new AsignarVehiculo();
            $asignarVehiculo->vehiculo_id = $id;
        }
                // Obtener los valores del formulario
               
                $dependenciaId = $request->input('dependenciaId'); // Obtener dependenciaId desde el campo oculto correcto
                $usuario1Id = $request->input('usuario1');
                $usuario2Id = $request->input('usuario2');
                $usuario3Id = $request->input('usuario3');
                $usuario4Id = $request->input('usuario4');
        
                // Verificar si el usuario ya está asignado a otro vehículo
                $usuariosAsignados = AsignarVehiculo::whereIn('user1_id', [$usuario1Id, $usuario2Id, $usuario3Id, $usuario4Id])
                                                    ->orWhereIn('user2_id', [$usuario1Id, $usuario2Id, $usuario3Id, $usuario4Id])
                                                    ->orWhereIn('user3_id', [$usuario1Id, $usuario2Id, $usuario3Id, $usuario4Id])
                                                    ->orWhereIn('user4_id', [$usuario1Id, $usuario2Id, $usuario3Id, $usuario4Id])
                                                    ->exists();

                if ($usuariosAsignados) {
                    $usuariosRepetidos = [];
                    if (in_array($usuario1Id, [$usuario2Id, $usuario3Id, $usuario4Id])) {
                        $usuariosRepetidos[] = Policias::where('id', $usuario1Id)->value('name');
                    }
                    if (in_array($usuario2Id, [$usuario1Id, $usuario3Id, $usuario4Id])) {
                        $usuariosRepetidos[] = Policias::where('id', $usuario2Id)->value('name');
                    }
                    if (in_array($usuario3Id, [$usuario1Id, $usuario2Id, $usuario4Id])) {
                        $usuariosRepetidos[] = Policias::where('id', $usuario3Id)->value('name');
                    }
                    if (in_array($usuario4Id, [$usuario1Id, $usuario2Id, $usuario3Id])) {
                        $usuariosRepetidos[] = Policias::where('id', $usuario4Id)->value('name');
                    }
            
                    $usuariosRepetidosNombres = implode(', ', $usuariosRepetidos);
                    return redirect()->route('AsignarVehiculo', ['id' => $id])
                        ->with('erroruser', "El usuario '$usuariosRepetidosNombres' ya está asignado a otro vehículo. Solo se puede asignar un vehículo por policía.");
                        
                }
                
                /** 
                if ($usuario1Id && $usuarioAsignado) {
                    $usuarioRepetido = Policias::where('id', $usuario1Id)->value('name');
                    //return redirect('AsignarVehiculo')->with('error', 'El usuario ya está asignado a otro vehículo');
                    return redirect()->route('AsignarVehiculo', ['id' => $id])->with('erroruser', "El usuario '$usuarioRepetido' ya está asignado a otro vehículo. Solo se puede asignar un vehículo por policía.");
                }*/
        
                // Crear una nueva instancia del modelo AsignarVehiculo
                
                
                $asignarVehiculo->dependencia_id = $dependenciaId;
                $asignarVehiculo->user1_id = $usuario1Id;
                $asignarVehiculo->user2_id = $usuario2Id;
                $asignarVehiculo->user3_id = $usuario3Id;
                $asignarVehiculo->user4_id = $usuario4Id;
        
                // Guardar el registro en la tabla vehiculo_subcircuito
                $asignarVehiculo->save();
        
                //return redirect('AsignarVehiculo')->with('vehiculoPersonal', 'Si');
                return redirect()->route('AsignarVehiculo', ['id' => $id, 'usuario1_id' => $usuario1Id])->with('vehiculoPersonal', 'Si');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AsignarVehiculo $asignarVehiculo)
    {
        //
    }
}
