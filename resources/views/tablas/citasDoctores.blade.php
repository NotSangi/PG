@extends('layout.table')

@section('usuario')
{{ Auth::user()->name }}
@endSection

@section('titulo')
CITAS
@endSection

@section('tabla')
<thead>
    <tr>
        <th>ID CITA</th>
        <th>TITULO</th>
        <th>PACIENTE</th>
        <th>CITA REQUERIDA</th>
        <th>DOCTOR</th>
        <th>DESCRIPCION</th>
        <th>FECHA</th>
        <th>HORA</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID CITA</th>
        <th>TITULO</th>
        <th>PACIENTE</th>
        <th>CITA REQUERIDA</th>
        <th>DOCTOR</th>
        <th>DESCRIPCION</th>
        <th>FECHA</th>
        <th>HORA</th>
    </tr>
</tfoot>
<tbody>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id}}</td>
        <td>{{ $user->title }}</td>
        <td>{{ $user->user->name }}</td>
        <?php
            $tipo_cita = DB::table('especialidads')->where('id', $user->selector)->value('description');
        ?>
        <td>{{$tipo_cita}}</td>
        <?php
            $doctor = DB::table('users')->where('id', $user->doctor_id)->value('name');
        ?>
        <td>{{$doctor}}</td>
        <td>{{ $user->descripcion }}</td>
        <td>{{ $user->start }}</td>
        <td>{{ $user->hora_cita }}</td>
    </tr>
    @endforeach
</tbody>
@endSection

@section('componentes')
<a class="nav-link collapsed" style="text-align: center" href="{{url('especialidad')}}" aria-expanded="true" >
    <span>ESPECIALIDAD</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{ url('citasDoctores')}}" aria-expanded="true" >
    <span>CITAS</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true" >
    <span>AGENDA</span>
</a>
@endsection