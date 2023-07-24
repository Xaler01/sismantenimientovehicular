@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Editar subcircuito{{$parroquia-> nombre}}</h3>
    </section>  
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="{{ url('Parroquia') }}">
                    <button class="btn btn-primary btn-lg">Volver a dependencias</button>
                </a>
            </div>
            <div class="box-body">
                <!--<form method="post" action="{{ url('Actualizar-Dependencia/'.$dependencia->id) }}">-->
                <form method="POST" action="{{ url('Actualizar-Parroquia/'.$parroquia->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group">
                            <label for="provincia">Provincia:</label>
                            <select class="form-control" name="provincia" id="provincia" required>
                                @foreach($provincias as $provincia)
                                    <option value="{{$provincia->id}}" {{ $dependencia->provincia_id == $provincia->id ? 'selected' : '' }}>{{ $provincia->nombre }}</option>
                                @endforeach
                            </select> 
                        </div>
                        
                        <div class="form-group">
                            <label for="parroquia">Nombre Distrito:</label>
                            <input type="text" class="form-control input-lg" name="parroquia" id="parroquia" value="{{$parroquia->nombre}}" required oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="form-group">
                                <label for="estado">Estado:</label>
                                <input type="text" class="form-control input-lg" name="estado" id="estado" value="{{$parroquiia->estado}}" >
                                <option value="{{$parroquiia->estado}}" {{ $parroquia->estado ==  ? 'selected' : '' }}>{{ $provincia->estado }}</option>
                                <option value="Activo" >Activo</option>
                                <option value="Eliminado" >Eliminado</option>
                            </div>
                        
                        
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                    <a href="{{ url('Parroquias') }}">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection