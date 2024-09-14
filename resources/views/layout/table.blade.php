<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CLINICA OCCIDENTE</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('vistaCO')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CLINICA DE OCCIDENTE</div>
            </a>

           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                @yield('componentes')
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- Divider -->
            <hr class="sidebar-divider">


        <!-- Heading -->

        <li>
                <p class="nav-link" style="margin:0 0 0 10px; padding:0; margin-top: 120px; color:rgba(255, 255, 255, 0.6);">Clínica de Occidente:</p>
                <p class="nav-link" style="margin:0 0 10px 15px; padding:0; color:rgba(255, 255, 255, 0.2);">Calle 18 Norte No. 5 - 34</p>
            </li>

            <li>
                <p class="nav-link" style="margin:0 0 0 10px; padding:0; color:rgba(255, 255, 255, 0.6);">Centro Integral de Cáncer:</p>
                <p class="nav-link" style="margin:0 0 10px 15px; padding:0; color:rgba(255, 255, 255, 0.2);">Calle 19 Norte No. 5N - 49 </p>
            </li>

            <li>
                <p class="nav-link" style="margin:0 0 0 10px; padding:0; color:rgba(255, 255, 255, 0.6);">Sede Administrativa:</p>
                <p class="nav-link" style="margin:0 0 10px 15px; padding:0; color:rgba(255, 255, 255, 0.2);">Av. 5 Norte No. 17N - 93</p>
            </li>

            <li>
                <p class="nav-link" style="margin:0 0 0 10px; padding:0; color:rgba(255, 255, 255, 0.6);">Centro de Especialistas:</p>
                <p class="nav-link" style="margin:0 0 10px 15px; padding:0; color:rgba(255, 255, 255, 0.2);">Av. 5AN No. 19N - 12</p>
            </li>

            <li>
                <p class="nav-link" style="margin:0 0 0 10px; padding:0; color:rgba(255, 255, 255, 0.6);">Laboratorio Clínico:</p>
                <p class="nav-link" style="margin:0 0 10px 15px; padding:0; color:rgba(255, 255, 255, 0.2);">Av. 5 No. 18N-02</p>
            </li>

            <li>
                <p class="nav-link" style="margin:0 0 0 10px; padding:0; color:rgba(255, 255, 255, 0.6);">PBX:</p>
                <p class="nav-link" style="margin:0 0 10px 15px; padding:0; color:rgba(255, 255, 255, 0.2);"> 660 3000 Cali</p>
            </li>

            <li>
                <p class="nav-link" style="margin:0 0 0 10px; padding:0; color:rgba(255, 255, 255, 0.6);">Central de citas:</p>
                <p class="nav-link" style="margin:0 0 10px 15px; padding:0; color:rgba(255, 255, 255, 0.2);">(602) 380 07 42 Cali - Colombia</p>
            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">

                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                                
                        <img class="img-profile rounded-circle" 
                        <?php  
                            if (Auth::user()->hasRole("paciente")) {
                                $imagen = "img/PACIENTE.png";
                            } elseif (Auth::user()->hasRole("doctor")){
                                $imagen = "img/DOCTOR.png";
                            }   elseif (Auth::user()->hasRole("admin")){
                                $imagen = "img/ADMIN.png";         
                            }                   
                        ?>

                        src = {{$imagen}} >
                    </a>
                            <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{url('perfil')}}">
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

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">@yield('titulo')</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                       
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    @yield('tabla')
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Clinica de Occidente 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>