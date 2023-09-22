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
                <!--<a href="{{ url('SolicitudMantenimiento/'.auth()->user()->id) }}">-->
                <a href="{{ url('SolicitudMantenimiento') }}">
                    <i class="fa fa-wrench"></i>
                    <span>Solicitud de mantenimiento</span> 
                </a>
            </li>
            <li>
                <!--<a href="{{ url('SolicitudMantenimiento/'.auth()->user()->id) }}">-->
                <a href="{{ url('SolicitudMovilizacion') }}">
                    <i class="fa fa-car"></i>
                    <span>Solicitud de Movilizacion</span> 
                </a>
            </li>
            <li>
                <a href="{{ url('Historial') }}">
                    <i class="fa fa-list"></i>
                    <span>Historial de movilizacion</span>
                </a>
            </li>
     
        </ul>
    </section>
</aside>