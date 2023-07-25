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

    public function index2()
    {
        $solicitud = SolicitudMantenimiento::all();
        // Resto del código necesario para preparar los datos para la vista

        return view('modulos.Solicitudes', compact('solicitud'));
    }

  


    
    public function getCitasCalendario()
    {
        $solicitudes = SolicitudMantenimiento::select(['user_id', 'vehiculo_id', 'fecha_solicitud', 'hora_solicitud'])
            ->where('estado_solicitud', 'Activo')
            ->where('fecha_solicitud', '>=', Carbon::now()) // Solo citas futuras
            ->get();

        $citas = [];

        foreach ($solicitudes as $solicitud) {
            $tipoVehiculo = $solicitud->vehiculo->tipo_vehiculo;


            // Formatear la fecha y hora como cadenas ISO 8601
            $fechaInicio = Carbon::parse($solicitud->fecha_solicitud)->format('Y-m-d');
            $horaInicio = Carbon::parse($solicitud->hora_solicitud)->format('H:i:s');
        
            // Calcular la fecha y hora de finalización (1 hora después de la fecha y hora de inicio)
            $fechaFin = Carbon::parse($solicitud->fecha_solicitud)->addHour()->format('Y-m-d');
            $horaFin = Carbon::parse($solicitud->hora_solicitud)->addHour(1)->format('H:i:s');
        
            // Agregar la cita al array en el formato esperado por el calendario
            $citas[] = [
                'title' => 'Solicitud de Mantenimiento', // Título del evento
                'start' => $fechaInicio . 'T' . $horaInicio, // Fecha y hora de inicio del evento
                'end' => $fechaFin . 'T' . $horaFin, // Fecha y hora de finalización del evento
                'user' => $solicitud->user_id, // ID del usuario asociado a la solicitud
                
                'tipoVehiculo' => $tipoVehiculo,
                'vehiculo' => $solicitud->vehiculo_id, // ID del vehículo asociado a la solicitud
            ];
        }

        // Devolver las citas en formato JSON
        return response()->json($citas);
    }
    

    public function actualizarSolicitud(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'solicitud_id' => 'required|exists:solicitud_mantenimiento,id',
            'estado' => 'required|in:Activo,Aprobada,Rechazada,Recalendarizar',
        ]);

        // Obtener la solicitud por su ID
        $solicitud = SolicitudMantenimiento::findOrFail($request->input('solicitud_id'));

        // Actualizar el estado de la solicitud
        $solicitud->estado_solicitud = $request->input('estado');
        $solicitud->save();

        return redirect()->route('Solicitudes')->with('success', 'Estado de la solicitud actualizado correctamente.');
    }



/*

    
    public function getCitasCalendario()
    {
        $solicitudes = SolicitudMantenimiento::select(['user_id', 'vehiculo_id', 'fecha_solicitud', 'hora_solicitud'])
            ->where('estado_solicitud', 'Activo')
            ->get();

        $citas = [];

        foreach ($solicitudes as $solicitud) {
            // Formatear la fecha y hora como cadenas ISO 8601
            $fecha = Carbon::parse($solicitud->fecha_solicitud)->format('Y-m-d');
            $hora = Carbon::parse($solicitud->hora_solicitud)->format('H:i:s');

            // Agregar la cita al array en el formato esperado por el calendario
            $citas[] = [
                'title' => 'Solicitud de Mantenimiento', // Título del evento
                'start' => $fecha . 'T' . $hora, // Fecha y hora de inicio del evento
                'user' => $solicitud->user_id, // ID del usuario asociado a la solicitud
                'vehiculo' => $solicitud->vehiculo_id, // ID del vehículo asociado a la solicitud
            ];
        }

        // Devolver las citas en formato JSON
        return response()->json($citas);
    }*/



 
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

        // Actualizar el kilometraje en la tabla "vehiculos"
        $vehiculoId = $request->input('vehiculo_id');
        $kilometrajeActual = $request->input('kilometrajeactual');

        $vehiculo = Vehiculos::find($vehiculoId);
        $vehiculo->kilometraje = $kilometrajeActual;
        $vehiculo->save();

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
        /**
            $subcircuito = Subcircuitos::findOrfail($id);
            $subcircuito->estado= 'Eliminado';
            $subcircuito->save();
            return redirect('Subcircuitos')->with('eliminadoGen', 'Si');*/
    
        
        DB::table('solicitud_mantenimiento')-> whereId(request('id'))->get();

        return redirect('SolicitudMantenimiento');
    }
}
