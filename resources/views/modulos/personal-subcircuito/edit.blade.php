@extends('layouts.app')

@section('content')
    <h1>Editar Personal Subcircuito</h1>

    <form method="POST" action="{{ route('personal-subcircuito.update', $policia->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $policia->nombre }}" readonly>
        </div>

        <div>
            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" value="{{ $policia->correo }}" readonly>
        </div>

        <div>
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" value="{{ $policia->cedula }}" readonly>
        </div>

        <div>
            <label for="rango">Rango:</label>
            <input type="text" id="rango" name="rango" value="{{ $policia->rango }}" readonly>
        </div>

        <div>
            <label for="dependencia_id">Dependencia:</label>
            <select name="dependencia_id" id="dependencia_id">
                <option value="">No asignado</option>
                @foreach ($dependencias as $dependencia)
                    <option value="{{ $dependencia->id }}" @if ($policia->dependencia_id == $dependencia->id) selected @endif>{{ $dependencia->nombre_subcircuito }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Guardar</button>
    </form>
@endsection
