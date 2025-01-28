@extends('layout.table')

@section('titulo')
DOCTORES
@endSection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
@endsection

@section('usuario')
{{ Auth::user()->name }}
@endSection

@section('tabla')
<thead>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>APELLIDOS</th>
        <th>DOCUMENTO</th>
        <th>DIRECCION</th>
        <th>CORREO</th>
        <th>TELEFONO</th>
        <th>ESPECIALIDAD</th>
        <th>ESTADO</th>
    </tr>
</thead>

{!!Form::open(array('url' => 'updateEstado', 'method' => 'POST', 'autocomplete' => 'off'))!!}
{{Form::token()}}

<tbody>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->last_name }}</td>
        <td>{{ $user->document }}</td>
        <td>{{ $user->adress }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->tel }}</td>

        <?php
        $idEspecialidad = DB::table('especialidad_users')->where('user_id', $user->id)->value('especialidad_id');
        $especialidad = DB::table('especialidads')->where('id', $idEspecialidad)->value('description');
        ?>
        <td>{{$especialidad}}</td>
        <td>
            <select name="estado[{{ $user->id }}]" style="width: 100%; border: 0.5px solid grey; border-radius: 0.5rem; color: grey;">
                <?php        if (($user->estado) == 1) { ?>
                    <option selected disabled value="{{$user->estado}}">ACTIVO</option>
                <?php        } else{ ?>
                    <option selected disabled value="{{$user->estado}}">INACTIVO</option>
                <?php        } ?>
                    <option value="1">ACTIVO</option>
                    <option value="0">INACTIVO</option>
            </select>
        </td>
    </tr>
    @endforeach
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
<a class="nav-link collapsed" style="text-align: center" href="{{url('register')}}" aria-expanded="true">
    <span>CREAR USUARIO</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{url('especialidades')}}" aria-expanded="true">
    <span>ESPECIALIDADES</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{url('roles')}}" aria-expanded="true">
    <span>ROLES</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{url('pacientes')}}" aria-expanded="true" >
    <span>PACIENTES</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{url('doctores')}}" aria-expanded="true" >
    <span>DOCTORES</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{ url('citasAdmin')}}" aria-expanded="true" >
    <span>CITAS</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true" >
    <span>AGENDA</span>
</a>

@endsection