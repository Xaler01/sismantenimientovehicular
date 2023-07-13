<?php

namespace App\Http\Controllers;

use App\Models\ComentariosSugerencias;
use App\Models\Dependencias;
use App\Models\reclamos;
use App\Models\Tiporeclamo;
use Illuminate\Http\Request;

class ComentariosSugerenciasController extends Controller
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
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"){

            return redirect('Inicio');

        }
       /**
        $dependencias = Dependencias::all();
        $resumen = reclamos::all();
        $cantidad = reclamos::all();
        $nombreTipoReclamo -> Tiporeclamo->nombre;
        $tiponovedad = Tiporeclamo::all();
        return view('modulos.ComentariosSugerencias', compact('resumen', 'dependencias', 'cantidad','tiponovedad'));
        */
        $dependencias = Dependencias::all();
        $resumen = reclamos::all();
        $cantidad = reclamos::count();
        $tiponovedad = Tiporeclamo::all();

        return view('modulos.ComentariosSugerencias', compact('resumen', 'dependencias', 'cantidad', 'tiponovedad'));
   

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
    public function show(ComentariosSugerencias $comentariosSugerencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ComentariosSugerencias $comentariosSugerencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ComentariosSugerencias $comentariosSugerencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ComentariosSugerencias $comentariosSugerencias)
    {
        //
    }
}
