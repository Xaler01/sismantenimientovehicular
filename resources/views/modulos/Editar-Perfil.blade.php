@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Perfil - {{ $usuario->rango->nombre }}. {{ $usuario['name'] }}</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="{{ url('Inicio') }}">
                    <button class="btn btn-primary btn-flat">Volver a Inicio</button>
                </a>
            </div>
            
            <div class="box-body">
                <form method="post" action="{{ url('Actualizar-Perfil/' . $usuario->id) }}">

                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre y apellido:</label>
                            
                            <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" value= "{{ $usuario->email }}" >
                            @error('email')
                                <div class="alert alert-danger">El email ya existe.</div>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type= "password" class="form-control" name="password" value= "{{ $usuario->password }}" required=¨¨>
                        </div> 
                        <div class="form-group">
                            <label for="cedula">Cedula:</label>
                            <input type= "text" class="form-control" name="cedula" value= "{{ $usuario->cedula }}" required pattern="[0-9]{0,10}">
                        </div> 
                        <div class="form-group">
                            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                            <input type= "date" class="form-control" name="fecha_nacimiento" value= "{{ $usuario->fecha_nacimiento }}" required=¨¨>
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo_sangre">Tipo de sangre:</label>
                            <select class="form-control" name="tipo_sangre" id="tipo_sangre" required>
                                
                                <option value= "{{ $usuario->tipo_sangre_id }}">{{ $usuario->tipoSangre->nombre }}</option>
                                @foreach($tiposSangre as $tipoSangre)
                                    <option value="{{ $tipoSangre->id }}">{{ $tipoSangre->nombre }}</option>
                                @endforeach
                            </select>                            
                        </div> 
                        <div class="form-group">
                            <label for="ciudad_nacimiento">Ciudad de nacimiento:</label>
                            <select class="form-control" name="ciudad_nacimiento" id="ciudad_nacimiento" required>
                            @foreach($ciudades as $ciudad)
                                <option value="{{ $usuario->ciudad_nacimiento_id}}" {{ $usuario->ciudad_nacimiento_id == $ciudad->id ? 'selected' : '' }}>{{ $ciudad->nombre }}</option>
                            @endforeach
                            </select>  
                        </div> 
                        <div class="form-group">
                            <label for="celular">Celular:</label>
                            <input type= "text" class="form-control" name="celular" value= "{{ $usuario->celular }}" required=¨¨>
                        </div> 
                        <div class="form-group">
                            <label for="rango">Rango:</label>
                            <input type= "text" class="form-control" value= "{{ $usuario->rango->nombre}}" required=¨¨ readonly>
                            <input type= "hidden" class="form-control" name="rango" id="rango" value= "{{ $usuario->rango_id}}" required=¨¨ readonly>                              
                        </div> 
                        <div class="form-group">
                            <label for="subcircuito">Subcircuito:</label>
                            <input type="text" class="form-control" name="subcircuito" id="subcircuito" value="{{ $usuario->dependencia->nombre ?? 'No asignado' }}" required readonly>
                            
                                           
                                                         
                        </div> 
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                        <a class="btn btn-danger btn-lg" onclick="window.history.back()">Cancelar</a>
                        <!--<button class="btn btn-danger btn-lg" onclick="window.history.back()">Cancelar</button>
                        
                        <a href="{{ url('Editar-Perfil') }}" class="btn btn-danger btn-lg">Cancelar</a>
                        -->
                    </div>
                </form>
            </div>

            
        </div>
    </section>
</div>
@endsection


