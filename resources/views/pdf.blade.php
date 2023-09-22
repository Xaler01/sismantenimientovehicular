<html>
<head>
    <title>Orden de trabajo: {{ $orden->id }}</title>
</head>
<body>
    <h1>Detalle de orden {{ $orden->id }}</h1>
    <div class="box-header">
                

                <div class="col-md-4">
                    <div class="form-group">
                        <p><b>{{ $rango->nombre}}, </b> {{ $usuario->name}}</p>
                        <a><b>CI: </b>{{ $usuario->cedula}}</a>
                        <p><b>Email: </b>{{ $usuario->email}}</p>
                        <p><b>Celular: </b>{{ $usuario->celular}}</p>
                        <p><b>Subcicuito: </b>{{ $subcircuito->nombre ?? 'No asignado'}}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <p><b>Tipo: </b>{{ $tipodevehiculo->nombre}}</p>
                        <p><b>Placa: </b>{{ $vehiculo->placa }}</p>
                        <p><b>Marca: </b>{{ $marca->nombre }}</p>
                        <p><b>Modelo: </b>{{ $vehiculo->modelo }}</p>
                        <p><b>Kilometraje: </b>{{ $vehiculo->kilometraje }}</p>
                        <p><b>Cilindraje: </b>{{ $vehiculo->cilindraje }}</p>
                       
                    </div>
                </div>
                <div class="col-md-4">
                    <div class='form-group'>
                        <p><b>Motor: </b>{{ $vehiculo->motor }}</p>
                        <p><b>Subcicuito: </b>{{ $subcircuito->nombre ?? 'No asignado'}}</p>
                        <p><b>Estado: </b>{{ $orden->estado_solicitud  }}</p>
                        <p><b>Fecha: </b>{{ $orden->fecha_solicitud }}</p>
                        <p><b>Hora: </b>{{ $orden->hora_solicitud }}</p>
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <p><b>Observaciones usuario: </b>{{ $orden->observaciones }}</p>
                </div>
                

                <div class="col-md-12">
                    <p><b>Observaciones Encargado: </b>{{ $orden->observacionesTaller }}</p>
                </div>
                <br>
                <div class="col-md-12">
                    <p>Estado de orden:<H2> {{ $orden->estado_solicitud  }}</H2></p>
                </div> 

               
            </div>
    
  
</body>
</html>