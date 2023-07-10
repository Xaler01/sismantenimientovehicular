<?php
namespace App\Http\Controllers;

use App\Models\Ciudades;
use App\Models\Dependencias;
use App\Models\Policias;
use App\Models\TipoSangre;
use App\Models\Rangos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        if (auth()->user()->rol != "Administrador" && auth()->user()->rol != "Encargado") {
            return redirect('Inicio');
        }

        $dependencias = Dependencias::all();
        $tiposSangre = TipoSangre::all();
        $ciudades = Ciudades::all();
        $rangos = Rangos::all();

        $policias = Policias::where('estado_id', 1)->get();

        return view('modulos.Policias', compact('dependencias', 'policias', 'tiposSangre', 'ciudades', 'rangos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:3'],
            'cedula' => ['required', 'min:10'],
            'fecha_nacimiento' => ['required', 'date'],
            'tipo_sangre' => ['required'],
            'ciudad_nacimiento' => ['required'],
            'celular' => ['required', 'min:10'],
            'rango' => ['required']
        ]);

        Policias::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
            'cedula' => $datos['cedula'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
            'tipo_sangre_id' => $datos['tipo_sangre'],
            'ciudad_nacimiento_id' => $datos['ciudad_nacimiento'],
            'celular' => $datos['celular'],
            'rango_id' => $datos['rango'],
            'rol' => 'Policia',
            'estado_id' => 1 // Establece el estado inicial del policía
        ]);

        return redirect('Policias')->with('registrado', 'Si');
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
        $tiposSangre = TipoSangre::all(); // Agrega esta línea para obtener los tipos de sangre
        $ciudades = Ciudades::all();
        $rangos = Rangos::all();

        // Pasar los datos a la vista
        //return view('modulos.Editar-Policia')->with('policia', $policia);
    //}
        return view('modulos.Editar-Policia', compact('policia', 'tiposSangre','ciudades', 'rangos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos actualizados del formulario
        $datos = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cedula' => 'required|max:10',
            'fecha_nacimiento' => 'required|date',
            'tipo_sangre' => 'required',
            'ciudad_nacimiento' => 'required',
            'celular' => 'required|between:10,13',
            'rango' => 'required'
        ]);

        // Buscar el policía por ID
        $policia = Policias::find($id);

        // Actualizar los campos con los nuevos valores
        $policia->name = $datos['name'];
        $policia->email = $datos['email'];
        $policia->cedula = $datos['cedula'];
        $policia->fecha_nacimiento = $datos['fecha_nacimiento'];
        $policia->tipo_sangre_id = $datos['tipo_sangre'];
        $policia->ciudad_nacimiento_id = $datos['ciudad_nacimiento'];
        $policia->celular = $datos['celular'];
        $policia->rango_id = $datos['rango'];
        $policia->save();

        // Redirigir a la página de visualización de policías
        return redirect('Policias')->with('actualizadoP', 'Si');
    }

    public function destroy($id)
    {
        // Buscar el usuario por su ID
        $policia = Policias::find($id);

        if ($policia) {
            // Cambiar el estado del usuario a "Eliminado"
            $policia->estado_id = 0; // ID del estado "Eliminado"
            $policia->save();
        }

        return redirect('Policias')->with('eliminadoP', true);
    }
}
