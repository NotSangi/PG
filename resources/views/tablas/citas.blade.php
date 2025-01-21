@extends('layout.table')

@section('titulo')
CITAS 
@endSection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
@endsection

@section('tabla')
<thead>
    <tr style="text-align: center;">
        <th>ID CITA</th>
        <th>PACIENTE</th>
        <th>NÚMERO CELULAR</th>
        <th>EMAIL</th>
        <th>TRATAMIENTO</th>
        <th>DOCTOR ASIGNADO</th>
        <th>PRIORIDAD</th>
        <th>ESTADO</th>
        <th>FECHA</th>
        <th>HISTORIA</th>
    </tr>
</thead>
<tbody>
    
    @forelse($citas as $cita)
    <tr style="text-align: center;">
        <td>{{ $cita->id}}</td>
        <td>{{ $cita->name}} {{$cita->last_name}}</td>
        <td>{{ $cita->tel}}</td>
        <td>{{ $cita->email}}</td>
        <?php
        $tratamiento = DB::table('tratamientos')->where('name', $cita->tratamiento)->value('description');
        ?>

        <td>{{ $tratamiento}}</td>
            
            @if($cita->doctor_id != null)
            <?php
                $doctor = DB::table('users')->find($cita->doctor_id); 
                ?>
                <td>{{ $doctor->name }} {{$doctor->last_name}}</td> 
            @else
                <td> No hay un doctor asignado</td>
            @endif

        <td>{{ $cita->prioridad}}</td>
        <td>{{ $cita->estado}}</td>
        <td>{{ $cita->fecha}}</td>
        <td>
            @if ($cita->estado == "COMPLETADA")
                <button data-bs-toggle="modal" data-bs-target="#modal-{{ $cita->id }}" class="boton-historia">Ver</button>
            @endif  
        </td>
    </tr>

    <div class="modal fade" id="modal-{{ $cita->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-admin">
                <div>HISTORIA</div>
                <hr style="border-top: 2px solid #ffff;">
                <div>
                    {{ $cita->descripcion }}
                </div>
            </div>
        </div>
    </div>
    @empty
        <tr>
            <td>No tienes citas</td>
        </tr>
    @endforelse 

    
</tbody>



@endSection

@section('componentes')
<?php 
    if(Auth::user()){
        if (Auth::user()->hasRole('paciente')) { ?>
        <a class="nav-link collapsed" style="text-align: center" href="{{ url('citas')}}" aria-expanded="true">
            <span>CITAS</span>
        </a>
        <a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true" >
            <span>AGENDA</span>
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
    <a class="nav-link collapsed" style="text-align: center" href="{{ url('citas')}}" aria-expanded="true">
        <span>CITAS</span>
    </a>
    <a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true" >
        <span>AGENDA</span>
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