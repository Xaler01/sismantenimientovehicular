@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Asignar Vehículo</h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Tipo</th>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Kilometraje</th>
                        <th>Subcircuito</th>
                        <th>Asignado a (1)</th>
                        <th>Asignado a (2)</th>
                        <th>Asignado a (3)</th>
                        <th>Asignado a (4)</th> 
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($datosvehiculos as $vehiculo)
                            @if ($vehiculo->estado=="Activo")
                                <tr>
                                    <td>{{ $vehiculo->id }}</td>    
                                    <td>{{ $vehiculo->tipo_vehiculo }}</td>
                                    <td>{{ $vehiculo->placa }}</td>
                                    <td>{{ $vehiculo->marca }}</td>
                                    <td>{{ $vehiculo->modelo }}</td>
                                    <td>{{ $vehiculo->kilometraje }}</td>
                                    <td>
                                    @if ($vehiculo->dependencia_id)
                                            
                                                {{ $vehiculo->dependencia->nombre_subcircuito }}
                                            @else
                                                No asignado
                                        
                                        @endif
                                    </td>
                                    <td>
                                        @if ($vehiculo_usuario->isNotEmpty())

                                            @foreach ($vehiculo_usuario as $asignacion)
                                                @if ($asignacion->vehiculo_id == $vehiculo->id)
                                                    {{ $asignacion->user_id ? $asignacion->policia->name : '' }}
                                                @endif
                                            @endforeach
                                        @else
                                            No asignado
                                        @endif
                                    </td>
                                    <td>
                                        @if ($vehiculo_usuario->isNotEmpty())
                                            @foreach ($vehiculo_usuario as $asignacion2)
                                                @if ($asignacion2->vehiculo_id == $vehiculo->id)
                                                    {{ $asignacion2->user_id ? $asignacion2->policia->name : '' }}
                                                @endif
                                            @endforeach
                                        @else
                                            No asignado
                                        @endif
                                    </td>
                                    <td>
                                        @if ($vehiculo_usuario->isNotEmpty())
                                            @foreach ($vehiculo_usuario as $asignacion3)
                                                @if ($asignacion3->vehiculo_id == $vehiculo->id)
                                                    {{ $asignacion3->user_id ? $asignacion3->policia->name : '' }}
                                                @endif
                                            @endforeach
                                        @else
                                            No asignado
                                        @endif
                                    </td>
                                    <td>
                                        @if ($vehiculo_usuario->isNotEmpty())
                                            @foreach ($vehiculo_usuario as $asignacion4)
                                                @if ($asignacion4->vehiculo_id == $vehiculo->id)
                                                    {{ $asignacion4->user_id ? $asignacion4->policia->name : '' }}
                                                @endif
                                            @endforeach
                                        @else
                                            No asignado
                                        @endif
                                    </td>
                                            
                                    
                                    <td>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#AsignarVehiculoPersonal{{ $vehiculo->id }}"><i class="fa fa-pencil"></i></button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@foreach($datosvehiculos as $vehiculo)
    <div class="modal fade" id="AsignarVehiculoPersonal{{ $vehiculo->id }}" tabindex="-1" role="dialog" aria-labelledby="AsignarVehiculoPersonal{{ $vehiculo->id }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title" id="AsignarVehiculoPersonal{{ $vehiculo->id }}Label">Asignar Vehículo a Policia</h3>
                </div>
                <div class="modal-body">
                    <form class="row" method="POST" action="{{ route('PersonalVehiculo.update') }}">
                        @csrf
                        <input type="hidden" name="vehiculo_id" value="{{ $vehiculo->id }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo_vehiculo">Tipo de Vehículo:</label>
                                <input type="text" class="form-control" id="tipo_vehiculo" name="tipo_vehiculo" value="{{ $vehiculo->tipo_vehiculo }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="placa">Placa:</label>
                                <input type="text" class="form-control" id="placa" name="placa" value="{{ $vehiculo->placa }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <input type="text" class="form-control" id="marca" name="marca" value="{{ $vehiculo->marca }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Modelo:</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $vehiculo->modelo }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="kilometraje">Kilometraje:</label>
                                <input type="text" class="form-control" id="kilometraje" name="kilometraje" value="{{ $vehiculo->kilometraje }}" disabled>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection

