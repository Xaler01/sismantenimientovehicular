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
                <a href="{{ url('Parroquias') }}">
                    <i class="fa fa-list"></i>
                    <span>Parroquias</span>
                </a>
            </li>
            <li>
                <a href="{{ url('Subcircuitos') }}">
                    <i class="fa fa-list"></i>
                    <span>Subcircuitos</span>
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
                <a href="{{ url('AsignarVehiculo') }}">
                    <i class="fa fa-id-card"></i>
                    <span>Asignar Vehiculo - Policia</span>
                </a>
            </li>
            <li>
                <!--<a href="{{ url('SolicitudMantenimiento/'.auth()->user()->id) }}">-->
                <a href="{{ url('SolicitudMantenimiento') }}">
                    <i class="fa fa-calendar-check-o"></i>
                    <span>Solicitud de mantenimiento</span> 
                </a>
            </li>
            <li>
                <!--<a href="{{ url('SolicitudMantenimiento/'.auth()->user()->id) }}">-->
                <a href="{{ url('SolicitudMovilizacion') }}">
                    <i class="fa fa-calendar-check-o"></i>
                    <span>Solicitud de Movilizacion</span> 
                </a>
            </li>
            <li>
                <a href="{{ url('Solicitudes') }}">
                    <i class="fa fa-list"></i>
                    <span>Gestion de Solicitudes</span> 
                </a>
            </li>
            <li >
                <a href="{{ url('Ordenes') }}">                    
                    <i class="fa fa-cogs"></i>
                    <span>Aut. Ordes y Solicitudes</span> 
                </a>
            </li>
            <li >
                <a href="{{ url('Autorizaciones') }}">                    
                    <i class="fa fa-cogs"></i>
                    <span>Autorizaciones de movilización</span> 
                </a>
            </li>
           
        
        </ul>
    </section>
</aside>