@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Orden de Trabajo</h3>
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
                        <th>Tipo Vehiculo</th>
                        <th>Fecha Solicitud</th>
                        <th>Hora Solicitud</th>
                        <th>Kilometraje Actual</th>
                        
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($orden as $solicitudItem)
                    <tr>
                        <td>{{ $solicitudItem->id }}</td>
                        <td>{{ $solicitudItem->usuarios->name }}</td>
                        <td>{{ $solicitudItem->vehiculo->placa }}</td>
                        <td>{{ $solicitudItem->vehiculo->tipoVehiculo->nombre }}</td>
                        <td>{{ $solicitudItem->fecha_solicitud }}</td>
                        <td>{{ $solicitudItem->hora_solicitud }}</td>
                        <td>{{ $solicitudItem->kilometraje_actual }}</td>
                        <!--<td>{{ $solicitudItem->observaciones }}</td>-->
                        <td>{{ $solicitudItem->estado_solicitud }}</td>
                        <td>
                            <a href="Editar-Orden/{{ $solicitudItem->id}}">
                                <button class="btn btn-success" nombre = "{{ $solicitudItem->usuarios->name }}"><i class="fa fa-wrench"></i></button>
                            </a>
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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