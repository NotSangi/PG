<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

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
    {!!Form::open(array('url' => 'post_formulario', 'method' => 'POST', 'autocomplete' => 'off'))!!}
    {{Form::token()}}
    <div class="agen-form">
        <form class="form" method="POST" id="form_cita">

            <h2 style="color: #003366; font-size: 40px; margin-bottom: 30px;"><b>¿Necesitas una cita? Nosotros te
                    llamamos</b></h2>

            <select class="form-inputs" aria-label="Default select example" name="tipo_documento" id="tipo_documento">
                @foreach ($documentos as $document)
                    <option value="{{$document->name}}">{{ $document->description}}</option>
                @endforeach
            </select>

            <input class="form-inputs" type="text" placeholder="Número de Identificación"
                aria-label="default input example" name="document" id="document" value={{Auth::user()->document}}>
            <input class="form-inputs" type="text" placeholder="Nombre" aria-label="default input example" name="name"
                id="name" value={{Auth::user()->name}}>
            <input class="form-inputs" type="text" placeholder="Apellidos" aria-label="default input example"
                name="last_name" id="last_name" value={{Auth::user()->last_name}}>
            <input class="form-inputs" type="text" placeholder="Número" aria-label="default input example" name="tel"
                id="tel" value={{Auth::user()->tel}}>
            <input class="form-inputs" type="text" placeholder="Correo Eléctronico" aria-label="default input example"
                name="email" id="email" value={{Auth::user()->email}}>

            <select class="form-inputs" aria-label="Default select example" name="tratamiento" id="tratamiento">
                <option selected disabled value="">Elige tu tratamiento</option>
                <option value="Diseño de Sonrisa">Diseño de Sonrisa</option>
                <option value="Endodoncia">Endodoncia</option>
                <option value="Periodoncia">Periodoncia</option>
                <option value="Cirugia Oral">Cirugia Oral</option>
                <option value="Coronas y Protesis">Coronas y Prótesis</option>
                <option value="Calzas Blancas">Calzas Blancas (Resinas)</option>
                <option value="Ortodoncia">Ortodoncia</option>
                <option value="Certificados Odontologicos">Certificados Odontológicos</option>
                <option value="Higiene Oral">Higiene Oral</option>
            </select>

            <p style="color: #003366; font-size: 25px; margin: 10px 0 0 0;">¿Cuándo deberíamos llamarte?</p>
            <select class="form-inputs" aria-label="Default select example" name="llamada" id="llamada">
                <option selected disabled value="">Elige una opcion</option>
                <option value="Rapido">Tan pronto como sea posible</option>
                <option value="Lento">Cuando haya disponibilidad</option>
            </select>

            @if ($errors->has('completar_formulario'))
                <div class="alert alert-danger">
                    {{ $errors->first('completar_formulario') }}
                </div>
            @endif

            <button class="btn-conf" type="Submit" name="btn-confirmar">Confirmar</button>


            <script>
                $(document).ready(function () {
                    $('#form_cita').submit(function (event) {
                        event.preventDefault(); // Evita el envío del formulario por defecto

                        var form = $(this);
                        var url = form.attr('action'); // Obtiene la URL del formulario

                        $.ajax({
                            type: "POST",
                            url: url,
                            data: form.serialize(),
                            success: function (response) {
                                if (response.success) { // Si la respuesta es exitosa
                                    $('#exampleModal').modal('show'); // Muestra el modal
                                } else {
                                    // Manejar errores de validación o otras respuestas no exitosas
                                }
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                // Manejar errores durante la petición AJAX
                            }
                        });
                    });
                });
            </script>


        </form>

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

@section('componentes')

<?php 
    if (Auth::user()) {
    if (Auth::user()->hasRole('paciente')) { ?>

<a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true">
    <span>AGENDA</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{ url('citas')}}" aria-expanded="true">
    <span>CITAS</span>
</a>

<?php    } elseif (Auth::user()->hasRole('doctor')) { ?>

<a class="nav-link collapsed" style="text-align: center" href="{{url('especialidad')}}" aria-expanded="true">
    <span>ESPECIALIDAD</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{ url('citas')}}" aria-expanded="true">
    <span>CITAS</span>
</a>

<?php    } elseif (Auth::user()->hasRole('admin')) { ?>

<a class="nav-link collapsed" style="text-align: center" href="{{url('pacientes')}}" aria-expanded="true">
    <span>PACIENTES</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{url('doctores')}}" aria-expanded="true">
    <span>DOCTORES</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{ url('citasAdmin')}}" aria-expanded="true">
    <span>CITAS</span>
</a>

<?php    }
} else { ?>

<a class="nav-link collapsed" style="text-align: center" href="#quienesSomos" aria-expanded="true">
    <span>QUIÉNES SOMOS</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="#mision_vision" aria-expanded="true">
    <span>MISION Y VISION</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="#contacto_cuidados" aria-expanded="true">
    <span>CONTACTO Y CUIDADOS</span>
</a>

<?php } ?>

@endsection