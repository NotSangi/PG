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
        {!!Form::open(array('url'=>'post_formulario','method'=>'POST','autocomplete'=>'off'))!!}
        {{Form::token()}}
        <div class="agen-form">
            <form class="form" method="POST">

                <h3><b>¿Necesitas una cita? Nosotros te llamamos</b></h3>

<<<<<<< HEAD
                <select class="form-select" aria-label="Default select example" name="tipo_doc">
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
                    aria-label="default input example" name="identifiacion">
                <input class="form-control" type="text" placeholder="Nombre" aria-label="default input example"
                    name="nombre">
                <input class="form-control" type="text" placeholder="Apellidos" aria-label="default input example"
                    name="apellidos">
                <input class="form-control" type="text" placeholder="Número" aria-label="default input example"
                    name="celular">
                <input class="form-control" type="text" placeholder="Correo Eléctronico"
                    aria-label="default input example" name="correo">

                <select class="form-select" aria-label="Default select example" name="tratamiento">
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
                <select class="form-select" aria-label="Default select example" name="llamar">
                    <option value="1">Tan pronto como sea posible</option>
                    <option value="2">Elige fecha y hora</option>
                </select>

<<<<<<< HEAD
                <div class="form-check" name="der">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <a href="{{ url('derechos') }}" class="form-check-label" for="flexCheckDefault">
                        He leído y acepto el tratamiento de mis datos personales
                    </a>
                </div>

                <button class="btn-conf" type="Submit" name="btn-confirmar" value="ok">Confirmar</button>

            </form>
=======
                <button class="btn-conf">Confirmar</button>
=======
                <select class="form-select" aria-label="Default select example" id="tipo_documento" name="tipo_documento">
                    <option selected disabled>Tipo De Documento</option>
                    <option value="CC">CC - Cedula de Ciudadanía</option>
                    <option value="CE">CE - Cédula de Extranjería</option>
                    <option value="IE">IE - ID Extranjero</option>
                    <option value="NIT">NIT</option>
                    <option value="PA">PA - Pasaporte</option>
                    <option value="RC">RC - Registro Civil</option>
                    <option value="TI">TI - Tarjeta de Identidad</option>
                </select>

                <input class="form-control" type="text" placeholder="Número de Identificación" aria-label="default input example" id="document" name="document">
                <input class="form-control" type="text" placeholder="Nombre" aria-label="default input example" id="name" name="name">
                <input class="form-control" type="text" placeholder="Apellidos" aria-label="default input example" id="last_name" name="last_name">
                <input class="form-control" type="text" placeholder="Número" aria-label="default input example" id="tel" name="tel">
                <input class="form-control" type="text" placeholder="Correo Eléctronico" aria-label="default input example" id="email" name="email">

                <select class="form-select" aria-label="Default select example" id="tratamiento" name="tratamiento"> 
                    <option selected disabled>Elige tu tratamiento</option>
                    <option value="Diseno de Sonrisa">Diseño de Sonrisa</option>
                    <option value="Endodoncia">Endodoncia</option>
                    <option value="Periodoncia">Periodoncia</option>
                    <option value="Cirugia Oral">Cirugia Oral</option>
                    <option value="Coronas y Protesis">Coronas y Prótesis</option>
                    <option value="Calzas Blancas">Calzas Blancas (Resinas)</option>
                    <option value="Ortodoncia">Ortodoncia</option>
                    <option value="Certificados Odontologicos">Certificados Odontológicos</option>
                    <option value="Higiene Oral">Higiene Oral</option>
                </select>

                <p>¿Cuándo deberíamos llamarte?</p>
                <select class="form-select" aria-label="Default select example" id="llamada" name="llamada">
                    <option value="Rapido">Tan pronto como sea posible</option>
                    <option value="Normal">No hay afán</option>
                </select>

                <button class="btn-conf" type="submit">Confirmar</button>
>>>>>>> 3232c2133435f24506380b23ad66a4003122beae

            </div>
>>>>>>> 5774254e1bb0859ce1f3f7cc89dd6184277a2c83
        </div>
        {{Form::close()}}
    </section>

    <section class="mapa">
        <div class="cont_mapa">
            <div class="cont_img_mapa">
                <img src="img/mapa.png" alt="">
            </div>
            <div class="info_sede">
                <h2>¡Nuestra Sede!</h2>
                <p>Mi Nueva Sonrisa</p>
                <p>Cra 12 Bis 65</p>
                <a href="https://www.google.com/maps/place/Cra.+12+Bis,+Comuna+8,+Cali,+Valle+del+Cauca/@3.4467954,-76.4911792,20.75z/data=!4m6!3m5!1s0x8e30a7a8a065fd8f:0x570fef5cbcf9023f!8m2!3d3.4468127!4d-76.491066!16s%2Fg%2F11byl6wf2k?entry=ttu&g_ep=EgoyMDI0MDkyNS4wIKXMDSoASAFQAw%3D%3D"
                    target="_blank">
                    <div class="red_maps">
                        Ir a maps
                    </div>
                </a>

            </div>
        </div>
    </section>
@endsection
