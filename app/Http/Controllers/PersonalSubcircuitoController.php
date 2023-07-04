<?php

namespace App\Http\Controllers;

use App\Models\PersonalSubcircuito;
use App\Models\Dependencias;
use App\Models\Policias;
use Illuminate\Http\Request;

class PersonalSubcircuitoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"){

            return redirect('Inicio');

        }

        $dependencias = Dependencias::all();

        $policias = Policias::where('estado', 'activo')->get();
        $asignapersonalsubcircuito = PersonalSubcircuito::with('dependencia')->get();
        $subcircuitos = Dependencias::all();
         /**
        return view('modulos.PersonalSubcircuito')->with('asignapersonalsubcircuito', $asignapersonalsubcircuito)
                                        ->with('subcircuitos', $subcircuitos);
                                        */

        return view('modulos.PersonalSubcircuito', compact('asignapersonalsubcircuito','dependencias','policias'));
        /**
        return view('modulos.Policias')-> with('dependencias', $dependencias);
        */   
    }

    /**
     * Display a listing of the resource.
     
    public function index()
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"){

            return redirect('Inicio');

        }
        /**
        $asignaPersonalSubcircuito = PersonalSubcircuito::all();

        return view('modulos.PersonalSubcircuito');
        
         * return view('modulos.Vehiculos')->with('vehiculos',$vehiculos);
         * return view('modulos.Policias')-> with('dependencias', $dependencias);
        
    }*/

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Aquí puedes cargar los datos necesarios para mostrar el formulario de asignación
        // por ejemplo, las dependencias y los policías disponibles
        $dependencias = Dependencias::all();
        $policias = Policias::all();

        return view('modulos.asignar-dependencia')->with('dependencias', $dependencias)->with('policias', $policias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'dependencia_id' => 'required',
            'policia_id' => 'required',
        ]);

        PersonalSubcircuito::create($request->all());

        return redirect('/')->with('success', 'Dependencia asignada correctamente');
    }

    public function edit($id)
    {
        $personalSubcircuito = PersonalSubcircuito::find($id);
        $dependencias = Dependencias::all();
        $policias = Policias::all();

        return view('modulos.editar-asignacion')
            ->with('personalSubcircuito', $personalSubcircuito)
            ->with('dependencias', $dependencias)
            ->with('policias', $policias);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dependencia_id' => 'required',
            'policia_id' => 'required',
        ]);

        $personalSubcircuito = PersonalSubcircuito::find($id);
        $personalSubcircuito->dependencia_id = $request->input('dependencia_id');
        $personalSubcircuito->policia_id = $request->input('policia_id');
        $personalSubcircuito->save();

        return redirect('/')->with('success', 'Asignación actualizada correctamente');
    }

    public function destroy($id)
    {
        $personalSubcircuito = PersonalSubcircuito::find($id);
        $personalSubcircuito->delete();

        return redirect('/')->with('success', 'Asignación eliminada correctamente');
    }
}
   