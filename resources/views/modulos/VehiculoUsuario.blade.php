@extends('plantilla')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Asignar Vehículo</h1>
        </section>

        <section class="content">   
        <div class="box">
            <section class="content">
                <form method="POST" action="{{ route('asignarvehiculo.store') }}">
                    @csrf
                        
                    <div class="form-group">
                        <label for="vehiculo">Vehículo:</label>
                        <select class="form-control" name="vehiculo_id" id="vehiculo_id">
                            <option value="">Seleccionar Vehiculo</option>
                            @foreach($vehiculos as $vehiculo)
                                <option value="{{ $vehiculo->id }}">{{ $vehiculo->placa }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="usuarios">Usuarios:</label>
                        @foreach($policia as $key => $usuario)
                            <div class="form-group">
                                <input type="text" class="form-control" name="usuarios[]" placeholder="Usuario {{ $key + 1 }}" value="{{ $usuario->name }}">
                            </div>
                        @endforeach
                    </div>


                    <div class="form-group">
                        <label for="usuarios">Usuarios:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="usuarios[]" placeholder="Usuario 1">
                        </div>
                        @if(isset($usuarios[0])) <!-- Verificar si el usuario 1 ya ha sido seleccionado -->
                            <div class="form-group">
                                <input type="text" class="form-control" name="usuarios[]" placeholder="Usuario 2">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="usuarios[]" placeholder="Usuario 3">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="usuarios[]" placeholder="Usuario 4">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="usuarios">Usuarios:</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="usuarios[]" placeholder="Usuario 1">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="usuarios[]" placeholder="Usuario 2">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="usuarios[]" placeholder="Usuario 3">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="usuarios[]" placeholder="Usuario 4">
                        </div>
                    </div>
                        
                    <button type="submit" class="btn btn-primary">Asignar</button>
                </form>
            </section>
        </div>
    </section>


        



    
    </div>

@endsection
