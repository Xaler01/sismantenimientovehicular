@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Subcircuitos</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearSubcircuito">Nuevo Subcircuito</button>
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
                            <th>Nombre Parroquia: </th> 
                            <th>Estado: </th> 
                            <th>Editar/Eliminar: </th>  
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($subcircuitos as $subcircuito)
                            <tr>
                                <td>{{ $subcircuito->id }}</td>
                                <td>{{ $subcircuito->nombre }}</td>
                                <td>{{ $subcircuito->codigo }}</td>
                                <td>{{ $subcircuito->Circuito->nombre }}</td>
                                <td>{{ $subcircuito->Circuito->Distritos->nombre }}</td>
                                <td>{{ $subcircuito->Parroquia->nombre }}</td> 
                                <td>{{ $subcircuito->estado }}</td> 
                                <td>
                                    <a href="Editar-Subcircuitos/{{ $subcircuito->id}}">
                                        <button class="btn btn-success" nombre="{{ $subcircuito->nombre }}"><i class="fa fa-pencil"></i></button>
                                    </a>
                                    <button class="btn btn-danger EliminarSubcircuito" Subid="{{ $subcircuito->id }}" nombre="{{ $subcircuito->nombre }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div id="CrearSubcircuito" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{ url('Subcircuitos') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">
                                    <!--<div class="form-group">
                                        <label for="provincia">Provincia:</label>
                                        <select class="form-control" name="provincia" id="provincia" required>
                                            <option value="">Seleccionar...</option>
                                            @foreach($provincias as $provincia)
                                                <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                                            @endforeach
                                        </select>  
                                    </div>-->
                                    
                                    <div class="form-group">
                                        <label for="parroquia">Nombre Parroquia:</label>
                                        <select class="form-control" name="parroquia" id="parroquia" required>
                                            <option value="">Seleccionar...</option>
                                            @foreach($parroquias as $parroquia)
                                                <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                            @endforeach
                                        </select>  
                                    </div>

                                    <div class="form-group">
                                        <label for="circuito">Nombre Cicuito:</label>
                                        <select class="form-control" name="circuito" id="circuito" required>
                                            <option value="">Seleccionar...</option>
                                            @foreach($circuitos as $circuito)
                                                <option value="{{ $circuito->id }}">{{ $circuito->codigo .' - '. $circuito->nombre}}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                    <div class="form-group">
                                        <label for="codigo_subcircuito">Codigo Subcircuito:</label>
                                        <input type="text" class="form-control" name="codigo_subcircuito" id="codigo_subcircuito" value="{{(old ('codigo_subcircuito'))}}" required oninput="this.value = this.value.toUpperCase()">
                                        @error('codigo_subcircuito')
                                            <div class="alert alert-danger">El codigo ya existe.</div>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label for="subcircuito">Nombre Subcircuito:</label>
                                        <input type="text" class="form-control" name="subcircuito"  value="{{(old ('subcircuito'))}}" required oninput="this.value = this.value.toUpperCase()">
                                        @error('subcircuito')
                                            <div class="alert alert-danger">El nombre del subcirctuito ya existe.</div>
                                        @enderror
                                    </div>
                                    
                                </div>
                            </div>                    
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Crear</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>            
            </div>
        </div>
    </section>
</div>

@endsection
