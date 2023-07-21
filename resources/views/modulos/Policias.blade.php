@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Personal Policial</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearPolicia">Nuevo Policia</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>                        
                            <th>ID</th> 
                            <th>Nombre y Apellido</th>
                            <th>Email</th> 
                            <th>Cédula</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Celular</th> 
                            <th>Rango</th>
                            <th>Tipo de sangre</th>
                            <th>Rol</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    
                    <tbody>   
                        @foreach($policias as $policia)
                            @if ($policia->rol=="Policia")
                            <tr>
                                <td>{{ $policia -> id }}</td>
                                <td>{{ $policia -> name }}</td>
                                <td>{{ $policia -> email }}</td>
                                <td>{{ $policia -> cedula }}</td>
                                <td>{{ $policia -> fecha_nacimiento }}</td>
                                <td>{{ $policia -> celular }}</td>
                                <td>{{ $policia -> rango -> nombre }}</td>
                                <td>{{ $policia -> tipoSangre->nombre }}</td>
                                <td>{{ $policia -> rol }}</td>                           
                                <td>
                                <a href="Editar-Policia/{{ $policia->id}}">
                                    <button class="btn btn-success" nombre = "{{ $policia -> name }}"><i class="fa fa-pencil"></i></button>
                                </a>
                                    <button class="btn btn-danger EliminarPolicia" Pid = "{{ $policia -> id }}" nombre = "{{ $policia -> name }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>                             
                            @endif                          
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<div id="CrearPolicia" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nombre y apellido:</label>
                                <input type="text" class="form-control" name="name" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" value="{{(old ('email'))}}">
                                @error('email')
                                    <div class="alert alert-danger">El email ya existe.</div>
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label for="password">Contraseña:</label>
                                <input type= "password" class="form-control" name="password" required=¨¨>
                            </div> 
                            <div class="form-group">
                                <label for="cedula">Cedula:</label>
                                <input type= "text" class="form-control" name="cedula" required pattern="[0-9]{0,10}">
                            </div> 
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                                <input type= "date" class="form-control" name="fecha_nacimiento" required=¨¨>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo_sangre">Tipo de sangre:</label>
                                <select class="form-control" name="tipo_sangre" id="tipo_sangre" required>
                                    <option value="">Seleccionar...</option>
                                    @foreach($tiposSangre as $tipoSangre)
                                        <option value="{{ $tipoSangre->id }}">{{ $tipoSangre->nombre }}</option>
                                    @endforeach
                                </select>                            
                            </div> 
                            <div class="form-group">
                                <label for="ciudad_nacimiento">Ciudad de nacimiento:</label>
                                <select class="form-control" name="ciudad_nacimiento" id="ciudad_nacimiento" required>
                                    <option value="">Seleccionar...</option>
                                    @foreach($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                    @endforeach
                                </select>  
                            </div> 
                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <input type= "text" class="form-control" name="celular" required=¨¨>
                            </div> 
                            <div class="form-group">
                                <label for="rango">Rango:</label>
                                <select class="form-control" name="rango" id="rango" required>
                                    <option value="">Seleccionar...</option>
                                    @foreach($rangos as $rango)
                                        <option value="{{ $rango->id }}">{{ $rango->nombre }}</option>
                                    @endforeach
                                </select>                                 
                            </div> 
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>            
    </div>
</div>
@endsection