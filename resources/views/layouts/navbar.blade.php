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
    <li class="nav-item"><a class="nav-link" href="{{ route('productor.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-apple') }}"></use>
        </svg>Productos</a>
    </li> 
    <li class="nav-item"><a class="nav-link" href="{{ route('productor.contrato') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-library') }}"></use>
        </svg>Contratos</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('productor.contrato') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-vector') }}"></use>
        </svg>Proceso Venta</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('productor.contrato') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-bank') }}"></use>
        </svg>Ganancias</a>
    </li>
    @endif
    
</ul>