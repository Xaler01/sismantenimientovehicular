@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Editar el Encargador {{ $encargado['name'] }}</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="{{ url('Encargados') }}">
                    <button class="btn btn-primary btn-lg">Volver a Encargados</button>
                </a>
            </div>
        

            <div class="box-body">
                <form method="post" action="{{ url('Actualizar-Encargado/'.$encargado['id']) }}">
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="box-body">
                            <!-- Campos del formulario -->
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" value="{{ $encargado->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" name="email" class="form-control" value="{{ $encargado->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="cedula">Cédula</label>
                                <input type="text" name="cedula" class="form-control" value="{{ $encargado->cedula }}" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $encargado->fecha_nacimiento }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="tipo_sangre">Tipo de Sangre</label>
                                <select name="tipo_sangre" class="form-control" required>
                                    @foreach ($tiposSangre as $tipoSangre)
                                        <option value="{{ $tipoSangre->id }}" {{ $encargado->tipo_sangre_id == $tipoSangre->id ? 'selected' : '' }}>
                                            {{ $tipoSangre->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ciudad_nacimiento">Ciudad de Nacimiento</label>
                                <select name="ciudad_nacimiento" class="form-control" required>
                                    @foreach ($ciudades as $ciudad)
                                        <option value="{{ $ciudad->id }}" {{ $encargado->ciudad_nacimiento_id == $ciudad->id ? 'selected' : '' }}>
                                            {{ $ciudad->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="celular">Número de Celular</label>
                                <input type="text" name="celular" class="form-control" value="{{ $encargado->celular }}" required>
                            </div>
                            <div class="form-group">
                                <label for="rango">Rango</label>
                                <select name="rango" class="form-control" required>
                                    @foreach ($rangos as $rango)
                                        <option value="{{ $rango->id }}" {{ $encargado->rango_id == $rango->id ? 'selected' : '' }}>
                                            {{ $rango->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                        <a href="{{ url('Encargados') }}" class="btn btn-danger btn-lg">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection


