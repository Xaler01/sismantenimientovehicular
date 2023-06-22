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
                    <h3>Conductor</h3>
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

    </div>
</section>
@endsection

