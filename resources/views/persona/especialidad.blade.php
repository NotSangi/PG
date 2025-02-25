<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Especialidad</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/styles-general.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    {!!Form::open(array('url'=>'especialidad','method'=>'POST','autocomplete'=>'off'))!!}
    {{Form::token()}}
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-6">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">ELIGE TU ESPECIALIDAD</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <select name="especialidad" id="especialidad" class="form-control form-control-user">
                                                <?php
                                                if(Auth::user()->hasAnyEspecialty(Auth::user()->id)){
                                                    $idEspecialidad = DB::table('especialidad_users')->where('user_id', Auth::user()->id)->value('especialidad_id');
                                                    $especialidadDescripcion = DB::table('especialidads')->where('id', $idEspecialidad)->value('description');
                                                ?>
                                                    <option value="{{$idEspecialidad}}" selected>{{$especialidadDescripcion}}</option>
                                                    @foreach ($especialidad as $espe)
                                                        <option value="{{$espe->id}}">{{ $espe->description }}</option>
                                                    @endforeach
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="" disabled selected>Selecciona una opción</option>

                                                    @foreach ($especialidad as $espe)
                                                        <option value="{{$espe->id}}">{{ $espe->description }}</option>
                                                    @endforeach
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                
                                        <button class="btn btn-primary btn-user btn-block" type="submit">
                                            <span class="glyphicon glyphicon-ok"></span> GUARDAR
                                        </button>     
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    {{Form::close()}}

</body>

</html>