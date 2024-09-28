@extends('layout.principal')

@section('user')
<li class="nav-item dropdown no-arrow">

    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>

        <?php
        if (Auth::user()->hasRole('admin')) {
            echo '<img class="img-profile rounded-circle" src="img/ADMIN.png">';
        } elseif (Auth::user()->hasRole('paciente')) {
            echo '<img class="img-profile rounded-circle" src="img/PACIENTE.png">';
        } elseif (Auth::user()->hasRole('doctor')) {
            echo ' <img class="img-profile rounded-circle" src="img/DOCTOR.png">';
        }
        ?>

    </a>
                            <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{url('perfil')}}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Perfil
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
@endSection

@section('info')
    <section class="solicitar_cita">
        <div class="cont_solicitar_cita">
            <div class="cont_titulo">
                <p><b>Solicitar cita por Whatsapp</b></p>
            </div>
            <div class="cont_texto">
                <p>Presiona el botón de Whatsapp para contactarnos directamente.</p>
            </div>
            <div class="cont_whatsapp">
                <div class="btn_whatsapp">
                    <a href="https://wa.link/u5lqml">
                            <img src="img/Whatsapp.png" alt="">                
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection