@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Subcircuito - Personal policial</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Cédula</th>
                            <th>Rango</th>
                            <th>Asignado a</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($policias as $policia)
                            @if ($policia->rol=="Policia" && $policia->estado=="Activo")
                                <tr>
                                    <td>{{ $policia->name }}</td>
                                    <td>{{ $policia->email }}</td>
                                    <td>{{ $policia->cedula }}</td>
                                    <td>{{ $policia->rango }}</td>
                                    <td>
                                        @if ($policia->dependencia_id)
                                            {{ $policia->dependencia->nombre_subcircuito }}
                                        @else
                                            No asignado
                                        @endif
                                    </td>
                                    
                                    
                                    <td>
                                        <button class="btn btn-success" data-toggle="modal" data-target="#EditarSubcircuito{{ $policia->id }}"><i class="fa fa-pencil"></i></button>
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
@foreach($policias as $policia)
    @if ($policia->rol=="Policia" && $policia->estado=="Activo")
    @php
        $dependenciaNombre = $policia->personalSubcircuito ? $policia->personalSubcircuito->dependencia->nombre_subcircuito : null;
    @endphp
    
    <div class="modal fade" id="EditarSubcircuito{{ $policia->id }}" tabindex="-1" role="dialog" aria-labelledby="EditarSubcircuito{{ $policia->id }}Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h3 class="modal-title" id="EditarSubcircuito{{ $policia->id }}Label">Asignar subcircuito</h3>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('PersonalSubcircuito.update', $policia->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Nombre y apellido:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $policia->name }}" disabled>
                                </div>                                
                                <div class="form-group">
                                    <label for="correo">Correo:</label>
                                    <input type="text" class="form-control" id="correo" name="correo" value="{{ $policia->email }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="cedula">Cédula:</label>
                                    <input type="text" class="form-control" id="cedula" name="cedula" value="{{ $policia->cedula }}" disabled>
                                </div>
                
                                <div class="form-group">
                                    <label for="rango">Rango:</label>
                                    <input type="text" class="form-control" id="rango" name="rango" value="{{ $policia->rango }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="dependencia">Dependencia:</label>
                                    <select class="form-control" id="dependencia" name="dependencia">
                                        <option value="">Seleccionar dependencia</option>
                                        @foreach($dependencias as $dependencia)
                                            <option value="{{ $dependencia->id }}" {{ $policia->personalSubcircuito && $policia->personalSubcircuito->dependencia_id == $dependencia->id ? 'selected' : '' }}>
                                                {{ $dependencia->nombre_subcircuito }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
@endforeach
@endsection
