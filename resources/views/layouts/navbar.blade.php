<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
<li class="nav-title">Menu</li>
<li class="nav-item"><a class="nav-link" href="{{ route('home') }}">
    <svg class="nav-icon">
    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-applications-settings') }}"></use>
    </svg> Dashboard</a>
</li>
@if(Auth::user()->id_tipo_usuario==1)
<li class="nav-item"><a class="nav-link" href="{{ route('usuario.index') }}">
    <svg class="nav-icon">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
    </svg> Usuarios</a>
</li>
<li class="nav-item"><a class="nav-link" href="">
    <svg class="nav-icon">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-address-book') }}"></use>
    </svg> Contratos</a>
</li>
<li class="nav-item"><a class="nav-link" href="">
    <svg class="nav-icon">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-cash') }}"></use>
    </svg> Proceso Venta</a>
</li>
@endif
<li class="nav-item"><a class="nav-link" href="typography.html">
    <svg class="nav-icon">
        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-pencil') }}"></use>
    </svg> Solicitudes</a>
</li>
</ul>