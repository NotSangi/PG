@extends('layouts.app')

@section('script')
<script>
function cambiarElementos(){
  const categoriaSelect = document.getElementById('selector');
  const elementoSelect = document.getElementById('doctor');
  categoriaSelect.addEventListener('change', function () {
    const selectedCategoria = categoriaSelect.value;
                      
    // Limpiar el segundo select
    elementoSelect.innerHTML = '<option value="">Selecciona un elemento</option>';

    // Filtrar y agregar opciones al segundo select
    if (selectedCategoria) {
      const elementos = document.querySelectorAll('#doctor option');
      elementos.forEach(function (doctor) {
        if (doctor.getAttribute('data-categoria') === selectedCategoria) {
          elementoSelect.appendChild(doctor.cloneNode(true));
        }
      });
    }
  });
}
</script>
@endsection

@section('content')

<div class="container">
  <div id="agenda"></div>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="evento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">CITA MEDICA</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="" id="formularioEventos">

            {!! csrf_field() !!}

            <input class="form-control form-control-lg" name="id" id="id" type="hidden" placeholder="" aria-label=".form-control-lg example">

            <label for="title">Titulo.</label>
            <input class="form-control form-control-lg" name="title" id="title" type="text" placeholder="Nombre del evento." aria-label=".form-control-lg example">

            <input class="form-control form-control-lg" name="user_id" id="user_id" value="{{Auth::user()->id}}"type="hidden" placeholder="" aria-label=".form-control-lg example">

            <label for="selector">Cita de:</label>
            <select name="selector" class="form-select" id="selector" aria-label="Default select example">
                <option value="" disabled selected>Selecciona una categoría</option>
                @foreach ($especialidad as $espe)
                  <option value="{{ $espe->id }}">{{ $espe->description }}</option>
                @endforeach
            </select>

            <label for="doctor_id">Doctores:</label>
            <select name="doctor_id" class="form-select" id="doctor_id" aria-label="Default select example"  onchange="cambiarElementos()">
              <option value="" disabled selected>Selecciona un elemento</option>
              @foreach ($usuario as $user)
              <option value="{{ $user->id }}" data-categoria="{{ $user->especialidad_id }}">{{ $user->name }} {{$user->last_name}}</option>
              @endforeach
            </select>

            <label for="descripcion">Descripción de cita:</label>
            <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Por favor, ingrese una descripción."></textarea> 


            <label for="start">Fecha:</label>
            <input class="form-control form-control-lg" name="start" id="start" type="date" placeholder="" aria-label=".form-control-lg example">


            <label for="hora_cita">Hora de cita:</label>
            <input class="form-control form-control-lg" name="hora_cita" id="hora_cita" type="time" placeholder="" aria-label=".form-control-lg example">
            
            
            <label for="color" class="form-label">Selecciona un color para el evento.</label>
            <input type="color" class="form-control form-control-lg" name="color" id="color"  title="Choose your color">
              
          </form>

        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
            <button type="button" class="btn btn-success" id="btnModificar">Modificar</button>
            <button type="button" class="btn btn-primary" id="btnGuardar">Guardar</button>
          
        </div>
      </div>
    </div>


@endsection