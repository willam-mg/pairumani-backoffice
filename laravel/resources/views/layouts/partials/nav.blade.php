<ul class="nav nav-mobile-menu">
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#mobile">
            <i class="material-icons">person</i>
            <p> {{auth()->user()->nombre}} {{auth()->user()->apellido}}
                <b class="caret"></b>
            </p>
        </a>
        <div class="collapse" id="mobile">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="material-icons">exit_to_app</i>
                        <span class="sidebar-normal"> Salir </span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </li>
</ul>
<ul class="nav">
    {{-- @if(Auth::user()->rol_id == null)
        
    @else  --}}
        <li class="nav-item {{ setActiveRoute(['usuarios_index','usuarios_create','usuarios_edit','usuarios_show','roles_index','roles_create','roles_edit','roles_permisos','hotel_galeria']) }}">
            <a class="nav-link" data-toggle="collapse" href="#sistema" aria-expanded="{{ setActiveRouteExpanded(['usuarios_index','usuarios_create','usuarios_edit','usuarios_show','roles_index','roles_create','roles_edit','roles_permisos','hotel_galeria']) }}">
                <i class="material-icons">face</i>
                <p> Sistema
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse {{ setActiveRouteShow(['usuarios_index','usuarios_create','usuarios_edit','usuarios_show','roles_index','roles_create','roles_edit','roles_permisos','hotel_galeria']) }}" id="sistema">
                <ul class="nav">
                    {{-- @if(kvfj(Auth::user()->rol->permisos,'usuarios_index')) --}}
                        <!-- SECCION USUARIOS -->
                        <li class="nav-item {{ setActiveRoute(['usuarios_index','usuarios_create','usuarios_edit','usuarios_show']) }}">
                            <a href="{{ route('usuarios_index') }}" class="nav-link">
                                <i class="material-icons">people_alt</i>
                                <span class="sidebar-normal"> Usuarios </span>
                            </a>
                        </li>
                    {{-- @endif --}}
                    {{-- @if(kvfj(Auth::user()->rol->permisos,'roles_index')) --}}
                        <!-- SECCION ROLES -->
                        <li class="nav-item {{ setActiveRoute(['roles_index','roles_create','roles_edit','roles_permisos']) }}">
                            <a href="{{ route('roles_index') }}" class="nav-link">
                                <i class="material-icons">privacy_tip</i>
                                <span class="sidebar-normal"> Roles </span>
                            </a>
                        </li>
                    {{-- @endif  --}}
                    {{-- @if(kvfj(Auth::user()->rol->permisos,'hotel_galeria')) --}}
                        <!-- SECCION HOTEL -->
                        <li class="nav-item {{ setActiveRoute(['hotel_galeria']) }}">
                            <a href="{{ route('hotel_galeria') }}" class="nav-link">
                                <i class="material-icons">domain</i>
                                <span class="sidebar-normal"> Hotel </span>
                            </a>
                        </li>
                    {{-- @endif  --}}
                </ul>
            </div>
        </li>
        {{-- @if(kvfj(Auth::user()->rol->permisos,'habitacioncategorias_index')) --}}
            <!-- SECCION acompanantes -->
            <li class="nav-item {{ setActiveRoute(['habitacioncategorias_index','habitacioncategorias_create','habitacioncategorias_edit','habitacioncategorias_show','habitaciones_index','habitaciones_create','habitaciones_edit','habitaciones_show','habitaciones_galeria','reservas_index','reservas_create','reservas_edit','reservas_show','reservas_hospedaje']) }}">
                <a href="{{ route('habitacioncategorias_index') }}" class="nav-link">
                    <i class="material-icons">assignment</i>
                    <p>
                        Habitacion Categorias
                    </p>
                </a>
            </li>
        {{-- @endif --}} 
        {{-- @if(kvfj(Auth::user()->rol->permisos,'restaurantecategorias_index')) --}}
            <!-- SECCION acompanantes -->
            <li class="nav-item {{ setActiveRoute(['restaurantecategorias_index','restaurantecategorias_create','restaurantecategorias_edit','restaurantecategorias_show','productos_index','productos_create','productos_edit','productos_show','productos_galeria','opciones_index','opciones_create','opciones_edit','opciones_show','tamanos_index','tamanos_create','tamanos_edit','tamanos_show']) }}">
                <a href="{{ route('restaurantecategorias_index') }}" class="nav-link">
                    <i class="material-icons">assignment</i>
                    <p>
                        Restaurante Categorias
                    </p>
                </a>
            </li>
        {{-- @endif --}}               
        {{-- @if(kvfj(Auth::user()->rol->permisos,'acompanantes_index')) --}}
            <!-- SECCION Acompañantes -->
            <li class="nav-item {{ setActiveRoute(['acompanantes_index','acompanantes_create','acompanantes_edit','acompanantes_show']) }}">
                <a href="{{ route('acompanantes_index') }}" class="nav-link">
                    <i class="material-icons">people_alt</i>
                    <p>
                        Acompañantes
                    </p>
                </a>
            </li>
        {{-- @endif --}}
        {{-- @if(kvfj(Auth::user()->rol->permisos,'clientes_index')) --}}
            <!-- SECCION acompanantes -->
            <li class="nav-item {{ setActiveRoute(['clientes_index','clientes_create','clientes_edit','clientes_show']) }}">
                <a href="{{ route('clientes_index') }}" class="nav-link">
                    <i class="material-icons">people_alt</i>
                    <p>
                        Clientes
                    </p>
                </a>
            </li>
        {{-- @endif --}}        
        {{-- @if(kvfj(Auth::user()->rol->permisos,'hospedajes_index')) --}}
            <!-- SECCION acompanantes -->
            <li class="nav-item {{ setActiveRoute(['hospedajes_index','hospedajes_create','hospedajes_edit','hospedajes_show','hospedajes_transporte']) }}">
                <a href="{{ route('hospedajes_index') }}" class="nav-link">
                    <i class="material-icons">hotel</i>
                    <p>
                        Hospedajes
                    </p>
                </a>
            </li>
        {{-- @endif --}}        
        {{-- @if(kvfj(Auth::user()->rol->permisos,'eventos_index')) --}}
            <!-- SECCION acompanantes -->
            <li class="nav-item {{ setActiveRoute(['eventos_index','eventos_create','eventos_edit','eventos_show','eventos_galeria']) }}">
                <a href="{{ route('eventos_index') }}" class="nav-link">
                    <i class="material-icons">event</i>
                    <p>
                        Eventos
                    </p>
                </a>
            </li>
        {{-- @endif --}}                
        {{-- @if(kvfj(Auth::user()->rol->permisos,'promociones_index')) --}}
            <!-- SECCION acompanantes -->
            <li class="nav-item {{ setActiveRoute(['promociones_index','promociones_create','promociones_edit','promociones_show','promocionreservas_index','promocionreservas_create','promocionreservas_edit','promocionreservas_show']) }}">
                <a href="{{ route('promociones_index') }}" class="nav-link">
                    <i class="material-icons">campaign</i>
                    <p>
                        Promociones
                    </p>
                </a>
            </li>
        {{-- @endif --}}        
        {{-- @if(kvfj(Auth::user()->rol->permisos,'lugaresturisticos_index')) --}}
            <!-- SECCION acompanantes -->
            <li class="nav-item {{ setActiveRoute(['lugaresturisticos_index','lugaresturisticos_create','lugaresturisticos_edit','lugaresturisticos_show','lugaresturisticos_galeria']) }}">
                <a href="{{ route('lugaresturisticos_index') }}" class="nav-link">
                    <i class="material-icons">hiking</i>
                    <p>
                        Lugares Turisticos
                    </p>
                </a>
            </li>
        {{-- @endif --}}        
        {{-- @if(kvfj(Auth::user()->rol->permisos,'transportes_index')) --}}
            <!-- SECCION acompanantes -->
            <li class="nav-item {{ setActiveRoute(['transportes_index','transportes_create','transportes_edit','transportes_show']) }}">
                <a href="{{ route('transportes_index') }}" class="nav-link">
                    <i class="material-icons">directions_car</i>
                    <p>
                        Transportes
                    </p>
                </a>
            </li>
        {{-- @endif --}}        
    {{-- @endif --}}
</ul>