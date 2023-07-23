@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Solicitud de mantenimiento vehicular</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div id="calendario"></div>
            </div>  
        </div>
    </section>
</div>

<div class="modal fade" id="MantenimientoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="box-body">                        
                        <div class="form-group">
                            <label for="user">Usuario:</label>
                            <select class="form-control" name="user_id" id="user_id">
                                <option value="">Seleccionar policia</option>
                                @foreach($policia as $policiaE)
                                    <option value="{{ $policiaE->id }}">{{ $policiaE->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vehiculomantenimiento">Vehiculo:</label>
                            <input type="text" class="form-control" name="vehiculomantenimiento" id="vehiculomantenimiento" readonly>
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
@endsection
