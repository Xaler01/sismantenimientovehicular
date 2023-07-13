@extends('plantilla')
@section('contenido')

<div class="content-wrapper">
<section class="content col-md-10 center">
    <div class="box">
        <div class="box-header">
            <a href="{{ url('/') }}">
                    <button class="btn btn-primary btn-lg">Regresar</button>
                </a>
            <div class="modal-header text-center">
                <h3 class="modal-title">Comentarios - Reclamos - Sugerencias y Preguntas</h3>
            </div>

            <form method="post" action="{{ url('Crear-Reclamo') }}">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="row">

                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcircuito">* Subcircuito:</label>
                                    <select class="form-control" name="subcircuito" id="subcircuito" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach($dependenciaReclamo as $sub)
                                            <option value="{{ $sub->id }}" data-circuito="{{ $sub->nombre_circuito }}">{{ $sub->nombre_subcircuito }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tiporeclamo">* Tipo de contacto:</label>
                                    <select class="form-control" name="tiporeclamo" id="tiporeclamo" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach($tiporeclamo as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                          
                                 
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombres">* Nombres:</label>
                                    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Ingrese sus nombres" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellidos">* Apellidos:</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos" required oninput="this.value = this.value.toUpperCase()">
                                </div>
                            </div>

                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contacto">Correo:</label>
                                    <input type="email" class="form-control" name="contacto" id="contacto" placeholder="micorreo@mantenimientovehicular.com">
                                    @error('email')
                                    <div class="alert alert-danger">El email ya existe.</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detalle">* Observaciones:</label>
                                    <textarea class="form-control" name="detalle" id="detalle" placeholder="Ingresa el detalle de tu sugerencia" required maxlength="600" rows="8"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <p class="text-left">* Datos obligatorios</p>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href="{{ url('/') }}">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button></a>
                </div>
            </form>

        </div>
    </div>
</section>
</div>

@endsection
