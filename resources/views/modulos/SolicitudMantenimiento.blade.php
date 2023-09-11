@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Solicitud de mantenimiento vehicular</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <!--<div id="calendario"></div>-->
                <div id="calendario" data-events="{{ json_encode($solicitudmantenimiento) }}"></div>
           
            </div>  
        </div>
    </section>
</div>



<div class="modal fade" id="MantenimientoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route('guardar-solicitud') }}">
                @csrf
                @method('post')
                <div class="modal-body">
                    <div class="box-body">                        
                        <div class="form-group">
                            <label for="user_id">Usuario:</label>
                            <select class="form-control " name="user_id"  id="user_id" style="width:100%">
                                <option value="">Seleccionar policia</option>
                                
                                @foreach($policias as $usuario)
                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vehiculomantenimiento">Placa vehiculo:</label>
                            <input type="text" class="form-control" name="vehiculomantenimiento" id="vehiculomantenimiento" readonly>
                            <input type="hidden" class="form-control" name="vehiculo_id" id="vehiculo_id" >
                            <input type="hidden" class="form-control" name="tipoVehiculo" id="tipoVehiculo" readonly>
                        </div>

                        <div class="form-group">
                            <label for="kilometrajeactual">Kilometraje actual:</label>
                            <input type="number" class="form-control" name="kilometrajeactual" id="kilometrajeactual" min="kilometrajeactual" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="fechamantenimiento">Fecha mantenimiento:</label>
                            <input type="text" class="form-control" name="fechamantenimiento" id="fechamantenimiento" readonly>
                        </div>
                        <div class="form-group">
                            <label for="horamantenimiento">Hora solictud:</label>
                            <input type="time" class="form-control" name="horamantenimiento" id="horamantenimiento" readonly>
                        </div>                
                        <div class="form-group">
                            <label for="mantenimiento">Tipo de Mantenimiento:</label>
                            <select class="form-control" name="mantenimiento" id="mantenimiento">
                                <option value="">Seleccionar tipo de mantenimiento</option>
                                @foreach($tiposMantenimiento as $tipoMantenimiento)
                                    <option value="{{ $tipoMantenimiento->id }}">{{ $tipoMantenimiento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="observaciones">Observaciones:</label>
                            <textarea  class="form-control" name="observaciones" id="observaciones" rows="4" ></textarea>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Solicitar Mantenimiento</button>
                    <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="EventoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{ route('cancelar-solicitud') }}">
                @csrf
                @method('post')
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="usuario">Usuario:</label>
                            <input type="text" class="form-control" name="usuario" id="polinombre" readonly>                            
                        </div>
                        <div class="form-group">
                            <label for="vehiculo">Vehiculo:</label>
                            <input type="text" class="form-control" name="vehiculo" id="placa" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tipodeVehiculo">Tipo de Vehiculo:</label>
                            <input type="text" class="form-control" name="tipodeVehiculo" id="tipodeVehiculo" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tipomantenimiento">Tipo de mantenimiento:</label>
                            <input type="text" class="form-control" name="tipomantenimiento" id="tipomantenimiento" readonly>
                        </div>
                        <div class="form-group">
                            <label for="subcircuito">Subcircuito:</label>
                            <input type="text" class="form-control" name="subcircuito" id="subcircuito" readonly>
                        </div>
                        <div class="form-group">
                            <label for="turno">Turno Num:</label>
                            <input type="text" class="form-control" name="turno" id="turno" readonly>                       </div>
                        <div class="form-group">
                            <label for="estado">Estado de la solicitud:</label>
                            <input type="text" class="form-control" name="estado" id="estado" readonly>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type= "submit" class= "btn btn-warning">Cancelar Mantenimiento</button>
                    <button type= "button" data-dismiss="modal" class= "btn btn-danger">Cerrar</button>

                </div>
            </form>    
        </div>
    </div>
</div>


@endsection
