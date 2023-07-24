<?php

namespace App\Http\Controllers;

use App\Models\AsignarVehiculo;
use App\Models\SolicitudMantenimiento;
use App\Models\Policias;
use App\Models\Vehiculos;
use App\Models\TipoMantenimiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolicitudMantenimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->rol == "Policia" && auth()-> user()->rol !="Encargado"){
            return redirect('Inicio');
        }
        
        $vehiculomantenimiento =AsignarVehiculo::all();
        $policias= Policias::where('rol', 'Policia')
                            ->where('estado_id',1)->get();
      
        $solicitudmantenimiento = SolicitudMantenimiento::all();

        $tiposMantenimiento = TipoMantenimiento::all();

        $solicitudmantenimiento->transform(function ($solicitud) {
            return [
                'user' => $solicitud->user_id,
                'vehiculo' => $solicitud->vehiculo_id,
                'mantenimiento' => $solicitud->tipo_mantenimiento_id,
                // Formatear la fecha y hora como cadenas ISO 8601
                'fecha' => Carbon::parse($solicitud->fecha_solicitud)->toIso8601String(),
                'hora' => Carbon::parse($solicitud->hora_solicitud)->toIso8601String(),
                'kilometraje' => $solicitud->kilometraje_actual,    
                'observacion' => $solicitud->observaciones,
                'estado' => $solicitud->estado_solicitud,
            ];
        });


        
        return view('modulos.SolicitudMantenimiento', compact('vehiculomantenimiento','tiposMantenimiento','policias','solicitudmantenimiento'));
        
    }



 
    public function obtenerVehiculoUsuario($userId)
    {
        // Realiza una consulta para obtener el vehículo asignado al usuario
        $vehiculo = AsignarVehiculo::where('user1_id', $userId)
                                    ->orWhere('user2_id', $userId)
                                    ->orWhere('user3_id', $userId)
                                    ->orWhere('user4_id', $userId)
                                    ->with('vehiculo')
                                    ->first();
        

        // Devuelve la información del vehículo en formato JSON
        return response()->json(['vehiculo' => $vehiculo]);
        //return response()->json(['vehiculo' => ['placa' => $vehiculo->vehiculo->placa,'kilometrajeactual' => $vehiculo->vehiculo->kilometraje]]);
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
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario antes de guardarlos
        $request->validate([
            'user_id' => 'required',
            'vehiculo_id' => 'required',
            'kilometrajeactual' => 'required|numeric',
            'fechamantenimiento' => 'required',
            'horamantenimiento' => 'required',
            'mantenimiento' => 'required',
            'observaciones' => 'nullable|string',
        ]);

        // Crea una nueva instancia del modelo SolicitudMantenimiento con los datos del formulario
        $solicitud = new SolicitudMantenimiento([
           
            'user_id' => $request->input('user_id'),
            'vehiculo_id' => $request->input('vehiculo_id'),
            'tipo_mantenimiento_id' => $request->input('mantenimiento'),
            'fecha_solicitud' => $request->input('fechamantenimiento'),
            'hora_solicitud' => $request->input('horamantenimiento'),
            'kilometraje_actual' => $request->input('kilometrajeactual'),
            'observaciones' => $request->input('observaciones')
            
        ]);

        // Guarda la solicitud en la base de datos
        $solicitud->save();

        // Redirige a una página de éxito o muestra un mensaje de éxito
        return redirect()->route('modulos.SolicitudMantenimiento')->with('success', 'Solicitud de mantenimiento enviada con éxito.');

    }


    /**
     * Display the specified resource.
     */
    public function show(SolicitudMantenimiento $solicitudMantenimiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SolicitudMantenimiento $solicitudMantenimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SolicitudMantenimiento $solicitudMantenimiento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SolicitudMantenimiento $solicitudMantenimiento)
    {   
        
        DB::table('solicitud_mantenimiento')-> whereId(request('id'))->delete();
    }
}
