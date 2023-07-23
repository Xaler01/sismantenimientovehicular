<?php

namespace App\Http\Controllers;

use App\Models\Circuitos;
use App\Models\Distritos;
use App\Models\Parroquias;
use App\Models\Provincias;
use App\Models\Subcircuitos;
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

        $circuitos = Circuitos::where('estado', 'Activo')->get();
        $parroquias = Parroquias::where('estado', 'Activo')->get();
        $distritos = Distritos::where('estado', 'Activo')->get();
        //$numcircuitos = Distritos::where('estado', 'Activo')->withCount('circuitos')->get();
        $provincias= Provincias::where('estado', 'Activo')->get();
        $subcircuitos = Subcircuitos::all();


        return view('modulos.Subcircuitos', compact('circuitos','parroquias','distritos','subcircuitos','provincias'));
    }

    public function obtenerParroquias($provincia)
    {
        dd($provincia); 
        $parroquias = Parroquias::where('provincia_id', $provincia)->get();
        return response()->json($parroquias);
    }
    public function obtenerNumeroSubcircuitos($circuitoId)
    {
        $circuito = Circuitos::find($circuitoId);
        // Verificar si el circuito existe y obtener la cantidad de subcircuitos
        $numeroSubcircuitos = $circuito ? $circuito->subcircuitos()->count() : 0;

        // Devolver la respuesta como JSON
        return response()->json($numeroSubcircuitos);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    

    public function store(Request $request)
    {
        
        $datos = $request->validate([
            'circuito' => 'required|exists:circuito,id',
            'parroquia' => 'required|exists:parroquia,id',
            'codigo_subcircuito' => 'required|unique:subcircuito,codigo', // Verificará que el código no esté duplicado en la tabla "subcircuito"
            'subcircuito' => 'required|unique:subcircuito,nombre', // Verificará que el nombre del subcircuito no esté duplicado en la tabla "subcircuito"
        ]);

        Subcircuitos::create([
            'circuito_id' => $datos['circuito'],
            'parroquia_id' => $datos['parroquia'],
            'codigo' => $datos['codigo_subcircuito'],
            'nombre' => $datos['subcircuito']
        ]);

        return redirect('Subcircuitos')->with('registradoG', 'Si');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        /**$provincia = Provincias::findOrFail($id);
        $parroquias = $provincia->parroquias;
        $circuitos = $provincia->circuitos;

        return view('modulos.Subcircuitos', compact('provincia', 'parroquias', 'circuitos'));
        */
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (auth()->user()->rol != "Administrador" && auth()->user()->rol != "Encargado") {
            return redirect('Inicio');
        }

        $subcircuito = Subcircuitos::find($id);
        $circuitos = Circuitos::where('estado', 'Activo')->get();
        $parroquia = Parroquias::where('estado', 'Activo')->get();
        $distritos = Distritos::where('estado', 'Activo')->get();
        //$numcircuitos = Distritos::where('estado', 'Activo')->withCount('circuitos')->get();

        return view('modulos.Editar-Subcircuitos', compact('circuitos','parroquia','distritos','subcircuito'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'circuito' => 'required',
            'parroquia_id' =>'required',
            'codigo_subcircuito' => 'required',
            'subcircuito' =>'required',
            'estado' =>'required'
        ]);
        
        $subcircuito = Subcircuitos::find($id);
        $subcircuito->circuito_id = $datos['circuito'];
        $subcircuito->parroquia_id = $datos['parroquia_id'];
        $subcircuito->codigo = $datos['codigo_subcircuito'];
        $subcircuito->nombre = $datos['subcircuito'];
        $subcircuito->estado = $datos['estado'];
        $subcircuito->save();

        return redirect('Subcircuitos')->with('actualizadoGen', 'Si');  
    }

    /**
     * Remove the specified resource from storage.
     */


    public function destroy($id)
    {
        $subcircuito = Subcircuitos::findOrfail($id);
        $subcircuito->estado= 'Eliminado';
        $subcircuito->save();
        return redirect('Subcircuitos')->with('eliminadoGen', 'Si');

    }
}
