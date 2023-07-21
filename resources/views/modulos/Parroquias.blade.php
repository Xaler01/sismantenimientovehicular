@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Parroquias</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearParroquia">Nueva Parroquia</button>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>                        
                            <th>ID</th> 
                            <th>Provincia</th>
                            <!--<th>No. Parroquias</th>  -->
                            <th>Parroquia</th>  
                            <th>Estado</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($parroquias as $parroquia)
                        <tr>
                            <td>{{ $parroquia->id }}</td>
                            <td>{{ $parroquia->provincias->nombre }}</td>
                           <!-- <td>{{ $parroquia->provincias->numparroquias }}</td>-->
                            <td>{{ $parroquia->nombre }}</td>
                            <td>{{ $parroquia->estado }}</td>

                            

                            <td>
                                

                                <a href="Editar-Parroquias/{{ $parroquia->id}}">
                                    <button class="btn btn-success" nombre="{{ $parroquia->nombre }}"><i class="fa fa-pencil"></i></button>
                                </a>
                                <button class="btn btn-danger EliminarParroquia" Prrid="{{ $parroquia->id}}" nombre="{{ $parroquia->nombre}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach


                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>



<div id="CrearParroquia" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ url('Parroquias') }}">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group">
                                <label for="provincia">Provincia:</label>
                                <select class="form-control" name="provincia" id="provincia" required>
                                    <option value="">Seleccionar...</option>
                                    @foreach($provincias as $provincia)
                                        <option value="{{ $provincia->id }}">{{ $provincia->nombre }}</option>
                                    @endforeach
                                </select>  
                            </div>
                            
                            <div class="form-group">
                                <label for="parroquia">Nombre Parroquia:</label>
                                <input type="text" class="form-control" name="parroquia" required oninput="this.value = this.value.toUpperCase()">
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

@endsection
