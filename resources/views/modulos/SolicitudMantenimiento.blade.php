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
                        <div class="form-group"><span>A</span>
                            <label for="vehiculomantenimiento">Vehiculo:</label>
                            <input type="text" class="form-control" name="vehiculomantenimiento" id="vehiculomantenimiento" readonly>
                            <input type="hidden" class="form-control" name="vehiculo_id" id="vehiculo_id" >
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

<div class='modal fade' id='EventoModal'>
    <div clas= "modal-dialog">
        <div class="modal-content">
            <form method="Post" action="{{ url('borrar-solicitud') }}">
                @csrf
                @method('post')
                <div class= "modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="usuario">Usuario:</label>
                            <input type="text" class="form-control" name="usuario" id="usuario" readonly>
                        </div>
                        <div class="form-group">
                            <label for="usuario">Vehiculo:</label>
                            <input type="text" class="form-control" name="vehiculo" id="vehiculo" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tipoVehiculo">Tipo de Vehiculo:</label>
                            <input type="text" class="form-control" name="tipoVehiculo" id="tipoVehiculo" readonly>
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
