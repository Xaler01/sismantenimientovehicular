<?php

namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Dependencias;
use App\Models\Parroquias;
use App\Models\Provincias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DependenciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     
    public function index()
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"){
                
            return redirect('Inicio');

        }
        $provincias = Provincias::where('estado','Activo')->get();
        $ciudades = Ciudades::all();
        $parroquias = Parroquias::all();
        $dependencias = Dependencias::where('estado_id',1)->get();
        return view('modulos.Dependencias', compact('dependencias', 'provincias', 'parroquias','ciudades')) -> with('dependencias', $dependencias);
    }
    */
    
    public function getParroquiasByProvincia($provinciaId)
    {
        return Parroquias::where('provincia_id', $provinciaId)->get();
    }

    public function index()
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"){
                
            return redirect('Inicio');
        }


        $dependencia = Dependencias::all();
        $provincias = Provincias::where('estado', 'Activo')->get();


        // Obtener los IDs de las provincias en estado activo
        $provinciasIds = $provincias->pluck('id')->toArray();

        // Obtener las parroquias que pertenecen a las provincias activas
        $parroquias = Parroquias::whereIn('provincia_id', $provinciasIds)->get();

        return view('modulos.Dependencias', compact('dependencia', 'provincias', 'parroquias'));

    }
    public function store(Request $request)
    {
        $datos = $request->validate([
            'provincia' => 'required',
            'num_distritos' => 'required',
            'parroquia' => 'required',
            'cod_distrito' => 'required',
            'nombre_distrito' => 'required',
            'num_circuitos' => 'required',
            'cod_circuito' => 'required',
            'nombre_circuito' => 'required',
            'num_subcircuitos' => 'required',
            'cod_subcircuito' => 'required',
            'nombre_subcircuito' => 'required',
        ]);

        Dependencias::create([
            'provincia_id' => $datos['provincia'],
            'num_distritos' => $datos['num_distritos'],
            'parroquia_id' => $datos['parroquia'],
            'cod_distrito' => $datos['cod_distrito'],
            'nombre_distrito' => $datos['nombre_distrito'],
            'num_circuitos' => $datos['num_circuitos'],
            'cod_circuito' => $datos['cod_circuito'],
            'nombre_circuito' => $datos['nombre_circuito'],
            'num_subcircuitos' => $datos['num_subcircuitos'],
            'cod_subcircuito' => $datos['cod_subcircuito'],
            'nombre_subcircuito' => $datos['nombre_subcircuito'],
            'estado_id' => 1
        ]);

        return redirect('Dependencias')->with('registradoD', 'Si');
    }

    public function edit($id)
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"&& auth()-> user()->rol !="Policia") {
            return redirect('Inicio');
        }
        $provincias = Provincias::where('estado','Activo')->get();
        $ciudades = Ciudades::all();
        $parroquias = Parroquias::all();
        $dependencia = Dependencias::find($id);
        return view('modulos.Editar-Dependencia', compact('dependencia', 'provincias', 'parroquias','ciudades'));
        //return view('modulos.Editar-Dependencia')->with('dependencia', $dependencia);

    }

    

    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'provincia' => 'required',
            'num_distritos' => 'required',
            'parroquia' => 'required',
            'cod_distrito' => 'required',
            'nombre_distrito' => 'required',
            'num_circuitos' => 'required',
            'cod_circuito' => 'required',
            'nombre_circuito' => 'required',
            'num_subcircuitos' => 'required',
            'cod_subcircuito' => 'required',
            'nombre_subcircuito' => 'required'
        ]);

        $dependencia = Dependencias::find($id);
        $dependencia->provincia_id = $datos['provincia'];
        $dependencia->num_distritos = $datos['num_distritos']; // Corregido
        $dependencia->parroquia_id = $datos['parroquia'];
        $dependencia->cod_distrito = $datos['cod_distrito'];
        $dependencia->nombre_distrito = $datos['nombre_distrito'];
        $dependencia->num_circuitos = $datos['num_circuitos']; // Corregido
        $dependencia->cod_circuito = $datos['cod_circuito'];
        $dependencia->nombre_circuito = $datos['nombre_circuito'];
        $dependencia->num_subcircuitos = $datos['num_subcircuitos'];
        $dependencia->cod_subcircuito = $datos['cod_subcircuito'];
        $dependencia->nombre_subcircuito = $datos['nombre_subcircuito'];
        
        $dependencia->save();

        return redirect('Dependencias')->with('actualizadoDep', 'Si');
       
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dependencia =Dependencias::findOrfail($id);
        $dependencia->estado_id= '0';
        $dependencia->save();
        return redirect('Dependencias')->with('eliminadoDep', true); //poner alerta con sweetalert indicando que la dependecia se elimino??
        
        /**DB::table('dependencias')->whereId($id)-> delete();
        return redirect('Dependencias');
        */
    }

}
