<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/styles-general.css" rel="stylesheet">

    <script>
        document.addEventListener('DOMContentLoaded', function ()  {
            var role = document.getElementById('role').value; 
            if (role == "afiliado") {
                $('#verificacion').hide(); 
            } else if (role == "empleado") {
                $('#verificacion').show(); 
            }
        });
    </script>

</head>

<body class="bg-gradient-primary" style="overflow: hidden">
    {!!Form::open(array('url' => 'crearUsuario', 'method' => 'POST', 'autocomplete' => 'off'))!!}
    {{Form::token()}}
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 5%;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div style="padding: 3rem 2rem 3rem 2rem;">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">CREAR USUARIO</h1>
                            </div>
                            <input type="hidden" id="role" name="role" value="{{ request()->input('role') }}">
                            <form class="user">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="name" class="form-control form-control-user" id="name"
                                            placeholder="Nombres" value="{{old(key: 'name')}}">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="last_name" class="form-control form-control-user"
                                            id="last_name" placeholder="Apellidos" value="{{old('last_name')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class="form-control form-control-user"
                                            aria-label="Default select example" name="tipo_documento"
                                            id="tipo_documento">
                                            <option selected disabled>Tipo de Documento</option>
                                            @foreach ($documentos as $document)
                                                <option value="{{$document->name}}">{{ $document->description}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="document" class="form-control form-control-user"
                                            id="document" placeholder="Numero de documento" value="{{old('document')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="email"
                                        placeholder="Ingresa tu correo" value="{{old('email')}}">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="tel" class="form-control form-control-user" id="tel"
                                            placeholder="Ingresa tu número telefonico" value="{{old('tel')}}">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="adress" class="form-control form-control-user"
                                            id="adress" placeholder="Dirección" value="{{old('adress')}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="password" placeholder="Contraseña">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password_confirm"
                                            class="form-control form-control-user" id="password_confirm"
                                            placeholder="Confirmar Contraseña">
                                    </div>
                                </div>
                                <div class="row" style="position: absolute; width: 50%; padding-left: 10px;">
                                    <select class="select-rol" aria-label="Default select example" name="rol" id="rol">
                                            <option selected disabled>Rol</option>
                                            @foreach ($roles as $rol)
                                                <option value="{{$rol->name}}">{{ $rol->description}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="trat_datos">
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger"
                                            style="position: absolute; margin-bottom: 60px; margin-left: 330px;">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                    @if ($errors->has('tratamiento_datos'))
                                        <div class="alert alert-danger"
                                            style="position: absolute; margin-bottom: 60px; margin-left: 330px;">
                                            {{ $errors->first('tratamiento_datos') }}
                                        </div>
                                    @endif
                                    @if ($errors->has('completar_formulario'))
                                        <div class="alert alert-danger"
                                            style="position: absolute; margin-bottom: 60px; margin-left: 330px;">
                                            {{ $errors->first('completar_formulario') }}
                                        </div>
                                    @endif
                                    <div>
                                        <input class="" type="checkbox" value="si" id="tratamiento_datos"
                                            name="tratamiento_datos">
                                        <a href="{{url('derechos')}}" class="form-check-label" for="tratamiento_datos">
                                            He leído y acepto el tratamiento de mis datos personales
                                        </a>
                                    </div>

                                </div>
                                <button class="btn btn-primary btn-user btn-block" type="submit">
                                    <span class="glyphicon glyphicon-ok"></span> REGISTRAR
                                </button>

                            </form>
                            <hr>
                            <div class="text-center btn-log">
                                <a class="small" href="{{url('minuevasonrisa')}}">Volver</a>
                            </div>
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