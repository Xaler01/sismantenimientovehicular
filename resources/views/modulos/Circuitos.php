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
                            <th>No. Circuito</th>
                            <th>Nombre Circuito</th> 
                            <th>No. Subcircuitos</th>
                            <th>Cod. Subcircuito</th>
                            <th>Nombre Subircuito</th> 
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($dependencias as $dependencia)
                        <tr>
                            <td>{{$dependencia->id}}</td>
                            <td>{{$dependencia->provincia}}</td>
                            <td>{{$dependencia->num_distritos}}</td>
                            <td>{{$dependencia->parroquia}}</td>
                            <td>{{$dependencia->cod_distrito}}</td>
                            <td>{{$dependencia->nombre_distrito}}</td>
                            <td>{{$dependencia->num_circuitos}}</td>
                            <td>{{$dependencia->cod_circuito}}</td>
                            <td>{{$dependencia->nombre_circuito}}</td>
                            <td>{{$dependencia->cod_subcircuito}}</td>
                            <td>{{$dependencia->nombre_subcircuito}}</td>
                            <td>
                                <button class="btn btn-success"data-toggle="modal" data-target="#ModificarDependencia" data-dependencia-id="{{$dependencia->id}}"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger EliminarDependencia" Did="" Nombre=""><i class="fa fa-trash"></i></button>
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
            <form method="post">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provincia">Nueva Provincia:</label>
                                    <input type="text" class="form-control input-lg" name="provincia" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label for="num_distritos">No. Distritos:</label>
                                    <input type="number" class="form-control input-lg" name="num_distritos" required>
                                </div>
                                <div class="form-group">
                                    <label for="parroquia">Parroquia:</label>
                                    <input type="text" class="form-control input-lg" name="parroquia" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label for="cod_distrito">Cod. Distrito:</label>
                                    <input type="text" class="form-control input-lg" name="cod_distrito" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_distrito">Nombre Distrito:</label>
                                    <input type="text" class="form-control input-lg" name="nombre_distrito" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label for="num_circuitos">No. Circuitos:</label>
                                    <input type="number" class="form-control input-lg" name="num_circuitos" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cod_circuito">Cod. Circuito:</label>
                                    <input type="text" class="form-control input-lg" name="cod_circuito" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_circuito">Nombre Circuito:</label>
                                    <input type="text" class="form-control input-lg" name="nombre_circuito" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label for="num_subcircuitos">No. Subcircuitos:</label>
                                    <input type="number" class="form-control input-lg" name="num_subcircuitos" required>
                                </div>
                                <div class="form-group">
                                    <label for="cod_subcircuito">Cod. Subcircuito:</label>
                                    <input type="text" class="form-control input-lg" name="cod_subcircuito" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_subcircuito">Nombre Subcircuito:</label>
                                    <input type="text" class="form-control input-lg" name="nombre_subcircuito" required oninput="this.value = this.value.toUpperCase()">
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

<div id="ModificarDependencia" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ url('Actualizar-Dependencia/'.$dependencia->id) }}">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provincia">Provincia:</label>
                                    <input type="text" class="form-control input-lg" name="provincia" id="provinciaM" value="{{$dependencia->provincia}}" required oninput="this.value = this.value.toUpperCase()">
                                    <input type="hidden" id="dependenciaId" name="dependenciaId" value="">
                                </div>
                                <div class="form-group">
                                    <label for="num_distritos">No. Distritos:</label>
                                    <input type="number" class="form-control input-lg" name="   " id="num_distritosM" value="{{$dependencia->num_distritos}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="parroquia">Parroquia:</label>
                                    <input type="text" class="form-control input-lg" name="parroquia" id="parroquiaM" value="{{$dependencia->parroquia}}" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label for="cod_distrito">Cod. Distrito:</label>
                                    <input type="text" class="form-control input-lg" name="cod_distrito" id="cod_distritoM" value="{{$dependencia->cod_distrito}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_distrito">Nombre Distrito:</label>
                                    <input type="text" class="form-control input-lg" name="nombre_distrito" id="nombre_distritoM" value="{{$dependencia->nombre_distrito}}" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label for="num_circuitos">No. Circuitos:</label>
                                    <input type="number" class="form-control input-lg" name="num_circuitos" id="num_distritosM" value="{{$dependencia->num_distritos}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label for="cod_circuito">Cod. Circuito:</label>
                                    <input type="text" class="form-control input-lg" name="cod_circuito" id="cod_circuitoM" value="{{$dependencia->cod_circuito}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_circuito">Nombre Circuito:</label>
                                    <input type="text" class="form-control input-lg" name="nombre_circuito" id="nombre_circuitoM" value="{{$dependencia->nombre_circuito}}" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label for="num_subcircuitos">No. Subcircuitos:</label>
                                    <input type="number" class="form-control input-lg" name="num_subcircuitos" id="num_subcircuitosM" value="{{$dependencia->num_subcircuitos}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="cod_subcircuito">Cod. Subcircuito:</label>
                                    <input type="text" class="form-control input-lg" name="cod_subcircuito" id="cod_subcircuitoM" value="{{$dependencia->cod_subcircuito}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nombre_subcircuito">Nombre Subcircuito:</label>
                                    <input type="text" class="form-control input-lg" name="nombre_subcircuito" id="nombre_subcircuitoM" value="{{$dependencia->nombre_subcircuito}}" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>            
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#ModificarDependencia').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Botón que activó el modal
            var dependenciaId = button.data('dependencia-id'); // Extraer el ID de la dependencia desde el botón

            // Establecer el ID de la dependencia en el campo oculto del modal de modificación
            $('#dependenciaId').val(dependenciaId);
        });
    });
</script>
@endsection