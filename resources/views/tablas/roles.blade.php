<?php
?>

@extends('layout.table')

@section('titulo')
ROLES
@endSection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
@endsection

@section('tabla')

{!!Form::open(array('url' => 'updateEstadoRol', 'method' => 'POST', 'autocomplete' => 'off'))!!}
{{Form::token()}}
<thead>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>ESTADO</th>
    </tr>
</thead>

<tbody>
    @foreach($roles as $rol)
        <tr>
            <td>{{ $rol->id }}</td>
            <td>{{ $rol->name }}</td>
            <td>{{ $rol->description }}</td>
            <td>
                <select name="estado[{{ $rol->id }}]"
                    style="width: 100%; border: 0.5px solid grey; border-radius: 0.5rem; color: grey;">
                    <?php    if (($rol->estado) == 1) { ?>
                    <option selected disabled value="{{$rol->estado}}">ACTIVO</option>
                    <?php    } else { ?>
                    <option selected disabled value="{{$rol->estado}}">INACTIVO</option>
                    <?php    } ?>
                    <option value="1">ACTIVO</option>
                    <option value="0">INACTIVO</option>
                </select>
            </td>
        </tr>
    @endforeach
</tbody>

<button type="submit" class="btn-actualizar" data-bs-toggle="modal"
    data-bs-target="#modalActualizar">Actualizar</button>

<div class="modal fade" id="modalActualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-admin">
            <div>
                Se ha actualizado correctamente.
            </div>
        </div>
    </div>
</div>
{{Form::close()}}

<button type="submit" class="btn-actualizar" data-bs-toggle="modal" data-bs-target="#modalCrear">Crear</button>



{!!Form::open(array('url' => 'crearRole', 'method' => 'POST', 'autocomplete' => 'off'))!!}
{{Form::token()}}
<div class="modal fade" id="modalCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalCrearLabel">Rol</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                    {{Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Descripción:</label>
                    {{Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) }}
                </div>
            </div>
            @if ($errors->has('completar_formulario'))
                <div class="alert alert-danger" style="position: absolute; margin-bottom: 60px; margin-left: 330px;">
                    {{ $errors->first('completar_formulario') }}
                </div>
            @endif
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="createRoleButton" disabled>Crear</button>
            </div>
        </div>
    </div>
</div>
{{Form::close()}}

<script>
    document.getElementById('name').addEventListener('input', enableCreateButton);
    document.getElementById('description').addEventListener('input', enableCreateButton);

    function enableCreateButton() {
        const nameInput = document.getElementById('name');
        const descriptionInput = document.getElementById('description');
        const createButton = document.getElementById('createRoleButton');

        if (nameInput.value.trim() !== '' && descriptionInput.value.trim() !== '') {
            createButton.disabled = false;
        } else {
            createButton.disabled = true;
        }
    }
</script>

@endSection

@section('usuario')
{{ Auth::user()->name }}
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