<?php

namespace App\Http\Controllers;

use App\Models\SolicitudMantenimiento;
use App\Models\Policias;
use App\Models\Vehiculos;
use App\Models\TipoMantenimiento;
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
        //$policia = DB::select('select * from users where rol = "Policia" and estado ="Activo" ');
        $policia = Policias::where('estado_id')->get();
        $vehiculo = Vehiculos::all();
        /**$solicitud = DB::select('select * from solicitudes_mantenimiento where user_id = '.$id);*/
        $tiposMantenimiento = TipoMantenimiento::all();
        
        return view('modulos.SolicitudMantenimiento', compact(/**'solicitud', */'policia', 'vehiculo', 'tiposMantenimiento'));
        
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
        //
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
        //
    }
}
