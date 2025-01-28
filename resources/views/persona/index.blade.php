@extends('layout.principal')

@section('user')
<li class="nav-item dropdown no-arrow">

    <?php
if (Auth::user()) {
        
    ?>
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
<?php
} else {
?>


<a class="nav-i-r" href="{{url(path: 'login')}}" id="userDropdown" role="button" aria-haspopup="true"
    aria-expanded="false">
    <span class="d-none d-lg-inline text-gray-600 small" style="font-size: 15px">INICIO SESION</span>
</a>
<a class="nav-i-r" href="{{url('preRegister')}}" id="userDropdown" role="button" aria-haspopup="true"
    aria-expanded="false">
    <span class="d-none d-lg-inline text-gray-600 small" style="font-size: 15px; margin: 0 40px 0 20px">REGISTRO</span>
</a>

</li>

<?php
}
?>

@endSection

@section('info')
<section class="seccion-1">

    <div class="tt-btn">

        <div class="tt">
            <h1>
                <b>
                    ¡Sonríe con Confianza!
                </b>
            </h1>
        </div>

        <div class="textt">
            <p>

                ¿Listo para un cambio que te hará brillar? En Mi Nueva Sonrisa, estamos
                aquí para ayudarte a alcanzar la sonrisa saludable y radiante que siempre has
                deseado. Nuestros expertos están listos para ofrecerte cuidados dentales de primera
                calidad en un ambiente cómodo y amigable.

            </p>
            <p>
                Tu sonrisa es nuestro compromiso. ¡Esperamos verte pronto!
            </p>
        </div>

        <div class="btn-cita">
            <a href="{{ url('formulario') }}">
                <button class="btnagn">
                    Agendar
                </button>
                <a />
        </div>

    </div>

</section>

<!-- QUIENES SOMOS -->

<section class="seccion-2" id="quienesSomos">
    <div class="container px-4 text-center">
        <div class="row gx-5">
            <div class="col">
                <div class="quienes-somos">
                    <h2>
                        <b>
                            ¿Quiénes Somos?
                        </b>
                    </h2>

                    <p>
                        En Mi Nueva Sonrisa, nos especializamos en brindar atención
                        odontológica de alta calidad con un enfoque personalizado. Nuestro equipo de
                        profesionales dedicados está comprometido con su salud bucal y su bienestar,
                        utilizando tecnología avanzada y técnicas modernas para asegurar
                        tratamientos eficaces y confortables.

                        Nuestra misión es ofrecerle una experiencia dental agradable y sin estrés,
                        cuidando cada detalle para que su sonrisa se mantenga saludable y radiante.
                        ¡Gracias por elegirnos para su cuidado dental!
                    </p>
                </div>
            </div>
            <div class="col cont-img-quienes-somos">
                <div class="quienes-img">
                    <img src="img/sonrisa.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

</section>

<section class="seccion-3" id="mision_vision">
    <div class="col-mivi">
        <div class="mision">
            <div class="tt-misvis">
                <h3><b>Mision</b></h3>
            </div>

            <div class="misvis-txt">
                En "Mi Nueva Sonrisa", nos dedicamos a ofrecer una atención odontológica
                integral y personalizada, adaptada a las necesidades individuales de
                cada paciente. Nuestro objetivo es crear un ambiente cálido y acogedor,
                donde la comodidad y la confianza sean prioritarias. Utilizamos
                tecnología de vanguardia y técnicas avanzadas para garantizar
                tratamientos efectivos y de calidad. Nos comprometemos a educar a
                nuestros pacientes sobre la salud dental y fomentar hábitos que les
                permitan mantener sonrisas saludables a lo largo de su vida. Cada visita
                es una oportunidad para transformar sonrisas y vidas, construyendo
                relaciones duraderas basadas en la confianza y el respeto.
            </div>
        </div>
    </div>

    <div class="col-mivi">
        <div class="vision">
            <div class="tt-misvis">
                <h3><b>Vision</b></h3>
            </div>

            <div class="misvis-txt">
                Ser el consultorio odontológico líder en nuestra comunidad,
                reconocido
                no solo por la excelencia en la atención dental, sino también por
                nuestro compromiso con la educación y el bienestar de nuestros
                pacientes. Aspiramos a ser un referente en el cuidado bucal, donde
                cada
                persona se sienta valorada y empoderada para alcanzar una salud
                dental
                óptima. Queremos que "Mi Nueva Sonrisa" sea sinónimo de confianza,
                innovación y sonrisas felices que impacten positivamente en la vida
                de
                cada paciente.
            </div>
        </div>
    </div>
</section>

<section class="seccion-4" id="contacto_cuidados">
    <div class="col-contacdent">
        <div class="tt-conden">
            <h3>
                <b>
                    Contáctanos
                </b>
            </h3>
        </div>
        <div class="p-conden">

            <div class="p">ODONTOLOGÍA INTEGRAL - Todas las Especialidades</div>
            <div class="p">• Diseño de Sonrisa: Transformamos tu sonrisa con nuestro Diseño de
                Sonrisa personalizado.</div>
            <div class="p">• Endodoncia: Especializados en Endodoncia, realizamos tratamientos
                de conducto para salvar dientes.</div>
            <div class="p">• Periodoncia: Cuidamos tus encías con nuestra especialidad en
                Periodoncia.</div>
            <div class="p">• Cirugia Oral: Realizamos Cirugía Oral para extracciones y
                correcciones dentales.</div>
            <div class="p">• Coronas y Prótesis: Ofrecemos Coronas y Prótesis para restaurar
                tu sonrisa.</div>
            <div class="p">• Calzas Blancas (Resinas): Usamos Calzas Blancas para reparar
                caries de forma estética.</div>
            <div class="p">• Ortodoncia: Nuestra Ortodoncia alinea tus dientes y mejora tu
                salud dental.</div>
            <div class="p">• Certificados Odontológicos: Proporcionamos Certificados
                Odontológicos para validar tus tratamientos.</div>
            <div class="p">• Higiene Oral: Promovemos una adecuada Higiene Oral para mantener
                tu boca saludable.</div>

            <div class="p"><b>Cel: 300 2804691</b></div>
        </div>
    </div>

    <div class="col-contacdent">
        <div class="tt-conden">
            <h3>
                <b>
                    Cuidados Dentales
                </b>
            </h3>
        </div>
        <div class="p-conden">

            <div class="p">• Cepillado adecuado: Cepíllate los dientes al menos dos veces al
                día durante dos minutos.</div>
            <div class="p">• Uso de hilo dental: Limpia entre los dientes a diario para
                eliminar la placa y restos de comida.</div>
            <div class="p">• Enjuague bucal: Utiliza un enjuague bucal antiséptico para
                combatir bacterias y refrescar el aliento.</div>
            <div class="p">• Dieta saludable: Consume menos azúcares y más frutas, verduras y
                lácteos para fortalecer los dientes.</div>
            <div class="p">• Hidratación: Bebe suficiente agua para ayudar a limpiar la boca y
                mantener la saliva.</div>
            <div class="p">• Limita snacks: Evita picar entre comidas para reducir el riesgo
                de caries.</div>
            <div class="p">• Protege tus dientes: Usa un protector bucal si practicas deportes
                de contacto.</div>
            <div class="p">• Deja el tabaco: No fumes ni uses productos de tabaco, ya que
                dañan encías y dientes.</div>
            <div class="p">• Chequeos regulares: Visita al dentista cada seis meses para
                limpiezas y revisiones.</div>
            <div class="p">• Evita el bruxismo: Si muerdes o aprietas los dientes, consulta a
                tu dentista sobre posibles soluciones.</div>

            <div class="p"><b>¡Cuida tu sonrisa con nosotros!.</b></div>

        </div>
    </div>
</section>
@endsection

@section('componentes')

<?php 
    if(Auth::user()){
        if (Auth::user()->hasRole('paciente')) { ?>
        <a class="nav-link collapsed" style="text-align: center" href="#quienesSomos" aria-expanded="true">
            <span>QUIÉNES SOMOS</span>
        </a>
        <a class="nav-link collapsed" style="text-align: center" href="#mision_vision" aria-expanded="true">
            <span>MISION Y VISION</span>
        </a>
        <a class="nav-link collapsed" style="text-align: center" href="#contacto_cuidados" aria-expanded="true">
            <span>CONTACTO Y CUIDADOS</span>
        </a>
        <a class="nav-link collapsed" style="text-align: center" href="{{ url('citas')}}" aria-expanded="true">
            <span>CITAS</span>
        </a>
        <a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true" >
            <span>AGENDA</span>
        </a>

<?php } elseif (Auth::user()->hasRole('doctor')) { ?>

    <!-- @if (Auth::user()->getEspeciality())
        <b><p style="margin:0; padding-right: 40px;">Especialidad: {{ Auth::user()->getEspeciality()->description}}</p></b>
        @else
        <b><p style="margin:0; padding-right: 40px;">No tiene una especialidad asignada.</p></b>
    @endif -->

    <a class="nav-link collapsed" style="text-align: center" href="#quienesSomos" aria-expanded="true">
        <span>QUIÉNES SOMOS</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="#mision_vision" aria-expanded="true">
        <span>MISION Y VISION</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="#contacto_cuidados" aria-expanded="true">
        <span>CONTACTO Y CUIDADOS</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{url('especialidad')}}" aria-expanded="true">
        <span>ESPECIALIDAD</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{ url('citas')}}" aria-expanded="true">
        <span>CITAS</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true" >
        <span>AGENDA</span>
    </a>

<?php } elseif (Auth::user()->hasRole('admin')) { ?>
    <a class="nav-link collapsed" style="text-align: center" href="{{url('showCrearUsuario')}}" aria-expanded="true">
        <span>CREAR USUARIO</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{url('especialidades')}}" aria-expanded="true">
        <span>ESPECIALIDADES</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{url('roles')}}" aria-expanded="true">
        <span>ROLES</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{url('pacientes')}}" aria-expanded="true">
        <span>PACIENTES</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{url('doctores')}}" aria-expanded="true">
        <span>DOCTORES</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{ url('citasAdmin')}}" aria-expanded="true">
        <span>CITAS</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true" >
        <span>AGENDA</span>
    </a>

<?php }
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