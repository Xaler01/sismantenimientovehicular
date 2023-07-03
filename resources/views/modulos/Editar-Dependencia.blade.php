@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Editar subcircuito {{$dependencia-> nombre_subcircuito}}</h3>
    </section>  
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="{{ url('Dependencias') }}">
                    <button class="btn btn-primary btn-lg">Volver a dependencias</button>
                </a>
            </div>
            <div class="box-body">
                <!--<form method="post" action="{{ url('Actualizar-Dependencia/'.$dependencia->id) }}">-->
                <form method="POST" action="{{ url('Actualizar-Dependencia/' . $dependencia->id) }}">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provincia">Provincia:</label>
                                <input type="text" class="form-control input-lg" name="provincia" id="provincia" value="{{$dependencia->provincia}}" required oninput="this.value = this.value.toUpperCase()">
                                <!--<input type="hidden" id="dependenciaId" name="dependenciaId" value="">-->
                            </div>
                            <div class="form-group">
                                <label for="num_distritos">No. Distritos:</label>
                                <input type="number" class="form-control input-lg" name="num_distritos" id="num_distritos" value="{{$dependencia->num_distritos}}" required>
                            </div>
                            <div class="form-group">
                                <label for="parroquia">Parroquia:</label>
                                <input type="text" class="form-control input-lg" name="parroquia" id="parroquia" value="{{$dependencia->parroquia}}" required oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group">
                                <label for="cod_distrito">Cod. Distrito:</label>
                                <input type="text" class="form-control input-lg" name="cod_distrito" id="cod_distrito" value="{{$dependencia->cod_distrito}}" required oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group">
                                <label for="nombre_distrito">Nombre Distrito:</label>
                                <input type="text" class="form-control input-lg" name="nombre_distrito" id="nombre_distrito" value="{{$dependencia->nombre_distrito}}" required oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group">
                                <label for="num_circuitos">No. Circuitos:</label>
                                <input type="number" class="form-control input-lg" name="num_circuitos" id="num_distritos" value="{{$dependencia->num_distritos}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="cod_circuito">Cod. Circuito:</label>
                                <input type="text" class="form-control input-lg" name="cod_circuito" id="cod_circuito" value="{{$dependencia->cod_circuito}}" required oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group">
                                <label for="nombre_circuito">Nombre Circuito:</label>
                                <input type="text" class="form-control input-lg" name="nombre_circuito" id="nombre_circuito" value="{{$dependencia->nombre_circuito}}" required oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group">
                                <label for="num_subcircuitos">No. Subcircuitos:</label>
                                <input type="number" class="form-control input-lg" name="num_subcircuitos" id="num_subcircuitos" value="{{$dependencia->num_subcircuitos}}" required>
                            </div>
                            <div class="form-group">
                                <label for="cod_subcircuito">Cod. Subcircuito:</label>
                                <input type="text" class="form-control input-lg" name="cod_subcircuito" id="cod_subcircuito" value="{{$dependencia->cod_subcircuito}}" required oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group">
                                <label for="nombre_subcircuito">Nombre Subcircuito:</label>
                                <input type="text" class="form-control input-lg" name="nombre_subcircuito" id="nombre_subcircuito" value="{{$dependencia->nombre_subcircuito}}" required oninput="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                    <a href="{{ url('Dependencias') }}">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection