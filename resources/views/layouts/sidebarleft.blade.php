    <aside id="ms-side-nav" class="side-nav fixed ms-aside-scrollable ms-aside-left">
    <!-- Logo -->
    <div class="logo-sn ms-d-block-lg">
        <a class="pl-0 ml-0 text-center mt-4" href="{{url('/home')}}"><h5 style="color: white">THE WESSEX SCHOOL</h5></a>
        <a href="{{url('/')}}" class="text-center "> <img src="{{asset('assets/img/logo.png')}}" width=100
                                                          alt="logo"></a>
        <h5 class="text-center text-white mt-2">{{Auth::user() ? Auth::user()->name : ""}}</h5>
        <h6 class="text-center text-white mb-3">{{Auth::user() ?Auth::user()->email : ""}}</h6>
    </div>
    <!-- Navigation -->
    <ul class="accordion ms-main-aside fs-14" id="side-nav-accordion">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="{{url('/home')}}" {{--data-toggle="collapse" data-target="#dashboard"
               aria-controls="dashboard"--}}>
                <span><i class="material-icons fs-16">dashboard</i>Inicio </span>
            </a>
        </li>
        <!-- /Dashboard -->
        <!-- curso -->
        <li class="menu-item">
            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#curso">
                <span><i class="fas fa-school"></i>Curso</span>
            </a>
            <ul id="curso" class="collapse" data-parent="#side-nav-accordion">
                <li><a href="{{route('cursos.index')}}">Asistencia</a></li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#alumno">
                <span><i class="fas fa-user"></i>Alumno</span>
            </a>
            <ul id="alumno" class="collapse" data-parent="#side-nav-accordion">
                <li><a href="{{route('alumnos.peligro')}}">Notificar Alumnos</a></li>
            </ul>

{{--            <ul id="alumno" class="collapse" data-parent="#side-nav-accordion">--}}
{{--                <li><a href="{{route('alumnos.detention')}}">Detention</a></li>--}}
{{--            </ul>--}}

        </li>

{{--        <li class="menu-item">--}}
{{--            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#reportes">--}}
{{--                <span><i class="fas fa-user"></i>Reportes</span>--}}
{{--            </a>--}}
{{--            <ul id="reportes" class="collapse" data-parent="#side-nav-accordion">--}}
{{--                <li><a href="{{route('inasistencias.index')}}">Inasistencias (Hoy)</a></li>--}}
{{--                <li><a href="{{route('inasistencias.rango')}}">Inasistencias por Rango de Fecha</a></li>--}}
{{--            </ul>--}}

{{--        </li>--}}
        <li class="menu-item">
            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#reportes">
                <span><i class="fas fa-user"></i>Reportes de Atrasos</span>
            </a>
            <ul id="reportes" class="collapse" data-parent="#side-nav-accordion">
                <li><a href="{{route('atrasos.index')}}">Hoy</a></li>
                <li><a href="{{route('atrasos.curso')}}">Por Curso</a></li>
                <li><a href="{{--{{route('atrasos.area')}}--}}">Por Area</a></li>
            </ul>

        </li>
        <li class="menu-item">
            <a href="#" class="has-chevron" data-toggle="collapse" data-target="#importar">
                <span><i class="fas fa-file-excel"></i>Importar</span>
            </a>

            <ul id="importar" class="collapse" data-parent="#side-nav-accordion">
                <li><a href="{{route('import')}}">Importar Alumnos</a></li>
            </ul>
        </li>
        <!-- curso -->

    </ul>
</aside>
