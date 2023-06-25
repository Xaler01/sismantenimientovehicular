@extends('plantilla')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h3>Gestor de Vehiculos</h3>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <a href="Crear-Vehiculo">
                    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#CrearVehiculo">Agregar Vehiculo </button>
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped dt-responsive">
                    <thead>
                        <tr>                        
                            <th>Id</th> 
                            <th>Tipo Vehiculo</th>
                            <th>Placa</th> 
                            <th>Chasis</th>
                            <th>Marca</th>
                            <th>Modelo</th> 
                            <th>Motor</th>
                            <th>Kilometraje</th>
                            <th>Cilindraje</th>
                            <th>Capacidad de carga</th>
                            <th>Capacidad de pasajeros</th>
                            <th>Edital / Borrar</th>
                        </tr>
                    </thead>
                    
                    <tbody>   
                       
                            <tr>
                                <td>1</td>
                                <td>Moto</td>
                                <td>A123BC</td>
                                <td>abc12345678xyz</td>
                                <td>Suzuki</td>
                                <td>2023</td>
                                <td>abc234234xyz</td>
                                <td>2000</td>
                                <td>650cc</td>
                                <td>200kg</td>
                                <td>2</td>
                                <td>
                                    <button class="btn btn-success"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>                             
                            
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>
@endsection