@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Dependencias</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearDependencia">Nuevo Subcircuito</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>                        
                            <th>ID</th> 
                            <th>Provincia</th>
                            <!--<th>Num.Parroquias</th>  -->
                            <th>Distrito</th> 
                            <th>Parroquias</th> 
                            
                            <th>Botones</th>  
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach ($provincias as $provincia)
                            @foreach ($provincia->parroquias as $parroquia)
                                <tr>
                                    <td>{{ $provincia->id }}</td>
                                    <td>{{ $provincia->nombre }}</td>
                                    <!--<td>{{ $provincia->num_parroquias }}</td>-->
                                    <td>{{ $parroquia->nombre }}</td>
                                    <td>
                                        <a href="">
                                            <button class="btn btn-success" nombre="{{ $provincia->nombre }}"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <button class="btn btn-danger EliminarDependencia" Did="{{ $provincia->id }}" nombre="{{ $provincia->nombre }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
