@extends('plantilla')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h4>Crear Vehiculo</h4> 
    </section>
    <section class="content">
        <div class="box">
            <div class="row">
                <div class="col-md-6">
                    <form method="post">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="tipo_vehiculo">Tipo de vehiculo:</label>
                                <select class="form-control" name="tipo_vehiculo" id="tipo_vehiculo" required>
                                    <option value="">Seleccionar...</option>
                                    @foreach($tipoVehiculo as $tipo_vehiculo)
                                        <option value="{{ $tipo_vehiculo->id }}">{{ $tipo_vehiculo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="placa">Placa:</label>
                                <input type="text" class="form-control" name="placa" value="{{ old('placa') }}" oninput="this.value = this.value.toUpperCase()">
                                @error('placa')
                                    <div class="alert alert-danger">La placa ya existe.</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="chasis">Chasis:</label>
                                <input type="text" class="form-control" name="chasis" value="{{ old('chasis') }}" oninput="this.value = this.value.toUpperCase()">
                                @error('chasis')
                                    <div class="alert alert-danger">El número de chasis ya existe.</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <select class="form-control" name="marca" id="marca" required>
                                    <option value="">Seleccionar...</option>
                                    @foreach($marca as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo:</label>
                                <select class="form-control" name="modelo">
                                    @php
                                        $modeloActual = date('Y');
                                        for ($modelo = 2010; $modelo <= $modeloActual + 1; $modelo++) {
                                            echo '<option value="' . $modelo . '">' . $modelo . '</option>';
                                        }
                                    @endphp
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="motor">Motor:</label>
                                <input type="text" class="form-control" name="motor" required oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group">
                                <label for="kilometraje">Kilometraje:</label>
                                <input type="number" class="form-control" name="kilometraje" required>
                            </div>
                            <div class="form-group">
                                <label for="cilindraje">Cilindraje:</label>
                                <input type="number" class="form-control" name="cilindraje" step="any" required>
                            </div>
                            <div class="form-group">
                                <label for="capacidad_carga">Capacidad de carga:</label>
                                <input type="number" class="form-control" name="capacidad_carga" step="any" required>
                            </div>
                            <div class="form-group">
                                <label for="capacidad_pasajeros">Capacidad de pasajeros:</label>
                                <select class="form-control " name="capacidad_pasajeros" required>
                                    <option value="">Seleccionar...</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                        <a href="{{ url('Vehiculos') }}" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
