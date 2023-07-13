@extends('plantilla')
@section('contenido')

<div id="content">
    <div class="modal-dialog">
        <div class="content">
            <div class="modal-header text-center">
                <h3 class="modal-title">Comentarios y sugerencias</h3>
            </div>

            <form method="post" action="{{ url('Crear-Reclamo') }}">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="circuito">* Circuito:</label>
                                    <select class="form-control" name="circuito_id" id="circuito" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach($circuito as $circ)
                                            <option value="{{ $circ->id }}">{{ $circ->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                            
                                <div class="form-group">
                                    <label for="subcircuito">* Subcircuito:</label>
                                    <select class="form-control" name="subcircuito" id="subcircuito" required>
                                        <option value="">Seleccionar...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombres">* Nombres:</label>
                                    <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Ingrese sus nombres" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellidos">* Apellidos:</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos" required>
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
                                    <label for="contacto">Contacto:</label>
                                    <input type="email" class="form-control" name="contacto" id="contacto" placeholder="micorreo@mantenimientovehicular.com">
                                    @error('email')
                                    <div class="alert alert-danger">El email ya existe.</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detalle">* Observaciones:</label>
                                    <textarea class="form-control" name="detalle" id="detalle" placeholder="Ingresa el detalle de tu sugerencia" maxlength="600" rows="8"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <p class="text-left">* Datos obligatorios</p>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <a href=inicio>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button></a>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
   document.addEventListener("DOMContentLoaded", function() {
    // Event listener para detectar cambios en el select de circuito
            document.getElementById('circuito').addEventListener('change', function() {
                const circuitoId = this.value;
                getSubcircuitos(circuitoId); // Llama a la función getSubcircuitos para obtener los subcircuitos
            });
        });

        function getSubcircuitos(circuitoId) {
            // Realiza una llamada AJAX para obtener los subcircuitos según el circuito seleccionado
            fetch(`/get-subcircuitos/${circuitoId}`)
                .then(response => response.json())
                .then(data => {
                    // Actualiza el select de subcircuitos con los valores recibidos
                    const subcircuitoSelect = document.getElementById('subcircuito');
                    subcircuitoSelect.innerHTML = '';
                    data.forEach(subcircuito => {
                        const option = document.createElement('option');
                        option.value = subcircuito.id;
                        option.textContent = subcircuito.nombre;
                        subcircuitoSelect.appendChild(option);
                    });
                })
            .catch(error => console.log(error));
        }

</script>

@endsection
