@extends('layout.table')

@section('usuario')
{{ Auth::user()->name }}
@endSection


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
        <td>{{ $cita->name}} {{$cita->last_name}}</td>
        <td>{{ $cita->tel}}</td>
        <td>{{ $cita->email}}</td>
        <td>{{ $cita->tratamiento}}</td>
        <td>
            <select name="doctor" style="width: 100%; border: 0.5px solid grey; border-radius: 0.5rem; color: grey;">
                @foreach($doctores as $doctor)
                    <option value="{{ $doctor->id }}" {{ $cita->doctor_id == $doctor->id}}>{{ $doctor->name }} {{$doctor->last_name}}</option>
                @endforeach
            </select>
        </td>
        <td>{{ $cita->llamada}}</td>
        <td>
            <select name="estado" style="width: 100%; border: 0.5px solid grey; border-radius: 0.5rem; color: grey;">
                <option value="{{$cita->estado}}" disabled selected>{{ $cita->estado}}</option>
                <option value="PENDIENTE" {{ $cita->estado == 'PENDIENTE'}}>PENDIENTE</option>
                <option value="ASIGNADA" {{ $cita->estado == 'ASIGNADA'}}>ASIGNADA</option>
            </select>
        </td>
        <td>
            <input type="dateTime-local" value="{{$cita->fecha}}">
        </td>
    </tr>
    @endforeach
        
    <?php } ?>
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