<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
<li class="nav-title">Menu</li>
<li class="nav-item"><a class="nav-link" href="{{ route('home') }}">
    <svg class="nav-icon">
    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
    </svg> Dashboard</a>
</li>
@if(Auth::user()->id_tipo_usuario==1)
<li class="nav-item"><a class="nav-link" href="{{ route('usuario.index') }}">
    <svg class="nav-icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
    </svg> Usuarios</a>
</li>
<li class="nav-item"><a class="nav-link" href="{{ route('productor.index') }}">
    <svg class="nav-icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
    </svg> Productores</a>
</li>
@endif
<li class="nav-item"><a class="nav-link" href="typography.html">
    <svg class="nav-icon">
        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
    </svg> Solicitudess</a>
</li>
</ul>