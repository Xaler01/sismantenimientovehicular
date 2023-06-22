<?php

namespace App\Http\Controllers;

use App\Models\Dependencias;
use App\Models\Policias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PoliciasController extends Controller
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

        $dependencias = Dependencias::all();

        $policias = Policias::all();

        return view('modulos.Policias', compact('dependencias','policias'));
        /**
        return view('modulos.Policias')-> with('dependencias', $dependencias);
        */   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = request()-> validate([
            'name' => ['required'],
            'email' => ['required','string','email','unique:users'],
            'password' => ['required','string','min:3'],
            'rango' => ['required'],
            'id_dependencia' => ['required']    
        ]);
        Policias::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
            'cedula' => '',
            'celular' =>  '',
            'rango'=> $datos['rango'],
            'id_dependencia' => $datos['id_dependencia'],
            'rol'=>'Conductor'
        ]);

            return redirect('Policias')->with('registrado', 'Si');
          /**$policias = new Policias(); */
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('users')->whereId($id)->delete();

        return redirect('Policias');
        
    }
}
