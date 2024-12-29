<link href="css/styles-general.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bungee&family=Oswald:wght@200..700&display=swap" rel="stylesheet">

<div class="mail-cont">
    <h1>¡Tu cita ha sido asignada!</h1>
    <div class="mail-user">
        <h4>Estimado/a</h4>
        <h2>{{ $cita->name }} {{ $cita->last_name }}</h2>
    </div>
    <div class="mail-fecha">
        <p>Te confirmamos que tu cita ha sido programada para el día</p>
        <?php

        use Carbon\Carbon;

        $fecha = Carbon::parse($cita->fecha)
        ?>
        <h4>{{ $fecha->format('d/m/y')}} a las {{ $fecha->format('h:i A')}}</h4>
    </div>
    <div class="mail-detalles">
        <h2>Detalles de la cita</h2>
        <h4>Doctor</h4>
        <h3>{{ $doc->name }} {{ $doc->last_name }}</h3>
        <h4>Tratamiento</h4>    
        <h3>{{ $tratamiento }}</h3>
    </div>
    <div  class="mail-footer">
        <p>Cualquier inquietud, no dudes en contactarnos</p>
        <p>Nueva Sonrisa</p>
        <div>
            <img src="img/Logo.png" alt="">
        </div>
    </div>
</div>