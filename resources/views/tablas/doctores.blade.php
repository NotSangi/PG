@extends('layout.table')

@section('titulo')
DOCTORES
@endSection


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
    </tr>
</thead>
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
    </tr>
    @endforeach
</tbody>
@endSection

@section('componentes')
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