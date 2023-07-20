@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Subcircuitos</h3>
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
                            <th>Nombre Subcircuito: </th>
                            <th>Codigo Subcircuito: </th> 
                            <th>Nombre Circuito: </th> 
                            <th>Nombre Distrito: </th> 
                            
                            <th>Botones</th>  
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach ($subcircuitos as $subcircuito)
                            
                                <tr>
                                    <td>{{ $subcircuito->id }}</td>
                                    <td>{{ $subcircuito->nombre }}</td>
                                    <td>{{ $subcircuito->codigo }}</td>
                                    <td>{{ $subcircuito->circuitos->nombre }}</td>
                                    <td>{{ $subcircuito->distritos->nombre }}</td>
                                    
                                    <td>
                                        <a href="">
                                            <button class="btn btn-success" nombre="{{ $provincia->nombre }}"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <button class="btn btn-danger EliminarDependencia" Did="{{ $provincia->id }}" nombre="{{ $provincia->nombre }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                           
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
