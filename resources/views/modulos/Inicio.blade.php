@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Inicio</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <div class="col-md-6 bg-primary">
                    <h1>Bienvenidos</h1>

                    <hr>
                    
                    <h2>Atención: </h2>
                    <h3>{{ $inicio->dias }}</h3>

                    <hr>

                    <h2>Horarios: </h2>
                    <h3>Desde las: {{ $inicio->horaInicio }} -
                        Hasta las: {{ $inicio->horaFin }}</h3>

                    <hr>
                    
                    <h2>Dirección: </h2>
                    <h3>{{ $inicio->direccion }}</h3>

                    <hr>
                    
                    <h2>Contactos: </h2>
                    <h3>Telefono: {{ $inicio->telefono }}   <br>
                        Correo: {{ $inicio->email }}</h3>
                </div>
                <div clas="col-md-7">

                    <img src="http://localhost/sismantenimientovehicular/public/storage/{{ $inicio->logo }}" class="img-responsive">      
                    
                </div>
            </div>
            @if(auth()->user()->rol == "Administrador")
                <div class="box-footer">
                    <a href="{{ url('Editar-Inicio') }}">
                        <button class="btn btn-success btn-lg">Editar</button>
                    </a>
                </div>
            @endif
                       
            

        </div>
    </section>

</div>
@endsection