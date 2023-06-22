@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de dependencias</h3>
    </section>
    <section class="content">
        <div class="box">
            <br>
            <form method="post">
                @csrf                
                <div class="col-md-6 col-xs-12">
                    <input type="text" class="form-control" name="dependencia" placeholder="Ingrese nueva dependencia" required=""></input>
                </div>
                <button class="btn btn-primary" type="submit">Agregar dependencia</button>
            </form>
            <br>  
            <div class="box-body">
                @foreach($dependencias as $dependencia)

                <div class="row">
                    <form method="post" action="{{ url('Dependencia/'.$dependencia->id) }}">
                        @csrf 
                        @method('put')
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="DependenciaE " value=" {{ $dependencia -> dependencia}} ">
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-success" type="submmit">Guardar</button>
                        </div>  
                    </form>
                
                    <div class="col-md-1">
                        <form method="post" action="{{ url('borrar-Dependencia/'.$dependencia->id) }}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit">Eliminar</button> 
                        </form>
                    </div>
                </div>
                <br>

                @endforeach
                
            </div>

        </div>
    </section>

</div>
@endsection