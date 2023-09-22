<?php

namespace App\Http\Controllers;

use App\Models\Inicio;
use App\Models\Rangos;
use App\Models\Policias;
use App\Models\Ciudades;
use App\Models\TipoSangre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
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
        $inicio = Inicio::find(1);
        return view('modulos.Inicio')->with('inicio', $inicio);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function DatosCreate()  
    {
        
    }


    /**
     * Display the specified resource.
     */
    public function editar(Inicio $inicio)
    {
        $inicio = Inicio::find(1);

        return view ('modulos.Editar-Inicio')->with('inicio',$inicio);
    }

        /**
     * Store a newly created resource in storage.
     */
    public function actualizar(Request $request)
    {
        //$datos = request();
        $datos = $request->all(); // Usar $request->all() para obtener todos los datos
        $inicio = Inicio::find(1);
        $inicio->dias = $datos["dias"];
        $inicio->horaInicio = $datos["horaInicio"];
        $inicio->horaFin = $datos["horaFin"];
        $inicio->direccion = $datos["direccion"]; 
        $inicio->telefono = $datos["telefono"];
        $inicio->email = $datos["email"];

        if (request('logoN')){
            Storage::delete('public/'.$inicio->logo);
            $rutaImg = $request['logoN']->store('inicio', 'public');
            $inicio->logo = $rutaImg;
        }

        if ($request->hasFile('logoN')) { // Verificar si se ha enviado un archivo 'logoN'
            $rutaImg = $request->file('logoN')->store('inicio', 'public'); // Usar 'file' para obtener el archivo
            $inicio->logo = $rutaImg;
        }
        $inicio -> save();

        return view ('modulos.Editar-Inicio')->with('inicio',$inicio);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        // Obtener el policía por ID
        $usuario = Policias::find($id);
        $tiposSangre = TipoSangre::all(); // Agrega esta línea para obtener los tipos de sangre
        $ciudades = Ciudades::all();
        $rangos = Rangos::all();

        // Pasar los datos a la vista
        //return view('modulos.Editar-Policia')->with('policia', $policia);
    //}
        return view("modulos.Editar-Perfil", compact('usuario', 'tiposSangre', 'ciudades', 'rangos'));
        
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
        $usuario = Policias::find($id);

        // Actualizar los campos con los nuevos valores
        $usuario->name = $datos['name'];
        $usuario->email = $datos['email'];
        $usuario->cedula = $datos['cedula'];
        $usuario->fecha_nacimiento = $datos['fecha_nacimiento'];
        $usuario->tipo_sangre_id = $datos['tipo_sangre'];
        $usuario->ciudad_nacimiento_id = $datos['ciudad_nacimiento'];
        $usuario->celular = $datos['celular'];
        $usuario->rango_id = $datos['rango'];
        $usuario->save();

        // Redirigir a la página de visualización de policías
        //return redirect('Editar-Perfil/{$usuario->id}'.$usuario->id)->with('actualizadoP', 'Si')->with('usuario', $usuario);
        return redirect('Editar-Perfil/'.$usuario->id)->with('actualizadoP', 'Si')->with('usuario', $usuario);
        
    }

    public function obtenerUsuario()
    {
        // Obtén los datos del usuario autenticado
        $PerfilUsuario = auth()->user();

        // Resto del código necesario para preparar el modal y luego...
        
        // Pasa los datos del usuario al modal
        return view('tu_vista', compact('PerfilUsuario'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inicio $inicio)
    {
        //
    }
}
