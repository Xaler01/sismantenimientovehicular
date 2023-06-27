@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Dependencias</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearPolicia">Nuevo Subcircuito</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>                        
                            <th>ID</th> 
                            <th>Dependencia</th>
                            <th>Provincia</th> 
                            <th>Parroquia</th>
                            <th>Distrito</th>
                            <th>Circuito</th> 
                            <th>Subcircuito</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    
                    <tbody>   
                        
                        <td>1</td>
                        <td>17H00</td>
                        <td>LOJA</td>
                        <td>Vilcabamba</td>
                        <td>17h01</td>
                        <td>norte</td>
                        <td>huachi</td>
                       
                        <td>
                        
                            <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                            
                            <button class="btn btn-danger EliminarVehiculo" Did="" Placa=""><i class="fa fa-trash"></i></button>
                        </td>
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
                            <input type= "text" class="form-control input-lg" name="ciudad_nacimiento" required=¨¨>
                        </div> 
                        <div class="form-group">
                            <h2>Celular: </h2>
                            <input type= "text" class="form-control input-lg" name="celular" required=¨¨>
                        </div> 
                        <div class="form-group">
                            <h2>Rango: </h2>
                            <select class="form-control input-lg" name="rango" required=¨¨>
                                <option value="">Seleccionar...</option>
                                <option value="GeneralSuperior">General Superior</option>
                                <option value="GeneralInspector">General Inspector</option>
                                <option value="GeneraldeDistrito">General de Distrito</option>
                                <option value="CoroneldePolicía">Coronel de Policía</option>
                                <option value="TenienteCoroneldePolicía">Teniente Coronel de Policía</option>
                                <option value="MayordePolicía">Mayor de Policía</option>
                                <option value="CapitandePolicía">Capitán de Policía</option>
                                <option value="TenientedePolicía">Teniente de Policía</option>
                                <option value="SubtenientedePolicía">Subteniente de Policía</option>
                                <option value="SuboficialMayor">Suboficial Mayor</option>
                                <option value="SuboficialPrimero">Suboficial Primero</option>
                                <option value="SuboficialSegundo">Suboficial Segundo</option>
                                <option value="SargentoPrimero">Sargento Primero</option>
                                <option value="SargentoSegundo">Sargento Segundo</option>
                                <option value="CaboPrimero">Cabo Primero</option>
                                <option value="CaboSegundo">Cabo Segundo</option>
                                <option value="Policia">Policía</option>    
                             </select>                                
                        </div> 
                        <div class="form-group">
                            <h2>Dependencia: </h2>
                            <select class="form-control input-lg" name="id_dependencia" required=¨¨>
                                <option value="">Seleccionar...</option>
                                @foreach($dependencias as $dependencia)
                                <option value="{{$dependencia->id}}">{{$dependencia->dependencia}}</option>
                                @endforeach
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