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
    <li class="nav-item"><a class="nav-link" href="{{ route('saldo.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
        </svg> Ingresar Venta Local</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('subasta.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-truck') }}"></use>
        </svg>Subastas Externo</a>
    </li> 
    <li class="nav-item"><a class="nav-link" href="{{ route('subasta_local.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-truck') }}"></use>
        </svg>Subastas Local</a>
    </li> 
    <li class="nav-item"><a class="nav-link" href="{{ route('pedido.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-cart') }}"></use>
        </svg>Pedidos</a>
    </li> 
    @endif
    {{-- PRODUCTOR --}}
    
    @if(Auth::user()->id_tipo_usuario==6)
    <li class="nav-item"><a class="nav-link" href="{{ route('producto.index') }}" >
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-apple') }}"></use>
        </svg>Productos</a>
    </li> 
    <li class="nav-item"><a class="nav-link" href="{{ route('contrato.contrato') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-library') }}"></use>
        </svg>Contratos</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('proceso-venta.index') }}">
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
    <li class="nav-item"><a class="nav-link" href="{{ route('proceso-venta.index') }}">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-apple') }}"></use>
        </svg>Proceso venta</a>
    </li>
    <li class="nav-item"><a class="nav-link" href="">
        <svg class="nav-icon">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-apple') }}"></use>
        </svg>Seguimiento</a>
    </li> 
    @endif

    {{-- TRANSPORTISTA --}}
    @if(Auth::user()->id_tipo_usuario==5)
        <li class="nav-item"><a class="nav-link" href="{{ route('transporte.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-truck') }}"></use>
            </svg>Mi Transporte</a>
        </li> 
        <li class="nav-item"><a class="nav-link" href="{{ route('subasta.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-book') }}"></use>
            </svg>Subastas Externo</a>
        </li> 
        <li class="nav-item"><a class="nav-link" href="{{ route('subasta_local.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-book') }}"></use>
            </svg>Subastas Local</a>
        </li> 
    @endif

     {{-- Interno --}}
    @if(Auth::user()->id_tipo_usuario==4)
        <li class="nav-item"><a class="nav-link" href="{{ route('pedido.index') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-truck') }}"></use>
            </svg>Mis Pedidos</a>
        </li> 
    @endif

    
</ul>