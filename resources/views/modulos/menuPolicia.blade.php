<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ url('Inicio') }}">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li> 
            <li>
                <a href="{{ url('Vehiculos') }}">
                    <i class="fa fa-car"></i>
                    <span>Registrar Kilometraje</span> 
                </a>
            </li>
            <li>
                <a href="{{ url('SolicitudMantenimiento/'.auth()->user()->id) }}">
                    <i class="fa fa-wrench"></i>
                    <span>Solicitud de mantenimiento</span> 
                </a>
            </li>
     
        </ul>
    </section>
</aside>