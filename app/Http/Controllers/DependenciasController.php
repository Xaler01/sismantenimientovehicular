<?php

namespace App\Http\Controllers;

use App\Models\Dependencias;
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

        /**$dependencias = Dependencias::all();*/
        $dependencias = DB::select('select * from dependencias where estado = "Activo"');
        return view('modulos.Dependencias') -> with('dependencias', $dependencias);
    }

    public function store(Request $request)
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
            'nombre_subcircuito' => 'required'
        ]);

        Dependencias::create($request->all());

        return redirect('Dependencias')->with('registradoD', 'Si');
    }

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
        $dependencia->provincia = $request->input('provincia');
        $dependencia->num_distritos = $request->input('num_distritos');
        $dependencia->parroquia = $request->input('parroquia');
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
        $dependencia->estado= 'Eliminado';
        $dependencia->save();
        return redirect('Dependencias')->with('eliminadoDep', true); //poner alerta con sweetalert indicando que la dependecia se elimino??
        
        /**DB::table('dependencias')->whereId($id)-> delete();
        return redirect('Dependencias');
        */
    }

}
