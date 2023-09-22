@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Editar Parroquia {{ $parroquia->nombre }}</h3>
    </section>  
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="{{ url('Parroquias') }}">
                    <button class="btn btn-primary btn-lg">Volver a parroquias</button>
                </a>
            </div>
            <div class="box-body">
                <form method="POST" action="{{ url('Actualizar-Parroquia/'.$parroquia->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provincia">Provincia:</label>
                                <select class="form-control" name="provincia" id="provincia" required>
                                    @foreach($provincias as $provincia)
                                        <option value="{{ $provincia->id }}" {{ $parroquia->provincia_id == $provincia->id ? 'selected' : '' }}>
                                            {{ $provincia->nombre }}
                                        </option>
                                    @endforeach
                                </select> 
                            </div>
                            
                            <div class="form-group">
                                <label for="parroquia">Nombre Distrito:</label>
                                <input type="text" class="form-control " name="parroquia" id="parroquia" value="{{ $parroquia->nombre }}" required oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select class="form-control" name="estado" id="estado">
                                    <option value="Activo" {{ $parroquia->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="Eliminado" {{ $parroquia->estado == 'Eliminado' ? 'selected' : '' }}>Eliminado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                    <a href="{{ url('Parroquias') }}">
                        <button type="button" class="btn btn-danger btn-lg" >Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection
