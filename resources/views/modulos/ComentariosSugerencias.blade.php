@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Comentarios y sugerencias</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Num</th>
                            <th>Fecha</th>
                            <th>Cantidad</th>
                            <th>Tipo</th>
                            <th>Circuito</th>
                            <th>Subcircuito</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resumen as $reclamo)
                                <tr>
                                    <td>{{ $reclamo->id }}</td>
                                    <td>{{ $reclamo->fecha_hora }}</td>
                                    <td>{{ $cantidad }}</td>
                                    <td>{{ $reclamo->tipo_reclamo_id }}</td>
                                    <td>{{ $reclamo->dependencia->nombre_circuito }}</td>
                                    <td>{{ $reclamo->dependencia->nombre_subcircuito }}</td>
                                
                                        
                                </tr>
                           
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
