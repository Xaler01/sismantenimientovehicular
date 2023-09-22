<?php

namespace App\Http\Controllers;

use App\Models\Encargados;
use App\Models\Dependencias;
use App\Models\TipoSangre;
use App\Models\Ciudades;
use App\Models\Rangos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EncargadosController extends Controller
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
    if (auth()->user()->rol !== "Administrador") {
        return redirect('Inicio');
    }
    
    $dependencias = Dependencias::all();
    $tiposSangre = TipoSangre::all();
    $ciudades = Ciudades::all();
    $rangos = Rangos::all();

    $encargados = Encargados::where('rol', 'Encargado')
                             ->where('estado_id', 1)
                             ->get();

    return view('modulos.Encargados', compact('dependencias', 'tiposSangre', 'ciudades', 'rangos', 'encargados'));
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

        Encargados::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
            'cedula' => $datos['cedula'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
            'tipo_sangre_id' => $datos['tipo_sangre'],
            'ciudad_nacimiento_id' => $datos['ciudad_nacimiento'],
            'celular' => $datos['celular'],
            'rango_id' => $datos['rango'],
            'rol' => 'Encargado',
            'estado_id' => 1 // Establece el estado inicial del policía
        ]);

        return redirect('Encargados')->with('registrado', 'Si');
    }


    public function edit($id)
    {
        // Verificar el rol del usuario
        if (auth()->user()->rol != "Administrador" && auth()->user()->rol != "Encargado" && auth()->user()->rol != "Policia") {
            return redirect('Inicio');
        }

        // Obtener el policía por ID
        $encargado = Encargados::find($id);
        $tiposSangre = TipoSangre::all(); // Agrega esta línea para obtener los tipos de sangre
        $ciudades = Ciudades::all();
        $rangos = Rangos::all();

        // Pasar los datos a la vista
        //return view('modulos.Editar-Policia')->with('policia', $policia);
    //}
        return view('modulos.Editar-Encargado', compact('encargado', 'tiposSangre','ciudades', 'rangos'));
    }

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
        $encargado = Encargados::find($id);

        // Actualizar los campos con los nuevos valores
        $encargado->name = $datos['name'];
        $encargado->email = $datos['email'];
        $encargado->cedula = $datos['cedula'];
        $encargado->fecha_nacimiento = $datos['fecha_nacimiento'];
        $encargado->tipo_sangre_id = $datos['tipo_sangre'];
        $encargado->ciudad_nacimiento_id = $datos['ciudad_nacimiento'];
        $encargado->celular = $datos['celular'];
        $encargado->rango_id = $datos['rango'];
        $encargado->save();

        // Redirigir a la página de visualización de policías
        return redirect('Encargados')->with('actualizadoP', 'Si');
    }

    public function destroy($id)
    {
        // Buscar el usuario por su ID
        $encargado = Encargados::find($id);

        if ($encargado) {
            // Cambiar el estado del usuario a "Eliminado"
            $encargado->estado_id = 0; // ID del estado "Eliminado"
            $encargado->save();
        }

        return redirect('Encargados')->with('eliminadoP', true);
    }
}
