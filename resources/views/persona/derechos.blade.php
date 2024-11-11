@extends('layout.principal')

@section('user')
    <li class="nav-item dropdown no-arrow">

        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">  </span>

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
            <a class="dropdown-item" href="{{ url('perfil') }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Perfil
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
@endsection

@section('info')
    <section class="trat-datos">
        <div class="cont-1">
            <div class="cont_titulo">
                <p><b>Tratamiento de datos personales</b></p>
            </div>
            <div class="cont-texto">
                <p>Con el diligenciamiento de este formulario, usted autoriza de manera expresa, previa, libre, voluntaria e
                    informada a la Fundación Valle del Lili para que recolecte, clasifique, almacene, utilice, archive y de
                    cualquier otra manera trate sus datos personales para las finalidades como funciones propias de la
                    Institución, comunicación telefónica para agendamiento de citas, soportar la atención medico
                    asistencial, realizar encuestas de satisfacción, elaborar estudios estadísticos, científicos y/o
                    investigativos; enviar por cualquier canal suministrado (correo electrónico, SMS, físico), información
                    empresarial, académica, comercial o promocional de la Fundación Valle del Lili.

                    Si usted desea conocer (de manera gratuita), actualizar, rectificar (datos inexactos, incompletos,
                    fraccionados que induzcan al error) o suprimir los datos que nos ha suministrado, envíe un correo
                    electrónico al correo datospersonales@fvl.org.co donde se le dar trámite a su solicitud de conformidad
                    con lo establecido por los artículos 14 y 15 de la Ley 1581 de 2012, 20 a 23 del Decreto 1377 de 2013 y
                    demás normas vigentes.</p>
            </div>
            <button class="btn-aceptar">Aceptar</button>
        </div>
    </section>
@endsection
