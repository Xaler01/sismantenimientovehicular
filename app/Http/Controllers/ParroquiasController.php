<?php

namespace App\Http\Controllers;

use App\Models\Parroquias;
use App\Models\Provincias;
use Illuminate\Http\Request;

class ParroquiasController extends Controller
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

        


        $parroquias = Parroquias::all();
        $provincias = Provincias::where('estado', 'Activo')->get();
        $numparroquias = Provincias::where('estado', 'Activo')->withCount('parroquias')->get();

        return view('modulos.Parroquias', compact('provincias', 'parroquias','numparroquias'));
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
        $datos = $request->validate([
            'provincia' => 'required',
            'parroquia' => 'required',
            
        ]);

        Parroquias::create([
            'nombre' => $datos['parroquia'],
            'provincia_id' => $datos['provincia']
            
        ]);

        return redirect('Parroquias')->with('registradoG', 'Si');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parroquias $parroquias)
    {
        //
    }

    public function edit($id)
    {
        if (auth()->user()->rol != "Administrador" && auth()->user()->rol != "Encargado") {
            return redirect('Inicio');
        }

        $parroquia = Parroquias::find($id);
        $provincias = Provincias::where('estado', 'Activo')->get();

        return view('modulos.Editar-Parroquias', compact('parroquia', 'provincias'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'provincia' => 'required',
            'parroquia' => 'required',
            'estado' => 'required'
        ]);

        $parroquia = Parroquias::find($id);
        $parroquia->provincia_id = $datos['provincia'];
        $parroquia->nombre = $datos['parroquia'];
        $parroquia->estado = $datos['estado'];
        
        $parroquia->save();

        return redirect('Parroquias')->with('actualizadoGen', 'Si');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $parroquia =Parroquias::findOrfail($id);
        $parroquia->estado= 'Eliminado';
        $parroquia->save();
        return redirect('Parroquias')->with('eliminadoGen', true); 
        
    }
}
