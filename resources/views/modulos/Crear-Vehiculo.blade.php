@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h4>Crear Vehiculo</h4> 
    </section>
    <section class="content">
        <div class="box">
            <form method="post">
                @csrf               
                <div class="box-body">
                    <div class="form-group">
                        
                        <h4>Tipo Vehiculo: </h4>
                        <select class="form-control " name="tipo_vehiculo" required>
                            <option value="">Seleccionar...</option>
                            <option value="Automovil">Automovil</option>
                            <option value="Moto">Moto</option>
                            <option value="Camioneta">Camioneta</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <h4>Placa: </h4>
                        <input type="text" class="form-control" name="placa" value="{{(old ('placa'))}}" oninput="this.value = this.value.toUpperCase()">
                        @error('placa')
                            <div class="alert alert-danger">La placa ya existe.</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <h4>Chasis: </h4>
                        <input type="text" class="form-control" name="chasis" value="{{(old ('chasis'))}}"oninput="this.value = this.value.toUpperCase()">
                        @error('chasis')
                            <div class="alert alert-danger">El número de chasis ya existe.</div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <h4>Marca: </h4>
                        <input type= "text" class="form-control" name="marca" required>
                    </div> 
                    <div class="form-group">
                        <h4>Modelo: </h4>
                        <select class="form-control" name="modelo">
                            <?php
                                $modeloActual = date('Y');
                                for ($modelo = 2010; $modelo <= $modeloActual+1; $modelo++) 
                                {
                                    echo '<option value="' . $modelo . '">' . $modelo . '</option>';
                                }
                            ?>
                        </select>      
                    </div> 
                    <div class="form-group">
                        <h4>Motor: </h4>
                        <input type= "text" class="form-control" name="motor" required oninput="this.value = this.value.toUpperCase()">
                    </div> 
                    <div class="form-group">
                        <h4>Kilometraje: </h4>
                        <input type= "number" class="form-control" name="kilometraje" required>
                    </div> 
                    <div class="form-group">
                        <h4>Cilindraje: </h4>
                        <input type= "number" class="form-control" name="cilindraje" step="any" required>
                    </div>
                    <div class="form-group">
                        <h4>Capacidad de carga: </h4>
                        <input type= "number" class="form-control" name="capacidad_carga" step="any" required>
                    </div>
                    <div class="form-group">
                        <h4>Capacidad de pasajeros: </h4>
                        <select class="form-control input-lg" name="capacidad_pasajeros" required>
                            <option value="">Seleccionar...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>      
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg">Crear</button>
                    <a href="Vehiculos">
                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancelar</button>
                    </a>
                </div>
            </form>
        </div>
    </section>

</div>
@endsection