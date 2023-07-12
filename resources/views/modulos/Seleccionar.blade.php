@extends ('plantilla')
@section ('contenido')
<section class="content">
    <center>
        <h1>Seleccione el rol para ingresar al sistema</h1>
    </center>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color:cornflowerblue; color:white;">
                <div class="inner">
                    <h3>Encargado</h3>
                    <p>Iniciar Sesión</p>
                </div>
                <div class="icon">
                    <i class="fa fa-male"></i>
                </div>
                <a  href="Ingresar" class="small-box-footer">
                    Ingresar<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color:coral; color:white;">
                <div class="inner">
                    <h3>Auxiliar</h3>
                    <p>Iniciar Sesión</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a  href="Ingresar" class="small-box-footer">
                    Ingresar<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color:darkcyan; color:white;">
                <div class="inner">
                    <h3>Policia</h3>
                    <p>Iniciar Sesión</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a  href="Ingresar" class="small-box-footer">
                    Ingresar<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box" style="background-color:darkkhaki; color:white;">
                <div class="inner">
                    <h3>Administrador</h3>
                    <p>Iniciar Sesión</p>
                </div>
                <div class="icon">
                    <i class="fa-sharp fa-regular fa-truck-front"></i>
                </div>
                <a  href="Ingresar" class="small-box-footer">
                    Ingresar<i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6" data-toggle="modal" data-target="#CrearReclamo">
            <div class="small-box" style="background-color: #71694e; color:white;">
                <div class="inner">
                    <h3>Comentarios y sugerencias</h3>
                    <p>Dejanos tus comentarios</p>
                </div>
            </div>
        </div>

    </div>
</section>

<div id="CrearReclamo" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3 class="modal-title" >Comentarios y sugerencias</h3>
            </div>
            
            <form method="post">
                @csrf
                <div class="modal-body">
                    <div class="box-body">
                        <div class="row">
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="circuito">* Circuito:</label>
                                    <select class="form-control" name="circuito" id="circuito" required>
                                        <option value="">Seleccionar...</option>
                                        

                                       

                                    </select>  
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subcircuito">* Subcircuito:</label>
                                    <select class="form-control" name="subcircuito" id="subcircuito" required>
                                        <option value="">Seleccionar...</option>
                                        @foreach($subcircuitos as $subcircuitos)
                                            <option value="{{ $subcircuito->id }}">{{ $subcircuito->nombre }}</option>
                                        @endforeach
                                    </select>  
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombres">* Nombres:</label>
                                    <input type="text" class="form-control" name="nombres" id= "nombres" placeholder="Ingrese sus nombres"required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellidos">* Apellidos:</label>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Ingrese sus apellidos" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tiporeclamo">* Tipo de contacto:</label>
                                    <select class="form-control" name="tiporeclamo" id="tiporeclamo" required>
                                        <option value="">Seleccionar...</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contacto">Contacto:</label>
                                    <input type="email" class="form-control" name="contacto" id="contacto" placeholder="micorreo@mantenimientovehicular.com">
                                    @error('email')
                                    <div class="alert alert-danger">El email ya existe.</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detalle">* Observaciones:</label>
                                    <textarea class="form-control" name="detalle" id="detalle" placeholder="Ingresa el detalle de tu sugerencia" maxlength="600" rows="8"></textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <p class= 'text-left'>* Datos obligatorios</p>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>

        </div>            
    </div>
</div>


@endsection

