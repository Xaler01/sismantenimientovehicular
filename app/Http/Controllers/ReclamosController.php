<?php

namespace App\Http\Controllers;

use App\Models\circuitos;
use App\Models\reclamos;
use App\Models\subcircuitos;
use App\Models\Tiporeclamo;
use Illuminate\Http\Request;

class ReclamosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $circuito= circuitos::where('estado', 'activo');
        $subcircuito = subcircuitos::where('estado', 'activo');
        $tiporeclamo = Tiporeclamo::all();

        $reclamo = reclamos::all();
        return view ('modulos.Seleccionar', compact('circuito','subcircuito','tiporeclamo','reclamo'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $circuito= circuitos::where('estado', 'activo');
        $subcircuito = subcircuitos::where('estado', 'activo');
        $tiporeclamo = Tiporeclamo::all();

        $reclamo = reclamos::all();
        return view ('Crear-Reclamo', compact('circuito','subcircuito','tiporeclamo','reclamo'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = request()-> validate([
            'circuito'=> ['required'],
            'subcircuito' => ['required'],
            'tiporeclamo' => ['required'],
            'detalle'=> ['required'],
            'apellidos'=> ['required'],
            'nombres'=> ['required']
        ]);

        reclamos::create([
            'circuito_id' => $datos['circuito'],
            'subcircuito_id' => $datos['subcircuito'],
            'tipo_reclamo_id' => $datos['tiporeclamo'],
            'detalle' => $datos['detalle'],
            'contacto' => $request->input('contacto'),
            'apellidos' => $request->input('apellidos'),
            'nombres' => $request->input('nombres')
            
        ]);

        return redirect('modulos.Seleccionar')->with('agregado', 'Si');
    }

    /**
     * Display the specified resource.
     */
    public function show(reclamos $reclamos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reclamos $reclamos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, reclamos $reclamos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reclamos $reclamos)
    {
        //
    }
}
