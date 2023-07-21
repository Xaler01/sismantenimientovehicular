@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Dependencias</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>                        
                            <th>ID</th> 
                            <th>Provincia</th>
                            <th>No. Distritos</th>  
                            <th>Parroquia</th>  
                            <th>Cod. Distrito</th>

                            <th>Nomb Distrito</th>
                            <th>No. Circuitos</th>
                            <th>Cod. Circuito</th>
                            <th>Nombre Circuito</th> 
                            <th>No. Subcircuitos</th>
                            <th>Cod. Subcircuito</th>
                            <th>Nombre Subircuito</th> 
                            <!--<th>Editar/Eliminar</th>-->
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($dependencia as $dependencia)
                        <tr>
                            <td>{{$dependencia->subcircuito_id}}</td>
                            <td>{{$dependencia->provincia_nombre}}</td>
                            <!--<td>{{$dependencia->num_distritos}}</td>-->
                            <td>22</td>
                            <td>{{$dependencia->parroquia_nombre}}</td>
                            <td>{{$dependencia->distrito_codigo}}</td>

                            <td>{{$dependencia->distrito_nombre}}</td>
                            <td>{{$dependencia->circuito_id}}</td>
                            <td>{{$dependencia->circuito_codigo}}</td>
                            <td>{{$dependencia->circuito_nombre}}</td>
                            <td>{{$dependencia->subcircuito_id}}</td>
                            

                            <td>{{$dependencia->subcircuito_codigo}}</td>
                            <td>{{$dependencia->subcircuito_nombre}}</td>        
                           <!-- <td>
                                <a href="Editar-Dependencia/{{ $dependencia->id}}">
                                    <button class="btn btn-success" nombre = "{{ $dependencia -> nombre_subcircuito }}"><i class="fa fa-pencil"></i></button>
                                </a>
                                <button class="btn btn-danger EliminarDependencia" Did="{{ $dependencia->id}}" nombre="{{ $dependencia->nombre_subcircuito}}"><i class="fa fa-trash"></i></button>
                            </td>-->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
