@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Informe "Atenciones por mes por tipo de mantenimiento"</h3>
    </section>
    <section class="content">
    <div class="box">
        
        <div class="box-body">
            <table class="table table-bordered table-hover table-striped dt-responsive">
                <thead>
                    <tr>
                        
                        <th>Mes</th>
                        <th>Atenciones</th>
                        <th>Mantenimientos 1</th>
                        <th>Mantenimientos 2</th>
                        <th>Mantenimientos 3</th>
                        <th>Mantenimientos 4</th>`
                        
                        
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach ($informeMAM as $informe)
                    <tr>
                        <td>{{ $informe->Mes }}</td>
                        <td>{{ $informe->Atenciones }}</td>
                        <td>{{ $informe->Mant1 }}</td>
                        <td>{{ $informe->Mant2 }}</td>
                        <td>{{ $informe->Mant3 }}</td>
                        <td>{{ $informe->Mant4 }}</td>
                        
                        <!--<td>{{ $informe->observaciones }}</td>-->
                        
                    </tr>
                   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>


@endsection