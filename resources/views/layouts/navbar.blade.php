<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
    <li class="nav-title">Menu</li>
    {{-- ADMINISTRADOR --}}
    @if(Auth::user()->id_tipo_usuario==1)
    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">
        <svg class="nav-icon">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-applications-settings') }}"></use>
        </svg> Dashboard</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('usuario.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
        </svg> Usuarios</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('contrato.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-address-book') }}"></use>
        </svg> Contratos</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('proceso-venta.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-cash') }}"></use>
        </svg> Proceso Venta</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('solicitud.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-book') }}"></use>
        </svg> Solicitudes</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="typography.html">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
        </svg> Ingresar Venta Local</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="typography.html">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
        </svg> Subastas</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="typography.html">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
        </svg> Informes</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="typography.html">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
        </svg>Pagos</a>
    </li>
    @endif
    {{-- PRODUCTOR --}}
    @if(Auth::user()->id_tipo_usuario==6)
    <li class="nav-item"><a class="nav-link" href="{{ route('producto.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-apple') }}"></use>
        </svg>Productos</a>
    </li> 
    <li class="nav-item"><a class="nav-link" href="{{ route('contrato.contrato') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-library') }}"></use>
        </svg>Contratos</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-vector') }}"></use>
        </svg>Proceso Venta</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-bank') }}"></use>
        </svg>Ganancias</a>
    </li>
    @endif

    {{-- EXTERNO --}}
    @if(Auth::user()->id_tipo_usuario==3)
    <li class="nav-item"><a class="nav-link" href="{{ route('solicitud.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-apple') }}"></use>
        </svg>Solicitudes</a>
    </li> 
    <li class="nav-item"><a class="nav-link" href="{{ route('detalle_cliente.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-apple') }}"></use>
        </svg>Mis Empresas</a>
    </li> 
    <li class="nav-item"><a class="nav-link" href="">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-apple') }}"></use>
        </svg>Seguimiento</a>
    </li> 
    @endif
    
</ul>