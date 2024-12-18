@extends('layout.principal')

@section('user')
<li class="nav-item dropdown no-arrow">

    <a class="nav-i-r" href="{{url(path: 'login')}}" id="userDropdown" role="button" aria-haspopup="true"
        aria-expanded="false">
        <span class="d-none d-lg-inline text-gray-600 small" style="font-size: 15px">INICIO SESION</span>
    </a>
    <a class="nav-i-r" href="{{url('register')}}" id="userDropdown" role="button" aria-haspopup="true"
        aria-expanded="false">
        <span class="d-none d-lg-inline text-gray-600 small"
            style="font-size: 15px; margin: 0 40px 0 20px">REGISTRO</span>
    </a>

</li>
@endsection

@section('info')
<section class="seccion-trat-datos">
    <div class="tt-btn">
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
                <br><br>
                Si usted desea conocer (de manera gratuita), actualizar, rectificar (datos inexactos, incompletos,
                fraccionados que induzcan al error) o suprimir los datos que nos ha suministrado, envíe un correo
                electrónico al correo datospersonales@fvl.org.co donde se le dar trámite a su solicitud de conformidad
                con lo establecido por los artículos 14 y 15 de la Ley 1581 de 2012, 20 a 23 del Decreto 1377 de 2013 y
                demás normas vigentes.</p>
        </div>
        <button class="btn-aceptar" onclick="history.back()">Aceptar</button>
    </div>
</section>
@endsection