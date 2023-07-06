<?php

namespace App\Http\Controllers;

use App\Models\SolicitudMantenimiento;
use App\Models\Policias;
use App\Models\Vehiculos;
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
    public function index($id)
    {
        if(auth()->user()->rol == "Policia" && $id != auth() -> user()->id){
            return redirect('Inicio');
        }
        $policia = Policias::findOrFail($id);
        $vehiculo = Vehiculos::findOrFail($id);
        $solicitud = DB::select('select * from solicitudes_mantenimiento where user_id = '.$id);
        return view('modulos.SolicitudMantenimiento', compact('solicitud', 'policia', 'vehiculo'));
        
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
