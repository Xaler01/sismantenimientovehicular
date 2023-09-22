@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Editar - Inicio</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="dias">Días: </label>
                                <input type="text" class="form-control" name="dias" value = "{{ $inicio->dias }}">
                            </div>

                            <div class="form-group">
                                <label for="horarios">Horarios: </label><br>
                                Desde: <input type="text" class="form-control" name="horaInicio" value = "{{ $inicio->horaInicio }}">
                                Hasta: <input type="text" class="form-control" name="horaFin" value = "{{ $inicio->horaFin }}">
                            </div>

                            <div class="form-group">
                                <label for="direccion">Dirección: </label>
                                <input type="text" class="form-control" name="direccion" value = "{{ $inicio->direccion }}">
                            </div>

                            <div class="form-group">
                                <label for="direccion">Teléfono: </label>
                                <input type="text" class="form-control" name="telefono" value = "{{ $inicio->telefono }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Correo: </label>
                                <input type="text" class="form-control" name="email" value = "{{ $inicio->email }}">
                            </div>

                        </div>
                        <div class="col-md-6 col-xs-12">
                            <br><br>
                            <label for="file" >Logo: </label>
                            <input type="file" name="logoN">
                            <br>
                            <img src="http://localhost/sismantenimientovehicular/public/storage/{{ $inicio->logo }}" width="200px">
                            
                            <br><br>
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>  
                        </div>
                    

                   
                </form>
            </div>
        </div>
    </section>

</div>
@endsection