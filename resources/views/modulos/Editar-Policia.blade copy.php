@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Editar el policía {{ $policia['name'] }}</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="{{ url('Policias') }}">
                    <button class="btn btn-primary">Volver a policías</button>
                </a>
            </div>
            <div class="box-body">
                <form method="post" action="{{ url('Actualizar-Policia/'.$policia['id']) }}">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $policia['name'] }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $policia['email'] }}">
                    </div>
                    <div class="form-group">
                        <label for="cedula">Cédula:</label>
                        <input type="text" class="form-control" name="cedula" id="cedula" value="{{ $policia->cedula }}">
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $policia->fecha_nacimiento }}">
                    </div>
                    <div class="form-group">
                        <label for="tipo_sangre">Tipo de sangre:</label>
                        <select type="text" class="form-control" name="tipo_sangre" id="tipo_sangre">
                            <option value="{{ $policia->tipo_sangre }}">{{ $policia->tipo_sangre }}</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select>
                        <select class="form-control" name="tipo_sangre" id="tipo_sangre" required>
                            <option value="">Seleccionar...</option>
                            @foreach($tiposSangre as $tipoSangre)
                                <option value="{{ $tipoSangre->id }}">{{ $tipoSangre->nombre }}</option>
                            @endforeach
                        </select>       
                    </div>
                    <div class="form-group">
                        <label for="ciudad_nacimiento">Ciudad de nacimiento:</label>
                        <input type="text" class="form-control" name="ciudad_nacimiento" id="ciudad_nacimiento" value="{{ $policia->ciudad_nacimiento }}">
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular:</label>
                        <input type="text" class="form-control" name="celular" id="celular" value="{{ $policia->celular }}">
                    </div>
                    <div class="form-group">
                        <label for="rango">Rango:</label>
                        <select type="text" class="form-control" name="rango" id="rango">
                            <option value="{{ $policia->rango }}">{{ $policia->rango }}</option>
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
                    <br><br>
                    <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                    <a href="{{ url('Policias') }}">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection


