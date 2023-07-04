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
                            <th>Cédula</th>
                            <th>Subcircuito</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>   
                        @foreach($asignapersonalsubcircuito as $asignacion)
                            @if ($asignacion->policia->rol == "Policia")
                            <tr>
                                <td>{{ $policia->name }}</td>
                                <td>{{ $asignacion->policia->email }}</td>
                                <td>{{ $asignacion->policia->cedula }}</td>
                                <td>
                                    <select class="form-control input-lg" name="subcircuito_id" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach($subcircuitos as $subcircuito)
                                            <option value="{{ $subcircuito->id }}">{{ $subcircuito->nombre_subcircuito }}</option>
                                        @endforeach
                                    </select>   
                                </td>  

                                <td>
                                    <a href="Editar-Policia/{{ $asignacion->policia->id }}">
                                        <button class="btn btn-success" nombre="{{ $asignacion->policia->name }}"><i class="fa fa-pencil"></i></button>
                                    </a>
                                    <button class="btn btn-danger EliminarPolicia" Pid="{{ $asignacion->policia->id }}" nombre="{{ $asignacion->policia->name }}"><i class="fa fa-trash"></i></button>
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
