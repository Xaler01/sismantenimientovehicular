@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Historial de Mantenimientos</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
            <table class="table table-bordered table-hover table-striped dt-responsive">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Vehículo</th>
                        <th>Estado</th>
                        <th>Fecha Solicitud</th>
                        <th>Hora Solicitud</th>
                        <th>Kilometraje Actual</th>
                        <th>Tipo Vehiculo</th>
                        <th>Informe</th>
                        
                        
                    </tr>
                </thead>

                <tbody>
                    @foreach ($solicitud as $solicitudItem)
                    <tr>
                        <td>{{ $solicitudItem->id }}</td>
                        <td>{{ $solicitudItem->usuarios->name }}</td>
                        <td>{{ $solicitudItem->vehiculo->placa }}</td>
                        <td>{{ $solicitudItem->estado_solicitud }}</td>
                        <td>{{ $solicitudItem->fecha_solicitud }}</td>
                        <td>{{ $solicitudItem->hora_solicitud }}</td>
                        <td>{{ $solicitudItem->kilometraje_actual }}</td>
                        <!--<td>{{ $solicitudItem->observaciones }}</td>-->
                        <td>{{ $solicitudItem->vehiculo->tipoVehiculo->nombre }}</td>
                        <td>
                                <a href="{{ url('/generar-pdf/' . $solicitudItem->id) }}">
                                    <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                                </a>
                                
                            </td>
                       
                    </tr>
                    <!-- Modal Gestionar Solicitud -->
                    <div id="GestionarSolicitud{{ $solicitudItem->id }}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="post" action="{{ route('actualizar-solicitud') }}">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="solicitud_id">Solicitud ID:</label>
                                            <input class="form-control" name="solicitud_id" value="{{ $solicitudItem->id }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="estado">Estado:</label>+
                                            <input class="form-control" name="estado" value="{{ $solicitudItem->estado }}" readonly> 
                                            <select class="form-control" name="estado" required>
                                                <option value="Activo">Activa</option>
                                                <option value="Aprobada">Aprobada</option>
                                                <option value="Rechazada">Rechazada</option>
                                                <option value="Recalendarizar">Recalendarizar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Modal Gestionar Solicitud -->
                    @endforeach
                </tbody>
            </table>
            </div>

        </div>
    </section>

</div>
@endsection