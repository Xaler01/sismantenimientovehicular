@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Editar el policía {{ $policia['name'] }}</h3>
    </section>
    <section class="content">
        <div class="box">
            <!-- Formulario de edición -->
            <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ url('Actualizar-Policia/'.$policia['id']) }}">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <!-- Campos del formulario -->
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" value="{{ $policia->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" name="email" class="form-control" value="{{ $policia->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                <input type="text" name="cedula" class="form-control" value="{{ $policia->cedula }}" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $policia->fecha_nacimiento }}" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="tipo_sangre">Tipo de Sangre</label>
                                <select name="tipo_sangre" class="form-control" required>
                                    @foreach ($tiposSangre as $tipoSangre)
                                        <option value="{{ $tipoSangre->id }}" {{ $policia->tipo_sangre_id == $tipoSangre->id ? 'selected' : '' }}>
                                            {{ $tipoSangre->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ciudad_nacimiento">Ciudad de Nacimiento</label>
                                <select name="ciudad_nacimiento" class="form-control" required>
                                    @foreach ($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}" {{ $policia->ciudad_nacimiento_id == $ciudad->id ? 'selected' : '' }}>
                                            {{ $ciudad->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="celular">Número de Celular</label>
                                <input type="text" name="celular" class="form-control" value="{{ $policia->celular }}" required>
                            </div>
                            <div class="form-group">
                                <label for="rango">Rango</label>
                                <select name="rango" class="form-control" required>
                                    @foreach ($rangos as $rango)
                                        <option value="{{ $rango->id }}" {{ $policia->rango_id == $rango->id ? 'selected' : '' }}>
                                            {{ $rango->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        <a href="{{ url('Policias') }}" class="btn btn-default">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection


