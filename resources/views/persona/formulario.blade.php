@extends('layout.principal')

@section('user')
    <li class="nav-item dropdown no-arrow">

        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
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
                    <?php
                    $name = Auth::user()->name;
                    $last_name = Auth::user()->last_name;
                    $mensaje = "https://api.whatsapp.com/send?phone=573162380774&text=Hola!,%20mi%20nombre%20es%20$name%20$last_name,%20me%20gustaría%20agendar%20una%20cita";
                    
                    echo '<a href="' . $mensaje . '"><img src="img/Whatsapp.png" alt=""></a>';
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="form_cita">
        <div class="agen-form">
            <div class="form">

                <h3><b>¿Necesitas una cita? Nosotros te llamamos</b></h3>

                <select class="form-select" aria-label="Default select example">
                    <option selected>Tipo De Documento</option>
                    <option value="1">CC - Cedula de Ciudadanía</option>
                    <option value="2">CE - Cédula de Extranjería</option>
                    <option value="3">IE - ID Extranjero</option>
                    <option value="4">NIT</option>
                    <option value="5">PA - Pasaporte</option>
                    <option value="6">RC - Registro Civil</option>
                    <option value="7">TI - Tarjeta de Identidad</option>
                </select>

                <input class="form-control" type="text" placeholder="Número de Identificación"
                    aria-label="default input example">
                <input class="form-control" type="text" placeholder="Nombre" aria-label="default input example">
                <input class="form-control" type="text" placeholder="Apellidos" aria-label="default input example">
                <input class="form-control" type="text" placeholder="Número" aria-label="default input example">
                <input class="form-control" type="text" placeholder="Correo Eléctronico"
                    aria-label="default input example">

                <select class="form-select" aria-label="Default select example">
                    <option selected>Elige tu tratamiento</option>
                    <option value="1">Diseño de Sonrisa</option>
                    <option value="2">Endodoncia</option>
                    <option value="3">Periodoncia</option>
                    <option value="4">Cirugia Oral</option>
                    <option value="5">Coronas y Prótesis</option>
                    <option value="6">Calzas Blancas (Resinas)</option>
                    <option value="7">Ortodoncia</option>
                    <option value="8">Certificados Odontológicos</option>
                    <option value="9">Higiene Oral</option>
                </select>

                <p>¿Cuándo deberíamos llamarte?</p>
                <select class="form-select" aria-label="Default select example">
                    <option value="1">Tan pronto como sea posible</option>
                    <option value="2">Elige fecha y hora</option>
                </select>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <a href="{{url('derechos')}}" class="form-check-label" for="flexCheckDefault">
                        He leído y acepto el tratamiento de mis datos personales
                    </a>
                </div>


                <button class="btn-conf">Confirmar</button>

            </div>
        </div>
    </section>
@endsection
