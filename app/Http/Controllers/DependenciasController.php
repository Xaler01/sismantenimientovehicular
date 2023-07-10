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
     */
    public function index()
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"){
                
            return redirect('Inicio');

        }
        $provincias = Provincias::all();
        $ciudades = Ciudades::all();
        $parroquias = Parroquias::all();
        $numDistritos = Parroquias::count();
        /**$dependencias = Dependencias::all();*/
        $dependencias = Dependencias::where('estado_id',1)->get();
        //$dependencias = DB::select('select * from dependencias where estado = "Activo"');
        return view('modulos.Dependencias', compact('dependencias', 'provincias', 'parroquias', 'numDistritos','ciudades')) -> with('dependencias', $dependencias);
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos del formulario
        $datos = $request->validate([
            'provincia' => 'required',
            'num_circuitos' => 'required',
            'parroquia' => 'required',
            'cod_distrito' => 'required',
            'nombre_distrito' => 'required',
            'num_distritos' => 'required',
            'cod_circuito' => 'required',
            'nombre_circuito' => 'required',
            'num_subcircuitos' => 'required',
            'cod_subcircuito' => 'required',
            'nombre_subcircuito' => 'required|unique:dependencias',
        ]);

        // Crear una nueva instancia del modelo Dependencias y asignar los valores
        $dependencia = new Dependencias();
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

        $dependencia->estado_id = 1; // Asigna el ID del estado correspondiente
        // Guardar el objeto Dependencias en la base de datos
        $dependencia->save();

        // Redireccionar a la página principal o a otra vista
        //return redirect('/')->with('success', 'Dependencia creada correctamente');
        return redirect('Dependencias')->with('registradoD', 'Si');
    }
  
/** 
    public function store(Request $request)
    {
        $request->validate([
            'provincia_id' => 'required',
            'num_distritos' => 'required|integer',
            'parroquia_id' => 'required',
            'cod_distrito' => 'required',

            'nombre_distrito' => 'required',
            'num_circuitos' => 'required|integer',
            'cod_circuito' => 'required',
            'nombre_circuito' => 'required',

            'num_subcircuitos' => 'required|integer',
            'cod_subcircuito' => 'required',
            'nombre_subcircuito' => 'required'
        ]);

        Dependencias::create($request->all());

        return redirect('Dependencias')->with('registradoD', 'Si');
    }
*/
    public function edit($id)
    {
        if(auth()-> user()->rol !="Administrador" && auth()-> user()->rol !="Encargado"&& auth()-> user()->rol !="Policia") {
            return redirect('Inicio');
        }

        $dependencia = Dependencias::find($id);
        return view('modulos.Editar-Dependencia')->with('dependencia', $dependencia);
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'provincia' => 'required',
            'num_distritos' => 'required|integer',
            'parroquia' => 'required',
            'cod_distrito' => 'required',
            'nombre_distrito' => 'required',
            'num_circuitos' => 'required|integer',
            'cod_circuito' => 'required',
            'nombre_circuito' => 'required',
            'num_subcircuitos' => 'required|integer',
            'cod_subcircuito' => 'required',
            'nombre_subcircuito' => 'required',
        ]);

        $dependencia = Dependencias::find($id);
        $dependencia->provincia_id = $request->input('provincia');
        $dependencia->num_distritos = $request->input('num_distritos');
        $dependencia->parroquia_id = $request->input('parroquia');
        $dependencia->cod_distrito = $request->input('cod_distrito');
        $dependencia->nombre_distrito = $request->input('nombre_distrito');
        $dependencia->num_circuitos = $request->input('num_circuitos');
        $dependencia->cod_circuito = $request->input('cod_circuito');
        $dependencia->nombre_circuito = $request->input('nombre_circuito');
        $dependencia->num_subcircuitos = $request->input('num_subcircuitos');
        $dependencia->cod_subcircuito = $request->input('cod_subcircuito');
        $dependencia->nombre_subcircuito = $request->input('nombre_subcircuito');
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
