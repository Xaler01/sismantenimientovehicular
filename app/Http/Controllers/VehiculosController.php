<?php

namespace App\Http\Controllers;

use App\Models\Vehiculos;
use Illuminate\Http\Request;

class VehiculosController extends Controller
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
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"&& auth()-> user()->rol !="Policia"){

            return redirect('Inicio');

        }
        return view('modulos.Vehiculos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"&& auth()-> user()->rol !="Policia"){

            return redirect('Inicio');

        }
        return view('modulos.Crear-Vehiculo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = request()-> validate([
            'tipo_vehiculo'=> ['required'],
            'placa'=> ['required','string','unique:users'],
            'chasis'=> ['required'],
            'marca'=> ['required'],
            'modelo'=> ['required'],
            'motor'=> ['required'],
            'kilometraje'=> ['required'],
            'cilindraje'=> ['required'],
            'capacidad_carga'=> ['required'],
            'capacidad_pasajeros'=> ['required']
        ]);
        
        Vehiculos::create([
            'tipo_vehiculo'=> $datos['tipo_vehiculo'],
            'placa'=> $datos['placa'],
            'chasis'=> $datos['chasis'],
            'marca'=> $datos['marca'],
            'modelo'=> $datos['modelo'],
            'motor'=> $datos['motor'],
            'kilometraje'=> $datos['kilometraje'],
            'cilindraje'=> $datos['cilindraje'],
            'capacidad_carga'=> $datos['capacidad_carga'],
            'capacidad_pasajeros'=> $datos['capacidad_pasajeros']            
        ]);

            return redirect('Vehiculos')->with('agregado', 'Si');
          /**$policias = new Policias(); */
     
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculos $vehiculos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculos $vehiculos)
    {
        //
    }
}
