@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Editar el vehiculo de placa {{$vehiculo-> placa}}</h3>
    </section>  
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="{{ url('Vehiculos') }}">
                    <button class="btn btn-primary btn-lg">Volver a vehiculos</button>
                </a>
            </div>
            <div class="box-body">
                <form method="post" action="{{ url('Actualizar-Vehiculo/'.$vehiculo->id) }}">
                    @csrf
                    @method('put')
                    @if(auth()->user()->rol == "Encargado")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo_vehiculo">Tipo Vehiculo: </label>
                                <select type="text" class="form-control" name="tipo_vehiculo" id="tipo_vehiculo" >
                                    <option value="{{ $vehiculo->tipo_vehiculo }}">{{ $vehiculo->tipo_vehiculo }}</option>
                                    <option value="Automovil">Automovil</option>
                                    <option value="Moto">Moto</option>
                                    <option value="Camioneta">Camioneta</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="placa">Placa:</label>
                                <input type="text" class="form-control" name="placa" id="placa" value="{{$vehiculo->placa}}" oninput="this.value = this.value.toUpperCase()">
                                @error('placa')
                                    <div class="alert alert-danger">La placa ya existe.</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="chasis">Chasis:</label>
                                <input type="text" class="form-control" name="chasis" id="chasis" value="{{$vehiculo->chasis}}" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <input type="text" class="form-control" name="marca" id="marca" value="{{$vehiculo->marca}}" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo:</label>
                                <select class="form-control" name="modelo" id="modelo">
                                    <?php
                                        $modeloActual = date('Y');
                                        for ($modelo = 2010; $modelo <= $modeloActual; $modelo++) {
                                            echo '<option value="' . $modelo . '"';
                                            if ($modelo == $vehiculo->modelo) {
                                                echo ' selected';
                                            }
                                            echo '>' . $modelo . '</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="motor">Motor:</label>
                                <input type="text" class="form-control" name="motor" id="motor" value="{{$vehiculo->motor}}" oninput="this.value = this.value.toUpperCase()">
                            </div>
                            
                            <div class="form-group">
                                <label for="kilometraje">Kilometraje:</label>
                                <input type="number" class="form-control" name="kilometraje" id="kilometraje" value="{{$vehiculo->kilometraje}}" min="{{ $vehiculo->kilometraje }}">
                            </div>
                            <div class="form-group">
                                <label for="cilindraje">Cilindraje:</label>
                                <input type="number" class="form-control" name="cilindraje" id="cilindraje" value="{{$vehiculo->cilindraje}}">
                            </div>
                            <div class="form-group">
                                <label for="capacidad_carga">Capacidad de carga:</label>
                                <input type="number" class="form-control" name="capacidad_carga" id="capacidad_carga" value="{{$vehiculo->capacidad_carga}}">
                            </div>
                            <div class="form-group">
                                <label for="capacidad_pasajeros">Capacidad de pasajeros:</label>
                                <select type="number" class="form-control" name="capacidad_pasajeros" id="capacidad_pasajeros">
                                    <option value="{{$vehiculo->capacidad_pasajeros}}">{{$vehiculo->capacidad_pasajeros}}</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @elseif(auth()->user()->rol == "Policia")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo_vehiculo">Tipo Vehiculo: </label>
                                <input type="text" class="form-control" name="tipo_vehiculo" id="tipo_vehiculo" value="{{ $vehiculo->tipo_vehiculo }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="placa">Placa:</label>
                                <input type="text" class="form-control" name="placa" id="placa" value="{{$vehiculo->placa}}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="chasis">Chasis:</label>
                                <input type="text" class="form-control" name="chasis" id="chasis" value="{{$vehiculo->chasis}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <input type="text" class="form-control" name="marca" id="marca" value="{{$vehiculo->marca}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo:</label>
                                <input class="form-control" name="modelo" id="modelo" value="{{$vehiculo->modelo}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label for="motor">Motor:</label>
                                <input type="text" class="form-control" name="motor" id="motor" value="{{$vehiculo->motor}}" readonly>
                            </div>
                            
                            <div class="form-group">
                                <label for="kilometraje">Kilometraje:</label>
                                <input type="number" class="form-control" name="kilometraje" id="kilometraje" value="{{$vehiculo->kilometraje}}" min="{{ $vehiculo->kilometraje }}">
                            </div>
                            <div class="form-group">
                                <label for="cilindraje">Cilindraje:</label>
                                <input type="number" class="form-control" name="cilindraje" id="cilindraje" value="{{$vehiculo->cilindraje}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="capacidad_carga">Capacidad de carga:</label>
                                <input type="number" class="form-control" name="capacidad_carga" id="capacidad_carga" value="{{$vehiculo->capacidad_carga}}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="capacidad_pasajeros">Capacidad de pasajeros:</label>
                                <input type="number" class="form-control" name="capacidad_pasajeros" id="capacidad_pasajeros"value="{{$vehiculo->capacidad_pasajeros}}"readonly>
                            </div>
                        </div>
                    </div>
                    @endif
                    <br><br>
                    <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                    <a href="{{ url('Vehiculos') }}">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                    </a>
                </form>
            </div>
        </div>
    </section>
</div>
<script>
    // Escuchar los cambios en el campo de selección de tipo de vehículo
    document.getElementById('tipo_vehiculo').addEventListener('change', function() {
        // Obtener el valor seleccionado
        var tipoVehiculo = this.value;
        // Obtener el campo de capacidad de pasajeros
        var capacidadPasajeros = document.getElementById('capacidad_pasajeros');

        // Si el tipo de vehículo es "Moto", establecer la capacidad de pasajeros en 2
        if (tipoVehiculo === "Moto") {
            capacidadPasajeros.value = "2";
        }
        // Si el tipo de vehículo es "Automovil", establecer la capacidad de pasajeros en 4
        if (tipoVehiculo === "Automovil") {
            capacidadPasajeros.value = "4";
        } //else {
            //capacidadPasajeros.value = ""; // Limpiar el campo si no se cumple ninguna condición
        //}
    });
</script>
@endsection