import { Calendar } from "@fullcalendar/core";
import LocaleEs from "@fullcalendar/core/locales/es";

window.onload = () => {

  let formulario = document.querySelector("#formularioEventos");

  var calendarEl = document.getElementById('agenda');

  var calendar = new FullCalendar.Calendar(calendarEl, {

    initialView: 'dayGridMonth',
    locale: LocaleEs,

    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,listWeek',
    },

    dateClick: function (info) {
     
      formulario.reset();
      formulario.start.value = info.dateStr;
      var a = formulario.start.value;
      const fec = a;

      var fechaActual = new Date()
      var fechaActualModificada = fechaActual.getFullYear() + '-' + (fechaActual.getMonth() + 1) + '-' + fechaActual.getDate();

      var numDia = new Date(fec).getDay();
      
      
      if((fec <= fechaActualModificada)){
        alert("Este día ya pasó")
      }else if ((numDia == "6")){
        alert("No hay atencion los dias Domingos")
      }else if((numDia == "1" || numDia == "2" || numDia == "3" || numDia == "4" || numDia == "5" || numDia == "6" )){
          $("#evento").modal("show")
      };

    },

    /*dayRender: function(info)
    {
      var today = moment();
      console.log(today);
        // Comparar la fecha actual con la fecha del día que se está renderizando
      if (date.isBefore(today, 'day')) {
        // Aplicar el estilo para los días pasados
        cell.css('background', 'red')
      }
    },*/

    dayRender: function(info) {                     
      var today = new Date();                     
      today.setHours(0, 0, 0, 0); 
      // Establecer la hora a medianoche para comparaciones de fecha                     
      if (info.date < today) {                         
        info.dayEl.style.backgroundColor = '#f5f5f5'; // Cambiar el color de fondo para fechas pasadas  
      }                 
    },

    eventClick: function (info) {
      var evento = info.event;
      console.log(evento);

      axios.post("http://localhost:8000/evento/editar/" + info.event.id)
        .then(respuesta => {

          formulario.id.value = respuesta.data.id;
          formulario.title.value = respuesta.data.title;
          formulario.user_id.value = respuesta.data.user_id;
          formulario.selector.value = respuesta.data.selector;
          formulario.doctor_id.value = respuesta.data.doctor_id;
          formulario.descripcion.value = respuesta.data.descripcion;
          formulario.start.value = respuesta.data.start;
          formulario.hora_cita.value = respuesta.data.hora_cita;
          formulario.color.value = respuesta.data.color;
          $("#evento").modal("show");
        }
        ).catch(error => {
          if (error.response) {
            console.log(error.response.data);
          }
        }
        )

    }

  });

  axios.get('http://localhost:8000/evento/mostrar')
    .then(({ data }) => {
      calendar.setOption('events', data);
    })
    .catch(error => {
      console.error(error);
    });

  calendar.render();

  document.getElementById("btnGuardar").onclick = function () {

    const datos = new FormData(formulario);

    axios.post("http://localhost:8000/evento/agregar", datos)
      .then(respuesta => {

        axios.get('http://localhost:8000/evento/mostrar')
          .then(({ data }) => {
            calendar.setOption('events', data);
          })
          .catch(error => {
            console.error(error);
          });


        //console.log(respuesta);
        $("#evento").modal("hide");
      }
      ).catch(error => {
        if (error.response) {
          console.log(error.response.data);
        }
      })
  };


  document.getElementById("btnEliminar").onclick = function () {

    const datos = new FormData(formulario);
    axios.post("http://localhost:8000/evento/borrar/"+formulario.id.value)
      .then(respuesta => {

        axios.get('http://localhost:8000/evento/mostrar')
          .then(({ data }) => {
            calendar.setOption('events', data);
          })
          .catch(error => {
            console.error(error);
          });


        //console.log(respuesta);
        $("#evento").modal("hide");
      }
      ).catch(error => {
        if (error.response) {
          console.log(error.response.data);
        }
      })

  }

  document.getElementById("btnModificar").onclick = function () {

    const datos = new FormData(formulario);

    axios.post("http://localhost:8000/evento/actualizar/"+formulario.id.value, datos)
      .then(respuesta => {

        axios.get('http://localhost:8000/evento/mostrar')
          .then(({ data }) => {
            calendar.setOption('events', data);
          })
          .catch(error => {
            console.error(error);
          });


        //console.log(respuesta);
        $("#evento").modal("hide");
      }
      ).catch(error => {
        if (error.response) {
          console.log(error.response.data);
        }
      })

  }



};