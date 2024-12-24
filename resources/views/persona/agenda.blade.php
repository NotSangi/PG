@extends('layout.principal')

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Información de la cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrar"></button>
            </div>
            <div class="modal-body">
                <p><strong>Fecha:</strong> <span id="modalStart"></span></p>
                <p><strong>Doctor:</strong> <span id="modalDoctor"></span></p>
                <p><strong>Tratamiento:</strong> <span id="modalTratamiento"></span></p>
                <p><strong>Estado:</strong> <span id="modalEstado"></span></p>

                <?php
                if (Auth::user()->hasRole('doctor')){
                ?>
                    <p><strong>Descripción Cita:</strong></span></p>
                    <textarea class="input-cita" placeholder="Descripción" aria-label="default input example"
                    name="descripcion" id="modalDescripcion"></textarea>
                <?php
                }
                ?>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><span id="botonFooter"></button>
            </div>
        </div>
    </div>
</div>

@section('scripts')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var doctorSelect = document.getElementById('doctor-seleccionado');
        // var doctorId = document.getElementById('doctor-seleccionado').addEventListener('change', function() {
        // var doctorId = this.value;
        // console.log(doctorId)
        // });

        var calendarEl = document.getElementById('calendar');
        var url = '/appointments/events';
 
        
        
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            headerToolbar: {
                left: 'prev,next,today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listWeek'
            },
            events: url,
            

            eventClick: function (info) {
                info.jsEvent.preventDefault();

                let modalTitle = info.event.title;
                let modalStart = info.event.start.toLocaleString();
                let modalDoctor = info.event.extendedProps.doctor.toLocaleString();
                let modalTratamiento = info.event.extendedProps.tratamiento.toLocaleString();
                let modalEstado = info.event.extendedProps.estado.toLocaleString();
                let modalEnd = info.event.end ? info.event.end.toLocaleString() : 'No especificado';

                document.getElementById('modalTitle').innerText = modalTitle;
                document.getElementById('modalStart').innerText = modalStart;
                document.getElementById('modalDoctor').innerText = modalDoctor;
                document.getElementById('modalTratamiento').innerText = modalTratamiento;
                document.getElementById('modalEstado').innerText = modalEstado;

                <?php
                if (Auth::user()->hasRole('paciente')){
                ?>

                if (modalEstado == "ASIGNADA") {
                    boton = "CANCELAR CITA"
                } else {
                    boton = "CERRAR"
                }

                <?php } else if (Auth::user()->hasRole('doctor')){
                ?>

                if (modalEstado == "ASIGNADA") {
                    boton = "FINALIZAR CITA"
                } else {
                    boton = "CERRAR"
                }

                if (modalEstado == "COMPLETADA"){
                    let modalDescripcion = info.event.extendedProps.descripcion.toLocaleString();
                    document.getElementById('modalDescripcion').innerText = modalDescripcion;
                    document.getElementById('modalDescripcion').readOnly = true;
                }

                <?php } else {
                
                ?>
                boton = "CERRAR"
                <?php }?>

                document.getElementById('botonFooter').innerText = boton;

                // Muestra el modal
                var modal = new bootstrap.Modal(document.getElementById('eventModal'));
                modal.show();

                document.getElementById('cerrar').addEventListener('click', function () {
                    modal.hide();
                });

                document.getElementById('botonFooter').addEventListener('click', function () {
                    if (boton == "CANCELAR CITA") {
                        let citaId = info.event.id;

                        fetch('/cancel', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ citaId: citaId })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    modal.hide();
                                    window.location.reload();
                                } else if (data.error) {
                                }
                            })
                        .catch(error => {

                        });
                    } else if (boton == "FINALIZAR CITA"){
                        let citaId = info.event.id;

                        fetch('/finalizar', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ citaId: citaId, descripcion: document.getElementById('modalDescripcion').value})
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    modal.hide();
                                    window.location.reload();
                                } else if (data.error) {
                                }
                            })
                        .catch(error => {

                        });
                    } else {
                        modal.hide();
                    }
                });
            }
        });
        calendar.render();
        
        doctorSelect.addEventListener('change', function () {
                var doctorId = this.value;
                var url = doctorId ? '/appointments/events?doctor_id=' + doctorId : '/appointments/events';

                // Re-render the calendar with filtered events
                calendar.destroy(); // Destroy the existing calendar instance
                calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    locale: 'es',
                    headerToolbar: {
                        left: 'prev,next,today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,listWeek'
                    },
                    events: url,

                    eventClick: function (info) {
                info.jsEvent.preventDefault();

                let modalTitle = info.event.title;
                let modalStart = info.event.start.toLocaleString();
                let modalDoctor = info.event.extendedProps.doctor.toLocaleString();
                let modalTratamiento = info.event.extendedProps.tratamiento.toLocaleString();
                let modalEstado = info.event.extendedProps.estado.toLocaleString();
                let modalEnd = info.event.end ? info.event.end.toLocaleString() : 'No especificado';

                document.getElementById('modalTitle').innerText = modalTitle;
                document.getElementById('modalStart').innerText = modalStart;
                document.getElementById('modalDoctor').innerText = modalDoctor;
                document.getElementById('modalTratamiento').innerText = modalTratamiento;
                document.getElementById('modalEstado').innerText = modalEstado;

                <?php
                if (Auth::user()->hasRole('paciente')){
                ?>

                if (modalEstado == "ASIGNADA") {
                    boton = "CANCELAR CITA"
                } else {
                    boton = "CERRAR"
                }

                <?php } else if (Auth::user()->hasRole('doctor')){
                ?>

                if (modalEstado == "ASIGNADA") {
                    boton = "FINALIZAR CITA"
                } else {
                    boton = "CERRAR"
                }

                if (modalEstado == "COMPLETADA"){
                    let modalDescripcion = info.event.extendedProps.descripcion.toLocaleString();
                    document.getElementById('modalDescripcion').innerText = modalDescripcion;
                    document.getElementById('modalDescripcion').readOnly = true;
                }

                <?php } else {
                
                ?>
                boton = "CERRAR"
                <?php }?>

                document.getElementById('botonFooter').innerText = boton;

                // Muestra el modal
                var modal = new bootstrap.Modal(document.getElementById('eventModal'));
                modal.show();

                document.getElementById('cerrar').addEventListener('click', function () {
                    modal.hide();
                });

                document.getElementById('botonFooter').addEventListener('click', function () {
                    if (boton == "CANCELAR CITA") {
                        let citaId = info.event.id;

                        fetch('/cancel', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ citaId: citaId })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    modal.hide();
                                    window.location.reload();
                                } else if (data.error) {
                                }
                            })
                        .catch(error => {

                        });
                    } else if (boton == "FINALIZAR CITA"){
                        let citaId = info.event.id;

                        fetch('/finalizar', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ citaId: citaId, descripcion: document.getElementById('modalDescripcion').value})
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    modal.hide();
                                    window.location.reload();
                                } else if (data.error) {
                                }
                            })
                        .catch(error => {

                        });
                    } else {
                        modal.hide();
                    }
                });
            }
                });

            calendar.render();
        });
        
    });

</script>

@endsection

@section('info')
<section class="agenda">
    <?php if(Auth::user()->hasRole('admin')){?>
    <div class="select-doctor">
        <select id="doctor-seleccionado" class="form-select mb-3">
        <option value="">Seleccionar Doctor</option>
        @foreach ($doctores as $doctor)
            <option value="{{ $doctor->id }}">{{ $doctor->name }} {{ $doctor->last_name }}</option>
        @endforeach
        </select>
    </div>
    <?php }?>
    <div id="calendar"></div>
</section>

@endsection


@section('componentes')

<?php
    if (Auth::user()) {
    if (Auth::user()->hasRole('paciente')) { ?>

<a class="nav-link collapsed" style="text-align: center" href="{{ url('citas')}}" aria-expanded="true">
    <span>CITAS</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true">
    <span>AGENDA</span>
</a>

<?php    } elseif (Auth::user()->hasRole('doctor')) { ?>

@if (Auth::user()->getEspeciality())
    <b>
        <p style="margin:0; padding-right: 40px;">Especialidad: {{ Auth::user()->getEspeciality()->description}}</p>
    </b>
@else
    <b>
        <p style="margin:0; padding-right: 40px;">No tiene una especialidad asignada.</p>
    </b>
@endif
<a class="nav-link collapsed" style="text-align: center" href="{{url('especialidad')}}" aria-expanded="true">
    <span>ESPECIALIDAD</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{ url('citas')}}" aria-expanded="true">
    <span>CITAS</span>
</a>
<a class="nav-link collapsed" style="text-align: center" href="{{ url('agenda')}}" aria-expanded="true">
    <span>AGENDA</span>
</a>

<?php    } elseif (Auth::user()->hasRole('admin')) { ?>
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

<?php    }
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

@section('user')
<li class="nav-item dropdown no-arrow">

    <?php
if (Auth::user()) {

    ?>
<li class="nav-item dropdown no-arrow">

    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>

        <?php
    if (Auth::user()->hasRole('admin')) {
        echo '<img class="img-profile rounded-circle" src="img/ADMIN.png">';

    } elseif (Auth::user()->hasRole('paciente')) {
        echo '<img class="img-profile rounded-circle" src="img/PACIENTE.png">';
    } elseif (Auth::user()->hasRole('doctor')) {
        echo ' <img class="img-profile rounded-circle" src="img/DOCTOR.png">';
    }
        ?>

    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{ url('perfil') }}">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            Perfil
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
<?php
} else {
?>


<a class="nav-i-r" href="{{url(path: 'login')}}" id="userDropdown" role="button" aria-haspopup="true"
    aria-expanded="false">
    <span class="d-none d-lg-inline text-gray-600 small" style="font-size: 15px">INICIO SESION</span>
</a>
<a class="nav-i-r" href="{{url('register')}}" id="userDropdown" role="button" aria-haspopup="true"
    aria-expanded="false">
    <span class="d-none d-lg-inline text-gray-600 small" style="font-size: 15px; margin: 0 40px 0 20px">REGISTRO</span>
</a>

</li>

<?php
}
?>

@endSection