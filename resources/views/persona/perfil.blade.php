<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MI PERFIL</title>

    <!-- Custom fonts for this template-->

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/styles-general.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    {!!Form::open(array('route' => 'perfil.actualizar', 'method' => 'patch', 'autocomplete' => 'off'))!!}
    {{Form::token()}}
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5" style="margin-top: 100px">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block">
                        <div class="div-imagen">
                            <img class="imagen-perfil" <?php  
                                    if (Auth::user()->hasRole("paciente")) {
    $imagen = "img/PACIENTE.png";
} elseif (Auth::user()->hasRole("doctor")) {
    $imagen = "img/DOCTOR.png";
} elseif (Auth::user()->hasRole("admin")) {
    $imagen = "img/ADMIN.png";
}                   
                                ?> src={{$imagen}}>
                        </div>
                        <div class="texto-perfil">

                            <?php
if (Auth::user()->hasRole("paciente")) {
    $texto = "PACIENTE";
} elseif (Auth::user()->hasRole("doctor")) {
    $texto = "DOCTOR";
} elseif (Auth::user()->hasRole("admin")) {
    $texto = "ADMINISTRADOR";
}                   
                            ?>

                            <h2>{{$texto}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"> PERFIL</h1>
                            </div>
                            <form action="{{route('perfil.perfil') }}" method="POST" class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user" id="name"
                                            placeholder="Nombres" value="{{$user->name}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="last_name" class="form-control form-control-user"
                                            id="last_name" placeholder="Apellidos" value="{{$user->last_name}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="document" class="form-control form-control-user"
                                            id="document" placeholder="Numero documento de identidad"
                                            value="{{$user->document}}">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="adress" class="form-control form-control-user"
                                            id="adress" placeholder="Dirección" value="{{$user->adress}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        id="email" placeholder="Ingresa tu correo" value="{{$user->email}}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="tel" class="form-control form-control-user" id="tel"
                                        placeholder="Ingresa tu número telefonico" value="{{$user->tel}}">
                                </div>

                                <button class="btn btn-primary btn-user btn-block" type="submit">
                                    <span class="glyphicon glyphicon-ok"></span> ACTUALIZAR DATOS
                                </button>

                                <hr>
                                <div style="display: flex; justify-content: space-between; align-items: center; height: 28px;">
                                    <a href="{{url('minuevasonrisa')}}">
                                        VOLVER
                                    </a>
                                    <div>
                                        @if ($errors->has('completar_formulario'))
                                            <div class="alert alert-danger">
                                                {{ $errors->first('completar_formulario') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{Form::close()}}



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>