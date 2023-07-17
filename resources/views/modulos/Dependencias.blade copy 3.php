@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Dependencias</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearDependencia">Nuevo Subcircuito</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>                        
                            <th>ID</th> 
                            <th>Provincia</th>
                            <th>No. Distritos</th>  
                            <th>Parroquia</th>  
                            <th>Cod. Distrito</th>

                            <th>Nomb Distrito</th>
                            <th>No. Circuitos</th>
                            <th>Cod. Circuito</th>
                            <th>Nombre Circuito</th> 
                            <th>No. Subcircuitos</th>
                            <th>Cod. Subcircuito</th>
                            <th>Nombre Subircuito</th> 
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($dependencia as $dependencia)
                        <tr>
                            <td>{{$dependencia->subcircuito_id}}</td>
                            <td>{{$dependencia->provincia_nombre}}</td>
                            <!--<td>{{$dependencia->num_distritos}}</td>-->
                            <td>22</td>
                            <td>{{$dependencia->parroquia_nombre}}</td>
                            <td>{{$dependencia->distrito_codigo}}</td>

                            <td>{{$dependencia->distrito_nombre}}</td>
                            <td>9</td>
                            <td>{{$dependencia->circuito_codigo}}</td>
                            <td>{{$dependencia->nombre_circuito}}</td>
                            <td>2</td>

                            <td>{{$dependencia->subcircuito_codigo}}</td>
                            <td>{{$dependencia->subcircuito_nombre}}</td>        
                            <td>
                                <a href="Editar-Dependencia/{{ $dependencia->id}}">
                                    <button class="btn btn-success" nombre = "{{ $dependencia -> nombre_subcircuito }}"><i class="fa fa-pencil"></i></button>
                                </a>
                                <button class="btn btn-danger EliminarDependencia" Did="{{ $dependencia->id}}" nombre="{{ $dependencia->nombre_subcircuito}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div id="CrearDependencia" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="GET" action="{{ url('Dependencias') }}">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provincia">Provincia:</label>
                                    <select class="form-control" name="provincia" id="provincia" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach($provincias as $provincia)
                                            <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                                        @endforeach
                                    </select>  
                                </div>
                                <div class="form-group">
                                    <label for="num_distritos">No. Distritos:</label>
                                    <input type="number" class="form-control" name="num_distritos" id="num_distritos">
                                </div>
                                <div class="form-group" id="parroquia-group">
                                    <label for="parroquia">Parroquia:</label>
                                    <select class="form-control" name="parroquia" id="parroquia" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach($parroquias as $parroquia)
                                            <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="cod_distrito">Cod. Distrito:</label>
                                    <input type="text" class="form-control" name="cod_distrito" id="cod_distrito" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_distrito">Nombre Distrito:</label>
                                    <input type="text" class="form-control " name="nombre_distrito" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label for="num_circuitos">No. Circuitos:</label>
                                    <input type="number" class="form-control " name="num_circuitos" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cod_circuito">Cod. Circuito:</label>
                                    <input type="text" class="form-control" name="cod_circuito" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_circuito">Nombre Circuito:</label>
                                    <input type="text" class="form-control" name="nombre_circuito" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label for="num_subcircuitos">No. Subcircuitos:</label>
                                    <input type="number" class="form-control" name="num_subcircuitos" required>
                                </div>
                                <div class="form-group">
                                    <label for="cod_subcircuito">Cod. Subcircuito:</label>
                                    <input type="text" class="form-control" name="cod_subcircuito" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_subcircuito">Nombre Subcircuito:</label>
                                    <input type="text" class="form-control" name="nombre_subcircuito" required oninput="this.value = this.value.toUpperCase()" value="{{ old('nombre_subcircuito') }}">
                                    @error('nombre_subcircuito')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
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
