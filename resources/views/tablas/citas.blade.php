@extends('layout.table')

@section('titulo')
CITAS
@endSection

@section('tabla')
<thead>
    <tr style="text-align: center;">
        <th>ID CITA</th>
        <th>PACIENTE</th>
        <th>NÚMERO CELULAR</th>
        <th>EMAIL</th>
        <th>TRATAMIENTO</th>
        <th>DOCTOR ASIGNADO</th>
        <th>LLAMADA</th>
        <th>ESTADO</th>
        <th>FECHA</th>
    </tr>
</thead>
<tfoot>
    <tr style="text-align: center;">
        <th>ID CITA</th>
        <th>PACIENTE</th>
        <th>NÚMERO CELULAR</th>
        <th>EMAIL</th>
        <th>TRATAMIENTO</th>
        <th>DOCTOR ASIGNADO</th>
        <th>LLAMADA</th>
        <th>ESTADO</th>
        <th>FECHA</th>
    </tr>
</tfoot>
<tbody>
    <?php if(is_null($citas)){ ?>
        No tienes citas
    <?php } else { ?>
    @foreach($citas as $cita)
    <tr style="text-align: center;">
        <td>{{ $cita->id}}</td>
        <td>{{ $cita->name && $cita->last_name}}</td>
        <td>{{ $cita->tel}}</td>
        <td>{{ $cita->email}}</td>
        <td>{{ $cita->tratamiento}}</td>
        <?php
            $doctor = DB::table('users')->where('id', $cita->doctor_id)->value('name');
        ?>
        <td>{{ $doctor }}</td>
        <td>{{ $cita->llamada}}</td>
        <td>{{ $cita->estado}}</td>
        <td>{{ $cita->fecha}}</td>
    </tr>
    @endforeach
        
    <?php } ?>
</tbody>
@endSection

@section('componentes')
<?php 
    if(Auth::user()){
        if (Auth::user()->hasRole('paciente')) { ?>

        <a class="nav-link collapsed" style="text-align: center" href="{{ url('citas')}}" aria-expanded="true">
            <span>CITAS</span>
        </a>

<?php } elseif (Auth::user()->hasRole('doctor')) { ?>

    @if (Auth::user()->getEspeciality())
        <b><p style="margin:0; padding-right: 40px;">Especialidad: {{ Auth::user()->getEspeciality()->description}}</p></b>
        @else
        <b><p style="margin:0; padding-right: 40px;">No tiene una especialidad asignada.</p></b>
    @endif

    <a class="nav-link collapsed" style="text-align: center" href="{{url('especialidad')}}" aria-expanded="true">
        <span>ESPECIALIDAD</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{url('/evento')}}" aria-expanded="true">
        <span>AGENDA</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{ url('citas')}}" aria-expanded="true">
        <span>CITAS</span>
    </a>

<?php } elseif (Auth::user()->hasRole('admin')) { ?>

    <a class="nav-link collapsed" style="text-align: center" href="{{url('pacientes')}}" aria-expanded="true">
        <span>PACIENTES</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{url('doctores')}}" aria-expanded="true">
        <span>DOCTORES</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{ url('citasAdmin')}}" aria-expanded="true">
        <span>CITAS</span>
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