<?php

namespace App\Http\Controllers;

use App\Models\Dependencias;
use App\Models\Policias;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PersonalSubcircuito; 
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

        $policias = Policias::where('estado', 'activo')->get();

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
            'cedula' => ['required', 'min:10'],
            'fecha_nacimiento' => ['required', 'date'],
            'tipo_sangre' => ['required'],
            'ciudad_nacimiento' => ['required'],
            'celular' => ['required', 'min:10'],
            'rango' => ['required']
            /**,
            'id_dependencia' => ['required']    */

        ]);
        
        Policias::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
            'cedula' => $datos['cedula'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
            'tipo_sangre' => $datos['tipo_sangre'],
            'ciudad_nacimiento' => $datos['ciudad_nacimiento'],
            'celular' => $datos['celular'],
            'rango' => $datos['rango'],
            /**'id_dependencia' => $datos['id_dependencia'],*/
            'rol' => 'Policia'
        ]);

          return redirect('Policias')->with('registrado', 'Si');
          /**$policias = new Policias(); */
        
    }

    
        /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Verificar el rol del usuario
        if (auth()->user()->rol != "Administrador" && auth()->user()->rol != "Encargado" && auth()->user()->rol != "Policia") {
            return redirect('Inicio');
        }

        // Obtener el policía por ID
        $policia = Policias::find($id);

        // Pasar los datos a la vista
        return view('modulos.Editar-Policia')->with('policia', $policia);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos actualizados del formulario
        //$datos = $request->validate([
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'cedula' => 'required|min:10',
            'fecha_nacimiento' => 'required|date',
            'tipo_sangre' => 'required',
            'ciudad_nacimiento' => 'required',
            'celular' => 'required|min:10',
            'rango' => 'required'
        ]);

        // Buscar el policía por ID
        $policia = User::find($id);

        // Actualizar los campos con los nuevos valores
        $policia->name = $request['name'];
        $policia->email = $request['email'];
        $policia->cedula = $request['cedula'];
        $policia->fecha_nacimiento = $request['fecha_nacimiento'];
        $policia->tipo_sangre = $request['tipo_sangre'];
        $policia->ciudad_nacimiento = $request['ciudad_nacimiento'];
        $policia->celular = $request['celular'];
        $policia->rango = $request['rango'];
        $policia->save();

        // Redirigir a la página de visualización de policías
        return redirect('Policias')->with('actualizadoP', 'Si');
    }

    public function destroy($id)
    {
        // Buscar el usuario por su ID
        $policia = User::find($id);

        if ($policia) {
            // Cambiar el estado del usuario a "Eliminado"
            $policia->estado = 'Eliminado';
            $policia->save();
        }
        return redirect('Policias')->with('eliminadoP', true);
      
    }
}
