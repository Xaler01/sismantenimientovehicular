@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Personal Policial</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearPolicia">Crear Policia</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>                        
                            <th>ID</th> 
                            <th>Nombre y Apellido</th>
                            <th>Email</th> 
                            <th>Cedula</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Celular</th> 
                            <th>Rango</th>
                            <th>Tipo de sangre</th>
                            <th>Rol</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    
                    <tbody>   
                        @foreach($policias as $policia)
                            @if ($policia->rol=="Policia")
                            <tr>
                                <td>{{ $policia -> id }}</td>
                                <td>{{ $policia -> name }}</td>
                                <td>{{ $policia -> email }}</td>
                                    @if ($policia-> cedula!= "")
                                        <td>{{ $policia -> cedula }}</td>
                                    @else
                                        <td>No registrado</td>
                                    @endif
                                
                                <td>{{ $policia -> fecha_nacimiento }}</td>

                                    @if ($policia-> fecha_nacimiento!= "")
                                        <td>{{ $policia -> celular }}</td>
                                    @else
                                    <td>No registrado</td>
                                    @endif
                                
                                <td>{{ $policia -> rango }}</td>
                                <td>{{ $policia -> tipo_sangre }}</td>
                                <td>{{ $policia -> rol }}</td>                           
                                <td>
                                <a href="Editar-Policia/{{ $policia->id}}">
                                    <button class="btn btn-primary btn-lg" nombre = "{{ $policia -> name }}">Guardar</button>
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
                        <div class="form-group">
                            <h2>Nombre y apellido: </h2>
                            <input type="text" class="form-control input-lg" name="name" required="">
                        </div>
                        <div class="form-group">
                            <h2>Email: </h2>
                            <input type="email" class="form-control input-lg" name="email" value="{{(old ('email'))}}">
                            @error('email')
                                <div class="alert alert-danger">El email ya existe.</div>
                            @enderror
                        </div> 
                        <div class="form-group">
                            <h2>Contraseña: </h2>
                            <input type= "text" class="form-control input-lg" name="password" required=¨¨>
                        </div> 
                        <div class="form-group">
                            <h2>Cedula: </h2>
                            <input type= "text" class="form-control input-lg" name="cedula" required=¨¨>
                        </div> 
                        <div class="form-group">
                            <h2>Fecha de nacimiento: </h2>
                            <input type= "date" class="form-control input-lg" name="fecha_nacimiento" required=¨¨>
                        </div> 
                        <div class="form-group">
                            <h2>Tipo de sangre: </h2>
                            <select class="form-control input-lg" name="tipo_sangre" required=¨¨>
                                <option value="">Seleccionar...</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                             </select>                                
                        </div> 
                        <div class="form-group">
                            <h2>Ciudad de nacimiento: </h2>
                            <input type= "text" class="form-control input-lg" name="ciudad_nacimiento" required=¨¨ oninput="this.value = this.value.toUpperCase()">
                        </div> 
                        <div class="form-group">
                            <h2>Celular: </h2>
                            <input type= "text" class="form-control input-lg" name="celular" required=¨¨>
                        </div> 
                        <div class="form-group">
                            <h2>Rango: </h2>
                            <select class="form-control input-lg" name="rango" required=¨¨>
                                <option value="">Seleccionar...</option>
                                <option value="Policia">Policía</option> 
                                <option value="CaboSegundo">Cabo Segundo</option>
                                <option value="CaboPrimero">Cabo Primero</option>
                                <option value="SargentoSegundo">Sargento Segundo</option>
                                <option value="SargentoPrimero">Sargento Primero</option>
                                <option value="SuboficialSegundo">Suboficial Segundo</option>
                                <option value="SuboficialPrimero">Suboficial Primero</option>
                                <option value="SuboficialMayor">Suboficial Mayor</option>
                                <option value="SubtenientedePolicía">Subteniente de Policía</option>
                                <option value="TenientedePolicía">Teniente de Policía</option>
                                <option value="CapitandePolicía">Capitán de Policía</option>
                                <option value="MayordePolicía">Mayor de Policía</option>
                                <option value="TenienteCoroneldePolicía">Teniente Coronel de Policía</option>
                                <option value="CoroneldePolicía">Coronel de Policía</option>
                                <option value="GeneraldeDistrito">General de Distrito</option>
                                <option value="GeneralInspector">General Inspector</option>
                                <option value="GeneralSuperior">General Superior</option>   
                            </select>                                
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