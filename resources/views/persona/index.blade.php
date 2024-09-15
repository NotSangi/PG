@extends('layout.principal')

@section('user')
<li class="nav-item dropdown no-arrow">

    <a class="nav-i-r" href="{{url(path: 'login')}}" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="d-none d-lg-inline text-gray-600 small" style="font-size: 15px">INICIO SESION</span>
    </a>
    <a class="nav-i-r" href="{{url('register')}}" id="userDropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="d-none d-lg-inline text-gray-600 small" style="font-size: 15px; margin: 0 40px 0 20px">REGISTRO</span>
    </a>
                            
</li>
@endSection

@section('componentes')

<a class="nav-link collapsed" style="text-align: center" href="#quienesSomos" aria-expanded="true" >
    <span>QUIÉNES SOMOS</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="#nuestroEquipo" aria-expanded="true" >
    <span>NUESTRO EQUIPO</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="#mision-vision" aria-expanded="true" >
    <span>MISION Y VISION</span>
</a>


@endsection
