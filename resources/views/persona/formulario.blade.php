@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
@endsection
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
            <input class="form-inputs @error('email') is-invalid @enderror" type="email"
                placeholder="Correo Eléctronico" aria-label="default input example" name="email" id="email"
                value={{Auth::user()->email}}>
            <p id="error-email" style="color: red; display: none;">Por favor, ingresa una dirección de correo
                electrónico válida.</p>

            <select class="form-inputs" aria-label="Default select example" name="tratamiento" id="tratamiento">
                <option selected disabled value="">Elige tu tratamiento</option>

                @foreach ($tratamientos as $tratamiento)
                    <option value="{{$tratamiento->name}}">{{ $tratamiento->description}}</option>
                @endforeach

            </select>

            <p style="color: #003366; font-size: 25px; margin: 10px 0 0 0;">¿Cuándo deberíamos llamarte?</p>
            <select class="form-inputs" aria-label="Default select example" name="prioridad" id="prioridad">
                <option selected disabled value="">Elige una opcion</option>
                <option value="Alta">Tan pronto como sea posible</option>
                <option value="Baja">Cuando haya disponibilidad</option>
            </select>
            <button class="btn-conf" type="Submit" name="btn-confirmar" data-bs-toggle="modal"
                data-bs-target="#exampleModal" id="submitBtn">Confirmar</button>


            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-admin">
                        <div>
                            <h5 class="titulo-modal">Cita solicitada correctamente</h5>
                        </div>
                        <div>
                            Puedes ver todas tus citas en la sección "Citas" o en la Agenda al estar asignadas.
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    {{Form::close()}}
</section>

<script>
    const formInputs = document.querySelectorAll('.form-inputs');
    const emailInput = document.getElementById('email');
    const submitBtn = document.getElementById('submitBtn');
    const errorEmail = document.getElementById('error-email');

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }

    function checkFormValidity() {
        let isFormComplete = true;

        formInputs.forEach(input => {
            if (input.type === 'select-one') {
                if (input.value === '' || input.value === null) {
                    isFormComplete = false;
                }
            } else {
                if (input.value.trim() === '') {
                    isFormComplete = false;
                }
            }
        });

        const emailIsValid = validateEmail(emailInput.value);

        submitBtn.disabled = !isFormComplete || !emailIsValid;

        if (!emailIsValid) {
            errorEmail.style.display = 'block';
        } else {
            errorEmail.style.display = 'none';
        }
    }

    // Add event listeners
    emailInput.addEventListener('input', checkFormValidity);
    formInputs.forEach(input => {
        input.addEventListener('change', checkFormValidity);
    });

    checkFormValidity();
</script>

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

<a class="nav-link collapsed" style="text-align: center" href="{{ url('citas')}}" aria-expanded="true">
    <span>CITAS</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true">
    <span>AGENDA</span>
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