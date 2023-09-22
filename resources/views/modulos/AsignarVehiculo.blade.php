@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Asignar Vehículo</h3>
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
                            <tr>
                                <td>{{ $vehiculo->id }}</td>    
                                <td>{{ $vehiculo->tipoVehiculo->nombre }}</td>
                                <td>{{ $vehiculo->placa }}</td>
                                <td>{{ $vehiculo->marcas->nombre }}</td>
                                <td>{{ $vehiculo->modelo }}</td>
                                <td>{{ $vehiculo->kilometraje }}</td>
                                <td>
                                    @if ($vehiculo->dependencia_id)
                                        @if ($vehiculo->dependencia->estado === 'Activo')
                                            {{ $vehiculo->dependencia->nombre }}
                                        @else
                                            Eliminado
                                        @endif
                                    @else
                                        No asignado
                                    @endif
                                </td>
                                <td>
                                @if ($vehiculo_usuario->isNotEmpty())

                                    @foreach ($vehiculo_usuario as $asignacion)
                                        @if ($asignacion->vehiculo_id == $vehiculo->id)
                                            {{ $asignacion->policia1 ? $asignacion->policia1->name : '**' }}
                                        @endif
                                    @endforeach
                                    @else
                                    **
                                    @endif
                                    
                                </td>
                        
                                <td>
                                    @if ($vehiculo_usuario->isNotEmpty())

                                        @foreach ($vehiculo_usuario as $asignacion)
                                            @if ($asignacion->vehiculo_id == $vehiculo->id)
                                                {{ $asignacion->policia2 ? $asignacion->policia2->name : '**' }}
                                            @endif
                                        @endforeach
                                    @else
                                        **
                                    @endif
                                </td>
                                <td>
                                    @if ($vehiculo_usuario->isNotEmpty())

                                        @foreach ($vehiculo_usuario as $asignacion)
                                            @if ($asignacion->vehiculo_id == $vehiculo->id)
                                                {{ $asignacion->policia3 ? $asignacion->policia3->name : '**' }}
                                            @endif
                                        @endforeach
                                    @else
                                        **
                                    @endif
                                </td>
                                <td>
                                    @if ($vehiculo_usuario->isNotEmpty())

                                        @foreach ($vehiculo_usuario as $asignacion)
                                            @if ($asignacion->vehiculo_id == $vehiculo->id)
                                                {{ $asignacion->policia4 ? $asignacion->policia4->name : '**' }}
                                            @endif
                                        @endforeach
                                    @else
                                        **
                                    @endif
                                </td>
                            
                                        
                                
                                <td>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#AsignarVehiculoPersonal{{ $vehiculo->id }}"><i class="fa fa-pencil"></i></button>
                                </td>
                            </tr>
                        
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
                    <form class="row" action="{{ url('PersonalVehiculo/' . $vehiculo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="vehiculo_id" value="{{ $vehiculo->id }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tipo_vehiculo">Tipo de Vehículo:</label>
                                <input type="text" class="form-control" id="tipo_vehiculo" name="tipo_vehiculo" value="{{ $vehiculo->tipoVehiculo->nombre }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="placa">Placa:</label>
                                <input type="text" class="form-control" id="placa" name="placa" value="{{ $vehiculo->placa }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <input type="text" class="form-control" id="marca" name="marca" value="{{ $vehiculo->marcas->nombre }}" disabled>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="subcircuito">Subcircuito:</label>
                                <input type="text" class="form-control" id="subcircuito" name="subcircuito" value="{{ $vehiculo->dependencia_id ? $vehiculo->dependencia->nombre : '' }}" disabled>
                                <input type="hidden" class="form-control" id="dependenciaId" name="dependenciaId" value="{{ $vehiculo->dependencia_id }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="usuario1">Policía 1:</label>
                                <select class="form-control" id="usuario1" name="usuario1">
                                    <option value=" ">Seleccionar policía</option>
                                        @foreach($datospolicia as $usuario1)
                                            @if ($usuario1->dependencia_id != NULL && $usuario1->dependencia_id == $vehiculo->dependencia_id)
                                                <option value="{{ $usuario1->id }}" {{ $usuario1-> name }}>{{ $usuario1-> name }}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="usuario2">Policía 2:</label>
                                <select class="form-control" id="usuario2" name="usuario2">
                                    <option value=" ">Seleccionar policía</option>
                                        @foreach($datospolicia as $usuario2)
                                            @if ($usuario2->dependencia_id != NULL && $usuario2->dependencia_id == $vehiculo->dependencia_id )
                                                <option value="{{ $usuario2->id }}" {{ $usuario2-> name }}>{{ $usuario2-> name }}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="usuario3">Policía 2:</label>
                                <select class="form-control" id="usuario3" name="usuario3">
                                    <option value=" ">Seleccionar policía</option>
                                        @foreach($datospolicia as $usuario3)
                                            @if ($usuario3->dependencia_id != NULL && $usuario3->dependencia_id == $vehiculo->dependencia_id) 
                                                <option value="{{ $usuario3->id }}" {{ $usuario3-> name }}>{{ $usuario3-> name }}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="usuario4">Policía 2:</label>
                                <select class="form-control" id="usuario4" name="usuario4">
                                    <option value=" ">Seleccionar policía</option>
                                        @foreach($datospolicia as $usuario4)
                                            @if ($usuario4->dependencia_id != NULL && $usuario4->dependencia_id == $vehiculo->dependencia_id)
                                                <option value="{{ $usuario4->id }}" {{ $usuario4-> name }}>{{ $usuario4-> name }}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                            <!--
                            <div class="form-group">
                                <label for="usuario1">Policía 2:</label>
                                <select class="form-control" id="usuario2" name="usuario2">
                                    <option value="">Seleccionar policía</option>
                                        @foreach($datospolicia as $usuario2)
                                            @if ($usuario2->dependencia_id != NULL && $usuario2->dependencia_id == $vehiculo->dependencia_id)
                                                <option value="{{ $usuario2->id }}" {{ $usuario2-> name }}>{{ $usuario2-> name }}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
-->
                            
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

