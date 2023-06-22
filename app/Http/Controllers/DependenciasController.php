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

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['
            dependencia' => 'required',
        ]);

        Dependencias::create(['dependencia' => $request->input('dependencia')]);

        return redirect('Dependencias');
    }
  
    /**
     * Display the specified resource.
     
    public function show(Dependencias $dependencias)
    {
        //
    }   
    */

    /**
     * Show the form for editing the specified resource.
     
    public function edit(Dependencias $dependencias)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'dependenciaE' => 'required',
        ]);

        $id = $request->input('id');
        $dependencia = $request->input('dependenciaE');

         /**dd(Request('id'));*/
        DB::table('dependencias')-> where('id',$id)-> update(['dependencia' => $dependencia]) ;

        return redirect('Dependencias');


        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('dependencias')->whereId($id)-> delete();
        return redirect('Dependencias');
    }
}
















