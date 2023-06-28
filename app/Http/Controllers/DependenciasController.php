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
                
            /**dd($users-> rol);
            */
            return redirect('Inicio');

        }

        $dependencias = Dependencias::all();

        return view('modulos.Dependencias') -> with('dependencias', $dependencias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'provincia' => 'required',
            'num_distritos' => 'required|integer',
            'parroquia' => 'required',
            'cod_distrito' => 'required|integer',
            'nombre_distrito' => 'required',
            'num_circuitos' => 'required|integer',
            'cod_circuito' => 'required|integer',
            'nombre_circuito' => 'required',
            'num_subcircuitos' => 'required|integer',
            'cod_subcircuito' => 'required|integer',
            'nombre_subcircuito' => 'required',
        ]);

        Dependencias::create($request->all());

        return redirect('Dependencias');
    }
    /**
     * Store a newly created resource in storage.
     
    public function store(Request $request)
    {
        $request->validate(['
            dependencia' => 'required',
        ]);

        Dependencias::create(['dependencia' => $request->input('dependencia')]);

        return redirect('Dependencias');
    }
    */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'provinciaE' => 'required',
            'num_distritosE' => 'required|integer',
            'parroquiaE' => 'required',
            'cod_distritoE' => 'required|integer',
            'nombre_distritoE' => 'required',
            'num_circuitosE' => 'required|integer',
            'cod_circuitoE' => 'required|integer',
            'nombre_circuitoE' => 'required',
            'num_subcircuitosE' => 'required|integer',
            'cod_subcircuitoE' => 'required|integer',
            'nombre_subcircuitoE' => 'required',
        ]);

        $id = $request->input('id');
        $dependencia = $request->except(['id', '_token']);

        DB::table('dependencias')->where('id', $id)->update($dependencia);

        return redirect('Dependencias');
    }

    /**
     * Update the specified resource in storage.
     
    public function update(Request $request)
    {
        $request->validate([
            'dependenciaE' => 'required',
        ]);

        $id = $request->input('id');
        $dependencia = $request->input('dependenciaE');

        
        DB::table('dependencias')-> where('id',$id)-> update(['dependencia' => $dependencia]) ;

        return redirect('Dependencias');


        
    }*/

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('dependencias')->whereId($id)-> delete();
        return redirect('Dependencias');
    }
}
