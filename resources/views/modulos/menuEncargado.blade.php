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
                <a href="{{ url('Policias') }}">
                    <i class="fa fa-users"></i>
                    <span>Policias</span>
                </a>
            </li>   
            <li>
                <a href="{{ url('Vehiculos') }}">
                    <i class="fa fa-car"></i>
                    <span>Vehiculos</span> 
                </a>
            </li>
            <li>
                <a href="{{ url('Dependencias') }}">
                    <i class="fa fa-list"></i>
                    <span>Dependencias</span>
                </a>
            </li>
            <li>
                <a href="{{ url('PersonalSubcircuito') }}">
                    <i class="fa fa-link"></i>
                    <span>Subcircuito - Personal policial</span>
                </a>
            </li>
            <li>
                <a href="{{ url('VehiculoSubcircuito') }}">
                    <i class="fa fa-share"></i>
                    <span>Subcircuito - Flota Vehícular</span>
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