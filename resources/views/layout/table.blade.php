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

<style>
    .cont-gen {
        margin: 0px 15px 0px 15px;
    }
</style>

<section class="tabla_citas">
    <div class="container-fluid">

        <div class="buscador">
            <div class="titulo-tablas" style="margin: 10px 0px 10px 0px">@yield('titulo')</div>

            <?php 

            if(Auth::user()->hasRole('admin')){ 
                $url = "/citasAdmin";
            } else {
                $url = "/citas"; 
            }
            
            ?>

            <form action="{{ url($url) }}" method="GET" class="buscador-form">
                <input type="text" name="busqueda" placeholder="Buscar...">
                <button type="submit">Buscar</button>
            </form>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        @yield('tabla')
                    </table>
                    <div style="display:flex; justify-content: right;">
                        @if ($totalPages > 1)
                            <div class="pagination">
                                @if ($currentPage > 1)
                                    <div class="paginador">
                                        <a href="?page={{ $currentPage - 1 }}">Anterior</a>
                                    </div>
                                @endif
                                @for ($i = 1; $i <= $totalPages; $i++)
                                    <div class="{{ $i == $currentPage ? 'active' : '' }} paginador">
                                        <a href="?page={{ $i }}">{{ $i }}</a>
                                    </div>
                                @endfor
                                @if ($currentPage < $totalPages)
                                    <div class="paginador">
                                        <a href="?page={{ $currentPage + 1 }}">Siguiente</a>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
<!-- /.container-fluid -->