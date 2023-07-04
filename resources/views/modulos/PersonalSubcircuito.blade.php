@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Personal a Subcircuito</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>Nombre y Apellido</th>
                            <th>Email</th>
                            <th>Cedula</th>
                            <th>Subcircuito</th>
                            <th>Guardar</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($policias as $policia)
                            @if ($policia->rol == "Policia")
                                <tr>
                                    <td>{{ $policia->name }}</td>
                                    <td>{{ $policia->email }}</td>
                                    <td>{{ $policia->cedula }}</td>
                                    <td>
                                        <select class="form-control " name="subcircuito_id" required>
                                            <option value="">Seleccionar...</option>
                                            @foreach($dependencias as $subcircuito)
                                                <option value="{{ $subcircuito->id }}">{{ $subcircuito->nombre_subcircuito }}</option>
                                            @endforeach
                                        </select>   
                                    </td>                            
                                    <td>
                                        <a href="Editar-Policia/{{ $policia->id }}">
                                            <button class="btn btn-primary " nombre = "{{ $policia -> name }}">Guardar</button>
                                        </a>
                                        
                                    </td>
                                </tr>
                            @endif
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
