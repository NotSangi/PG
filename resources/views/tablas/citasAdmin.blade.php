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
    @foreach($citas as $cita)
    <tr>
        <td>{{ $cita->id}}</td>
        <td>{{ $cita->title }}</td>
        <?php
            $paciente = DB::table('users')->where('id', $cita->user_id)->value('name');
        ?>
        <td>{{$paciente}}</td>
        <?php
            $tipo_cita = DB::table('especialidads')->where('id', $cita->selector)->value('description');
        ?>
        <td>{{$tipo_cita}}</td>
        <?php
            $doctor = DB::table('users')->where('id', $cita->doctor_id)->value('name');
        ?>
        <td>{{$doctor}}</td>
        <td>{{ $cita->descripcion }}</td>
        <td>{{ $cita->start }}</td>
        <td>{{ $cita->hora_cita }}</td>
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

@endsection