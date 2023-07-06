@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Solicitud de mantenimiento vehicular </h3>
        
        @if($solicitud == null)
        <form method="post" action="">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user">Policia:</label>
                        <input type="text"  class="form-control hidden" name="user_id" id="user_id" value="{{$policia->id}}" oninput="this.value = this.value.toUpperCase()">
                        <span>{{$policia->name}}</span>
                        <span>{{$policia->id}}</span>
                    </div>
                    <div class="form-group">
                        <label for="user">Vehiculo:</label>
                        <input type="text"  class="form-control hidden" name="vehiculo_id" id="vehiculo_id" value="{{$vehiculo->id}}" oninput="this.value = this.value.toUpperCase()">
                        <span>{{$vehiculo->placa}}</span>
                        <span>{{$vehiculo->id}}</span>
                    </div>
                </div>
            </div>

                        
         
        @endif

    </section>
    <section class="content">
        <div class="box">
        @if($solicitud == null)
        <form method="post" action="">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user">Policia:</label>
                        <input type="text"  class="form-control hidden" name="user_id" id="user_id" value="{{$policia->id}}" oninput="this.value = this.value.toUpperCase()">
                        <span>{{$policia->name}}</span>
                        <span>{{$policia->id}}</span>
                    </div>
                    <div class="form-group">
                        <label for="user">Vehiculo:</label>
                        <input type="text"  class="form-control hidden" name="vehiculo_id" id="vehiculo_id" value="{{$vehiculo->id}}" oninput="this.value = this.value.toUpperCase()">
                        <span>{{$vehiculo->placa}}</span>
                        <span>{{$vehiculo->id}}</span>
                    </div>
                </div>
            </div>

                        
         
        @endif

        </div>
    </section>

</div>
@endsection