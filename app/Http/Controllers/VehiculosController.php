<?php

namespace App\Http\Controllers;

use App\Models\Vehiculos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

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
        $vehiculos = DB::select('select * from vehiculos');
        return view('modulos.Vehiculos')->with('vehiculos',$vehiculos);
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
            'placa' => ['required', 'string', 'unique:vehiculos'],
            'capacidad_carga'=> ['required'],
            'capacidad_pasajeros'=> ['required']
        ]);
        
        Vehiculos::create([
            'tipo_vehiculo' => $datos['tipo_vehiculo'],
            'placa' => $datos['placa'],
            'chasis' => $request->input('chasis') ?? 'desconocido',
            'marca' => $request->input('marca') ?? 'policial',
            'modelo' => $request->input('modelo') ?? '2000',
            'motor' => $request->input('motor') ?? 'desconocido',
            'kilometraje' => $request->input('kilometraje') ?? 99999,
            'cilindraje' => $request->input('cilindraje') ?? 99,
            'capacidad_carga' => $datos['capacidad_carga'],
            'capacidad_pasajeros' => $datos['capacidad_pasajeros']
        ]);

            return redirect('Vehiculos')->with('agregado', 'Si');
          /**$policias = new Policias(); */
     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculos $id)
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"&& auth()-> user()->rol !="Policia"){

            return redirect('Inicio');

        }
        /**dd($id->id);*/
        $vehiculo = Vehiculos::find($id->id);
        return view('modulos.Editar-Vehiculo')->with('vehiculo', $vehiculo);
    }
    
    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tipo_vehiculo' => 'required',
            'placa' => 'required',
            'capacidad_carga' => 'required',
            'capacidad_pasajeros' => 'required',
        ]);

        $vehiculo = Vehiculos::find($id);
        $vehiculo->tipo_vehiculo = $request->input('tipo_vehiculo');
        $vehiculo->placa = $request->input('placa');
        $vehiculo->chasis = $request->input('chasis') ?? 'desconocido';
        $vehiculo->marca = $request->input('marca') ?? 'policial';
        $vehiculo->modelo = $request->input('modelo') ?? '2000';
        $vehiculo->motor = $request->input('motor') ?? 'desconocido';
        $vehiculo->kilometraje = $request->input('kilometraje') ?? 99999;
        $vehiculo->cilindraje = $request->input('cilindraje') ?? 99;
        $vehiculo->capacidad_carga = $request->input('capacidad_carga');
        $vehiculo->capacidad_pasajeros = $request->input('capacidad_pasajeros');
        $vehiculo->save();

        return redirect('/Vehiculos')->with('actualizado', 'Si');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Vehiculos::destroy($id);

        return redirect('Vehiculos');
    }
}
