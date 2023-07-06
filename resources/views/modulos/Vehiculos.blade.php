@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Vehiculos</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
            @if(auth()->user()->rol != "Policia")
                <a href="Crear-Vehiculo">
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearVehiculo">Agregar Vehiculo</button>
                </a>
                @endif
                
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>                        
                            <th>Id</th> 
                            <th>Tipo Vehiculo</th>
                            <th>Placa</th> 
                            <th>Chasis</th>
                            <th>Marca</th>
                            <th>Modelo</th> 
                            <th>Motor</th>
                            <th>Kilometraje</th>
                            <th>Cilindraje</th>
                            <th>Capacidad de carga</th>
                            <th>Capacidad de pasajeros</th>
                            <th>Edital / Borrar</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($vehiculos as $vehiculo)
                        <tr>
                            <td>{{ $vehiculo->id }}</td>
                            <td>{{ $vehiculo->tipo_vehiculo }}</td>
                            <td>{{ $vehiculo->placa }}</td>
                            <td>{{ $vehiculo->chasis }}</td>
                            <td>{{ $vehiculo->marca }}</td>
                            <td>{{ $vehiculo->modelo }}</td>
                            <td>{{ $vehiculo->motor }}</td>
                            <td>{{ $vehiculo->kilometraje }}</td>
                            <td>{{ $vehiculo->cilindraje }}</td>
                            <td>{{ $vehiculo->capacidad_carga }}</td>
                            <td>{{ $vehiculo->capacidad_pasajeros }}</td>
                            <td>
                                <a href="Editar-Vehiculo/{{ $vehiculo->id}}">
                                    <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                </a>
                                @if(auth()->user()->rol != "Policia")
                                <button class="btn btn-danger EliminarVehiculo" Vid="{{ $vehiculo->id}}" Placa="{{ $vehiculo->placa}}"><i class="fa fa-trash"></i></button>
                                @endif
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </section>

</div>
@endsection