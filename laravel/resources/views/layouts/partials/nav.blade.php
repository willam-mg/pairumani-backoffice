<ul class="nav">
    @if(Auth::user()->rol_id == null)
        
    @else 
        @if(kvfj(Auth::user()->rol->permisos,'roles_index'))
            <!-- SECCION ROLES -->
            <li class="nav-item {{ setActiveRoute(['roles_index','roles_create','roles_edit','roles_permisos']) }}">
                <a href="{{ route('roles_index') }}" class="nav-link">
                    <i class="material-icons">privacy_tip</i>
                    <p>
                        Roles
                    </p>
                </a>
            </li>
        @endif
        @if(kvfj(Auth::user()->rol->permisos,'usuarios_index'))
            <!-- SECCION USUARIOS -->
            <li class="nav-item {{ setActiveRoute(['usuarios_index','usuarios_create','usuarios_edit']) }}">
                <a href="{{ route('usuarios_index') }}" class="nav-link">
                    <i class="material-icons">people_alt</i>
                    <p>
                        Usuarios
                    </p>
                </a>
            </li>
        @endif
        @if(kvfj(Auth::user()->rol->permisos,'categorias_index'))
            <!-- SECCION CATEGORIAS -->
            <li class="nav-item {{ setActiveRoute(['categorias_index',
                                                   'categorias_create',
                                                   'categorias_edit',
                                                   'subcategorias_index',
                                                   'subcategorias_create',
                                                   'subcategorias_edit']) }}">
                <a href="{{ route('categorias_index') }}" class="nav-link">
                    <i class="material-icons">assignment</i>
                    <p>
                        Categorias
                    </p>
                </a>
            </li>
        @endif
        @if(kvfj(Auth::user()->rol->permisos,'usuariosapp_index'))
            <!-- SECCION USUARIOSAPP -->
            <li class="nav-item {{ setActiveRoute(['usuariosapp_index']) }}">
                <a href="{{ route('usuariosapp_index') }}" class="nav-link">
                    <i class="material-icons">people_alt</i>
                    <p>
                        Usuarios App
                    </p>
                </a>
            </li>
        @endif
        @if(kvfj(Auth::user()->rol->permisos,'departamentos_index'))
            <!-- SECCION Departamentos -->
            <li class="nav-item {{ setActiveRoute(['departamentos_index','departamentos_create','departamentos_edit','departamentos_show']) }}">
                <a href="{{ route('departamentos_index') }}" class="nav-link">
                    <i class="material-icons">location_city</i>
                    <p>
                        Departamentos
                    </p>
                </a>
            </li>
        @endif
        @if(kvfj(Auth::user()->rol->permisos,'comercios_index'))
            <!-- SECCION COMERCIOS -->
            <li class="nav-item {{ setActiveRoute(['comercios_index',
                                                    'comercios_create',
                                                    'comercios_edit',
                                                    'celulares_index',
                                                    'celulares_create',
                                                    'celulares_edit',
                                                    'celulares_show',
                                                    'celulares_create',
                                                    'horarios_index',
                                                    'horarios_create',
                                                    'horarios_edit',
                                                    'horarios_create',
                                                    'direcciones_index',
                                                    'direcciones_create',
                                                    'direcciones_edit',
                                                    'direcciones_create',
                                                    'subcategoriacomercios_index',
                                                    'subcategoriacomercios_create',
                                                    'subcategoriacomercios_edit',
                                                    'subcategoriacomercios_create',
                                                    'platos_index',
                                                    'platos_create',
                                                    'platos_edit',
                                                    'platos_show',
                                                    'platos_create',
                                                    'galerias_create',
                                                    'menus_index',
                                                    'menus_create',
                                                    'menus_edit',
                                                    'menus_show',
                                                    'menus_create',
                                                    'pagoscomercio_index',
                                                    'pagoscomercio_create',
                                                    'pagoscomercio_create']) }}">
                <a href="{{ route('comercios_index') }}" class="nav-link">
                    <i class="material-icons">dining</i>
                    <p>
                        Comercios
                    </p>
                </a>
            </li>
        @endif
        @if(kvfj(Auth::user()->rol->permisos,'pagos_index'))
            <!-- SECCION PAGOS -->
            <li class="nav-item {{ setActiveRoute(['pagos_index','pagos_create','pagos_edit','pagos_show']) }}">
                <a href="{{ route('pagos_index') }}" class="nav-link">
                    <i class="material-icons">attach_money</i>
                    <p>
                        Pagos
                    </p>
                </a>
            </li>
        @endif
    @endif
</ul>