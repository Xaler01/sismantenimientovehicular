<?php

namespace App\Http\Controllers;

use App\Models\Provincias;
use Illuminate\Http\Request;

class SubcircuitosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
{
    if (auth()->user()->rol != "Administrador" && auth()->user()->rol != "Encargado") {
        return redirect('Inicio');
    }

    $provincias = Provincias::where('estado', 'Activo')->with(['parroquias' => function ($query) {
        $query->where('estado', 'Activo');
    }])->get();

    foreach ($provincias as $provincia) {
        $provincia->num_parroquias = $provincia->parroquias->count();
    }

    return view('modulos.Subcircuitos', compact('provincias'));
}

    /**
     * Display a listing of the resource.
     
    public function index()
    {
        if (auth()->user()->rol != "Administrador" && auth()->user()->rol != "Encargado") {
            return redirect('Inicio');
        }

        $provincias = Provincias::where('estado', 'Activo')->get();

        foreach ($provincias as $provincia) {
            $provincia->num_parroquias = $provincia->parroquias()->count();
        }

        return view('modulos.Subcircuitos', compact('provincias'));
    }*/

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
    public function show($id)
    {
        $provincia = Provincias::findOrFail($id);
        $parroquias = $provincia->parroquias;
        $circuitos = $provincia->circuitos;

        return view('modulos.Subcircuitos', compact('provincia', 'parroquias', 'circuitos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
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
    public function destroy($id)
    {
        //
    }
}
