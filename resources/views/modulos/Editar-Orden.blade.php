@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Orden - {{ $orden->id }}</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                

                <div class="col-md-4">
                    <div class="form-group">
                        <p><b>{{ $rango->nombre}}, </b> {{ $usuario->name}}</p>
                        <p><b>CI: </b>{{ $usuario->cedula}}</p>
                        <p><b>Email: </b>{{ $usuario->email}}</p>
                        <p><b>Celular: </b>{{ $usuario->celular}}</p>
                        <p><b>Subcicuito: </b>{{ $subcircuito->nombre ?? 'No asignado'}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <p><b>Tipo: </b>{{ $tipodevehiculo->nombre}}</p>
                        <p><b>Placa: </b>{{ $vehiculo->placa }}</p>
                        <p><b>Marca: </b>{{ $marca->nombre }}</p>
                        <p><b>Modelo: </b>{{ $vehiculo->modelo }}</p>
                        <p><b>Kilometraje: </b>{{ $vehiculo->kilometraje }}</p>
                        <p><b>Cilindraje: </b>{{ $vehiculo->cilindraje }}</p>
                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class='form-group'>
                        <p><b>Motor: </b>{{ $vehiculo->motor }}</p>
                        <p><b>Tipo Mantenimiento: </b>{{ $mantenimiento->nombre  }}</p>
                        <p><b>Subcicuito: </b>{{ $subcircuito->nombre ?? 'No asignado'}}</p>
                        <p><b>Estado: </b>{{ $orden->estado_solicitud  }}</p>
                        <p><b>Fecha: </b>{{ $orden->fecha_solicitud }}</p>
                        <p><b>Hora: </b>{{ $orden->hora_solicitud }}</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <p><b>Observaciones: </b>{{ $orden->observaciones }}</p>
                
                <a href="{{ url('Ordenes') }}">
                    <button class="btn btn-primary ">Regresar</button>
                </a>
                </div>  
            </div>
            
            <div class="box-body">

            <!--
                <form method="post" action="{{ url('Actualizar-Orden/' . $orden->id) }}">
            -->
                <form method="post" action="{{ url('Actualizar-Orden/' . $orden->id) }}">
                

                    @csrf
                    @method('PUT')
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="observacionesTaller">Detalle del servicio y novedades:</label>
                            <textarea class="form-control" name="observacionesTaller" id="observacionesTaller" placeholder="El mantenimiento fue exitoso." required maxlength="600" rows="8"></textarea>
                        </div>
                    
                        <div class="form-group">
                            
                            <label for="estado">Estado de la orden:</label>
                            <select class="form-control" name="estado" required>
                                <option value="Atendida" {{ $orden->estado_solicitud === 'Atendida' ? 'selected' : '' }}>Atendida</option>
                                <option value="Rechazada" {{ $orden->estado_solicitud === 'Rechazada' ? 'selected' : '' }}>Rechazada</option>
                                <option value="Revisando" {{ $orden->estado_solicitud === 'Revisando' ? 'selected' : '' }}>En revisión</option>
                                <option value="Autorizada" {{ $orden->estado_solicitud === 'Autorizada' ? 'selected' : '' }}>Autorizada</option>
                            </select>
                        </div>
                    </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-success ">Actualizar</button>
                        <a class="btn btn-danger " onclick="window.history.back()">Cancelar</a>
                        <a href="{{ url('/generar-pdf/' . $orden->id) }}" class="btn btn-primary">Generar PDF</a>
                        <!--<button class="btn btn-danger btn-lg" onclick="window.history.back()">Cancelar</button>
                        
                        <a href="{{ url('Editar-Perfil') }}" class="btn btn-danger btn-lg">Cancelar</a>
                        -->
                    </div>
                </form>
            </div>

            
        </div>
    </section>
</div>
@endsection


