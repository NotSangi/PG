@extends('layout.table')

@section('usuario')
{{ Auth::user()->name }}
@endSection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
@endsection

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
        <th>PRIORIDAD</th>
        <th>ESTADO</th>
        <th>FECHA</th>
    </tr>
</thead>

{!!Form::open(array('url' => 'citas_update', 'method' => 'POST', 'autocomplete' => 'off'))!!}
{{Form::token()}}

<tbody>
    <?php if (is_null($citas)) { ?>
    No tienes citas
    <?php } else { ?>
    @foreach($citas as $cita)
        <tr style="text-align: center;">
            <td>{{ $cita->id}}</td>
            <td>{{ $cita->name}} {{$cita->last_name}}</td>
            <td>{{ $cita->tel}}</td>
            <td>{{ $cita->email}}</td>

            <?php
            $tratamiento = DB::table('tratamientos')->where('name', $cita->tratamiento)->value('description');
            ?>

            <td>{{$tratamiento}}</td>
            <td>
                <select name="doctor[{{ $cita->id }}]"
                    style="width: 100%; border: 0.5px solid grey; border-radius: 0.5rem; color: grey;">
                    <option value="" disabled {{ is_null($cita->doctor_id) ? 'selected' : '' }}>Selecciona un doctor
                    </option>
                    @foreach($doctores as $doctor)
                            <?php
                        $idEspecialidad = DB::table('especialidad_users')->where('user_id', $doctor->id)->value('especialidad_id');
                        $especialidad = DB::table('especialidads')->where('id', $idEspecialidad)->value('name');
                        if ($especialidad == $cita->tratamiento) {
                                ?>
                            <option value="{{ $doctor->id }}" {{ $cita->doctor_id == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }} {{$doctor->last_name}}</option>
                            <?php
                        }
                                ?>
                    @endforeach
                </select>
            </td>
            <td>{{ $cita->prioridad}}</td>
            <td>
                <select name="estado[{{ $cita->id }}]"
                    style="width: 100%; border: 0.5px solid grey; border-radius: 0.5rem; color: grey;">
                    <?php        if (!empty($cita->estado)) { ?>
                    <option value="{{$cita->estado}}">{{ $cita->estado}}</option>
                    <?php        } else { ?>
                    <option value="" disabled selected></option>
                    <?php        } ?>
                    <option value="PENDIENTE" {{ $cita->estado == 'PENDIENTE'}}>PENDIENTE</option>
                    <option value="ASIGNADA" {{ $cita->estado == 'ASIGNADA'}}>ASIGNADA</option>
                </select>
            </td>
            <td>
                <input type="dateTime-local" name="fecha[{{ $cita->id }}]" value="{{$cita->fecha}}">
            </td>
        </tr>
    @endforeach

    <?php } ?>
</tbody>
<button type="submit" class="btn-actualizar" data-bs-toggle="modal" data-bs-target="#exampleModal">Actualizar</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-admin">
            <div>
                Se ha actualizado correctamente.
            </div>
        </div>
    </div>
</div>

{{Form::close()}}


@endSection

@section('componentes')
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
<a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true">
    <span>AGENDA</span>
</a>

@endsection