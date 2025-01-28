@extends('layout.principal')

@section('info')
<section class="seccion-1">
    <div class="roles-container">
        <div class="roles-column">
            <a class="link-roles" href="{{url("register?role=afiliado")}}">
                <img class="img-paciente-rol" src="img/PACIENTE.png" alt="">
                <h2 style="margin-right: 85px;">AFILIADO</h2>
            </a>
        </div>
        <div class="roles-column">
            <a class="link-roles" href="{{url("register?role=empleado")}}">
                <img class="img-doctor-rol" src="img/DOCTOR.png" alt="">
                <h2 style="margin-top: 30px;">DOCTOR</h2>
            </a>
        </div>
    </div>
</section>
@endsection