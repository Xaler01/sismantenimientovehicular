<?php

namespace App\Http\Controllers;

use App\Models\circuitos;
use App\Models\Dependencias;
use App\Models\reclamos;
use App\Models\subcircuitos;
use App\Models\Tiporeclamo;
use Illuminate\Http\Request;

class ReclamosController extends Controller
{
    public function index()
    {
        $circuito = circuitos::where('estado', 'Activo')->get();
        $SubcircuitosDisp = subcircuitos::where('estado', 'Activo')->get();
        $dependenciaReclamo = Dependencias::where('estado_id','1')->get();
        // Verificar si se ha seleccionado un subcircuito
        if (request()->has('subcircuito')) {
            $subcircuitoId = request()->input('subcircuito');
            $subcircuito = subcircuitos::find($subcircuitoId);
            
        }

        $tiporeclamo = Tiporeclamo::all();
        $reclamo = reclamos::all();

        return view('modulos.Reclamos', compact('circuito', 'SubcircuitosDisp', 'dependenciaReclamo','tiporeclamo', 'reclamo'));
    }
 


    public function create()
    {
        $circuito = circuitos::where('estado', 'Activo')->get(); // Obtener los circuitos activos
        $subcircuito = subcircuitos::where('estado', 'Activo')->get(); // Obtener los subcircuitos activos
        $tiporeclamo = Tiporeclamo::all();

        return view('Crear-Reclamo', compact('circuito', 'subcircuito', 'tiporeclamo'));
    }

    public function store(Request $request)
{
    $datos = $request->validate([
        'subcircuito' => ['required'],
        'tiporeclamo' => ['required'],
        'detalle' => ['required'],
        'apellidos' => ['required'],
        'nombres' => ['required']
    ]);

    $subcircuitoId = $datos['subcircuito'];
    $subcircuito = Dependencias::find($subcircuitoId);

    if ($subcircuito) {
        $circuitoId = $subcircuito->circuito_id;
    } else {
        $circuitoId = null;
    }

    Reclamos::create([
        'circuito_id' => $subcircuitoId,
        'subcircuito_id' => $subcircuitoId,
        'tipo_reclamo_id' => $datos['tiporeclamo'],
        'detalle' => $datos['detalle'],
        'contacto' => $request->input('contacto'),
        'apellidos' => $request->input('apellidos'),
        'nombres' => $request->input('nombres')
    ]);

    return redirect('/')->with('reclamo', 'Si');
    
}


    /** 
    public function store(Request $request)
    {
        $datos = $request->validate([
            'subcircuito' => ['required'],
            'tiporeclamo' => ['required'],
            'detalle' => ['required'],
            'apellidos' => ['required'],
            'nombres' => ['required']
        ]);

        $subcircuitoId = $datos['subcircuito'];
        $subcircuito = subcircuitos::find($subcircuitoId);

        if ($subcircuito) {
            $circuitoId = $subcircuito->circuito_id;
        } else {
            $circuitoId = null;
        }

        reclamos::create([
            'circuito_id' => $circuitoId,
            'subcircuito_id' => $subcircuitoId,
            'tipo_reclamo_id' => $datos['tiporeclamo'],
            'detalle' => $datos['detalle'],
            'contacto' => $request->input('contacto'),
            'apellidos' => $request->input('apellidos'),
            'nombres' => $request->input('nombres')
        ]);

        return redirect('Seleccionar')->with('agregado', 'Si');
    }
    */

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
