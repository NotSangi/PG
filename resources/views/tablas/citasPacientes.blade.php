@extends('layout.table')

@section('titulo')
CITAS
@endSection

@section('tabla')
<thead>
    <tr>
        <th>ID CITA</th>
        <th>PACIENTE</th>
        <th>NÚMERO CELULAR</th>
        <th>EMAIL</th>
        <th>TRATAMIENTO</th>
        <th>LLAMADA</th>
        <th>ESTADO</th>
        <th>FECHA</th>
    </tr>
</thead>
<tfoot>
    <tr>
        <th>ID CITA</th>
        <th>PACIENTE</th>
        <th>NÚMERO CELULAR</th>
        <th>EMAIL</th>
        <th>TRATAMIENTO</th>
        <th>LLAMADA</th>
        <th>ESTADO</th>
        <th>FECHA</th>
    </tr>
</tfoot>
<tbody>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id}}</td>
        <td>{{ $user->name && $user->last_name}}</td>
        <td>{{ $user->tel}}</td>
        <td>{{ $user->email}}</td>
        <td>{{ $user->tratamiento}}</td>
        <td>{{ $user->llamada}}</td>
        <td>{{ $user->estado}}</td>
        <td>{{ $user->fecha}}</td>
    </tr>
    @endforeach
</tbody>
@endSection

@section('componentes')
<a class="nav-link collapsed" style="text-align: center" href="{{ url('citasPacientes')}}" aria-expanded="true" >
    <span>CITAS</span>
</a>

@endsection