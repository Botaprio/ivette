<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('vendors/iconic-fonts/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="{{asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet">
    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="{{asset('assets/css/slick.css')}}" rel="stylesheet">
    <!-- medboard styles -->
    {{--    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">--}}

    <!-- Page Specific CSS (Morris Charts.css) -->
    <link href="{{asset('assets/css/morris.css')}}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon.ico')}}">

</head>
<body>

<div class="row justify-content-evenly">
    <div class="col-sm-8 col-11" style="position:absolute;
                top: -30px;
                left: -10px;
                height: 0; ">
        <div class="logo-sn ms-d-block-lg">
            <a class="pl-0 ml-0 text-center mt-4" href="{{url('/home')}}"><h5 style="color: white">THE WESSEX
                    SCHOOL</h5></a>
            <a href="{{url('/')}}" class="text-center "> <img src="{{asset('assets/img/logo.png')}}" width=100
                                                              alt="logo"></a>
            <h5 class="text-center text-white mt-2">{{Auth::user() ? Auth::user()->name : ""}}</h5>
            <h6 class="text-center text-white mb-3">{{Auth::user() ?Auth::user()->email : ""}}</h6>
        </div>
        {{--        <p class="text-end m-0" style="font-style: italic">--}}
        {{--            The Wessex School<br/>--}}
        {{--            Concepción, Chile<br/>--}}
        {{--            Reporte de inasistencias<br/>--}}
        {{--        </p>--}}
    </div>
</div>


<h4 class="text-center">REPORTE ASISTENCIAS, {{\Carbon\Carbon::now()->format('d-m-Y')}}</h4>
<br><br>

@foreach($cursos as $curso)
    @if($curso->nivel_id >=5)
        <h2 class="text-center">{{ $curso->nombre }}</h2>
        <br>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Número</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
            </tr>
            </thead>
            <tbody>
            @foreach($curso->alumnos as $index => $alumno)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $alumno->nombres }}</td>
                    <td>{{ $alumno->apellidoPaterno }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
    @endif
@endforeach

<h2>Resumen de inasistencias</h2>
<table class="table table-bordered table-striped thead-primary">
    <thead>
    <tr>
        <th>Curso</th>
        <th>Número de inasistencias</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cursos as $curso)
        <tr>
            <td>{{ $curso->nombre }}</td>
            <td>{{ $curso->alumnos->count() }}</td>
        </tr>
    @endforeach

    <br>
    <tr>
        <td><h4>Total</h4></td>
        <td><h4>{{ $totalInasistencias }}</h4></td>
    </tr>


    </tbody>
</table>


<script src="{{asset('assets/js/jquery-3')}}.3.1.min.js"></script>
<script src="{{asset('assets/js/popper.min')}}.js"></script>
<script src="{{asset('assets/js/bootstrap.min')}}.js"></script>
<script src="{{asset('assets/js/perfect-scrollbar')}}.js"></script>
<script src="{{asset('assets/js/jquery-ui')}}.min.js"></script>
</body>
</html>




