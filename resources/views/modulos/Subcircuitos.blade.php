@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Subcircuitos</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearSubcircuito">Nuevo Subcircuito</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>                        
                            <th>ID</th> 
                            <th>Nombre Subcircuito: </th>
                            <th>Codigo Subcircuito: </th> 
                            <th>Nombre Circuito: </th> 
                            <th>Nombre Distrito: </th> 
                            <th>Nombre Parroquia: </th> 
                            <th>Estado: </th> 
                            <th>Editar/Eliminar: </th>  
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($subcircuitos as $subcircuito)
                            <tr>
                                <td>{{ $subcircuito->id }}</td>
                                <td>{{ $subcircuito->nombre }}</td>
                                <td>{{ $subcircuito->codigo }}</td>
                                <td>{{ $subcircuito->Circuito->nombre }}</td>
                                <td>{{ $subcircuito->Circuito->Distritos->nombre }}</td>
                                <td>{{ $subcircuito->Parroquia->nombre }}</td> 
                                <td>{{ $subcircuito->estado }}</td> 
                                <td>
                                    <a href="Editar-Subcircuitos/{{ $subcircuito->id}}">
                                        <button class="btn btn-success" nombre="{{ $subcircuito->nombre }}"><i class="fa fa-pencil"></i></button>
                                    </a>
                                    <button class="btn btn-danger EliminarSubcircuito" Subid="{{ $subcircuito->id }}" nombre="{{ $subcircuito->nombre }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="CrearSubcircuito" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ url('Subcircuitos') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <!--<div class="form-group">
                                        <label for="provincia">Provincia:</label>
                                        <select class="form-control" name="provincia" id="provincia" required>
                                            <option value="">Seleccionar...</option>
                                            @foreach($provincias as $provincia)
                                                <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                                            @endforeach
                                        </select>  
                                    </div>-->
                                    
                                    <div class="form-group">
                                        <label for="parroquia">Nombre Parroquia:</label>
                                        <select class="form-control" name="parroquia" id="parroquia" required>
                                            <option value="">Seleccionar...</option>
                                            @foreach($parroquias as $parroquia)
                                                <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                    <div class="form-group">
                                        <label for="distrito">Nombre Distrito:</label>
                                        <select class="form-control" name="distrito" id="distrito" required>
                                            <option value="">Seleccionar...</option>
                                            @foreach($distritos as $distrito)
                                                <option value="{{ $distrito->id }}">{{ $distrito->nombre }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                    <div class="form-group">
                                        <label for="circuito">Nombre Distrito:</label>
                                        <select class="form-control" name="circuito" id="circuito" required>
                                            <option value="">Seleccionar...</option>
                                            @foreach($circuitos as $circuito)
                                                <option value="{{ $circuito->id }}">{{ $circuito->nombre }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                    <div class="form-group">
                                        <label for="circuito">Codigo Subcircuito:</label>
                                        <input type="text" class="form-control" name="circuito"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="subcircuito">Nombre Subcircuito:</label>
                                        <input type="text" class="form-control" name="subcircuito"  required>
                                    </div>
                                    
                                </div>
                            </div>                    
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>            
            </div>
        </div>
    </section>
</div>



<!-- Agregar el siguiente script al final de la vista -->
@push('scripts')
    <script>
        $(document).ready(function () {
            // Cuando el valor del select de provincias cambie
            $('#provincia').on('change', function () {
                var provinciaId = $(this).val();

                // Realizar una petición AJAX para obtener las parroquias de la provincia seleccionada
                $.ajax({
                    
                    url: '/obtener-parroquias/' + provinciaId,
                    type: 'GET',
                    success: function (data) {
                        // Limpiar el select de parroquias y agregar las nuevas opciones
                        $('#parroquia').empty().append('<option value="">Seleccionar...</option>');
                        $.each(data, function (index, parroquia) {
                            $('#parroquia').append('<option value="' + parroquia.id + '">' + parroquia.nombre + '</option>');
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush

@endsection
