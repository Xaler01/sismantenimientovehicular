@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Editar Subcircuito {{ $subcircuito->nombre }}</h3>
    </section>  
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="{{ url('Subcircuitos') }}">
                    <button class="btn btn-primary btn-lg">Volver a parroquias</button>
                </a>
            </div>
            <div class="box-body">
                <form method="POST" action="{{ url('Actualizar-Subcircuito/'.$subcircuito->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="parroquia_id">Nombre Parroquia:</label>
                                <input type="text" class="form-control" name="parroquia" id="parroquia" value="{{ $subcircuito->parroquia->nombre }}" readonly>
                                <input type="hidden" name="parroquia_id" value="{{ $subcircuito->parroquia->id }}">
                                
                            </div>
                            <div class="form-group">
                                <label for="distrito">Nombre Distrito:</label>
                                <input type="text" class="form-control " name="distrito" id="distrito" value="{{ $subcircuito->Circuito->Distritos->nombre }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="circuito">Circuito:</label>
                                <select class="form-control" name="circuito" id="circuito" required>
                                    @foreach($circuitos as $circuito)
                                        <option value="{{ $circuito->id }}" {{ $subcircuito->circuito_id == $circuito->id ? 'selected' : '' }}>
                                            {{ $circuito->nombre }}
                                        </option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="form-group">
                                <label for="codigo_subcircuito">Código Subcircuito:</label>
                                <input type="text" class="form-control " name="codigo_subcircuito" id="codigo_subcircuito" value="{{ $subcircuito->codigo }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="subcircuito">Subircuito:</label>
                                <input type="text" class="form-control " name="subcircuito" id="subcircuito" value="{{ $subcircuito->nombre }}" required oninput="this.value = this.value.toUpperCase()">
                            </div>

                            
                            
                            <div class="form-group">
                                <label for="estado">Estado:</label>
                                <select class="form-control" name="estado" id="estado">
                                    <option value="Activo" {{ $subcircuito->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="Eliminado" {{ $subcircuito->estado == 'Eliminado' ? 'selected' : '' }}>Eliminado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                    <a href="{{ url('Subcircuitos') }}">
                        <button type="button" class="btn btn-danger btn-lg" >Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection
