@extends('layout.principal')

@section('user')
<li class="nav-item dropdown no-arrow">

    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>

        <img class="img-profile rounded-circle" <?php  
                            if (Auth::user()->hasRole("paciente")) {
    $imagen = "img/PACIENTE.png";
} elseif (Auth::user()->hasRole("doctor")) {
    $imagen = "img/DOCTOR.png";
} elseif (Auth::user()->hasRole("admin")) {
    $imagen = "img/ADMIN.png";
}                   
                        ?> src={{$imagen}}>
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
@endSection
</ul>

</nav>
<!-- End of Topbar -->

@section('info')


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
@endsection
<!-- /.container-fluid -->