@extends('layouts.app')

@section('content')
    <h1>Personal Subcircuito</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Cédula</th>
                <th>Rango</th>
                <th>Dependencia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($policias as $policia)
                <tr>
                    <td>{{ $policia->name }}</td>
                    <td>{{ $policia->email }}</td>
                    <td>{{ $policia->cedula }}</td>
                    <td>{{ $policia->rango }}</td>
                    <td>
                        @if ($policia->dependencia)
                            {{ $policia->dependencia->nombre_subcircuito }}
                        @else
                            No asignado
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('personal-subcircuito.edit', $policia->id) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
