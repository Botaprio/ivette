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
            <img src="{{asset('assets/img/logo.png')}}" width=100
                 alt="logo">

        </div>
        {{--        <p class="text-end m-0" style="font-style: italic">--}}
        {{--            The Wessex School<br/>--}}
        {{--            Concepción, Chile<br/>--}}
        {{--            Reporte de inasistencias<br/>--}}
        {{--        </p>--}}
    </div>
</div>

<h4 class="text-center">INFORME DE ATRASOS - CURSO</h4>
<h4 class="text-center">{{$curso->nombre}}</h4>

<br>
<h5 class="text-center">Desde: {{ \Carbon\Carbon::parse($fechaInicio)->isoFormat('dddd D [de] MMMM [de] YYYY') }}
    <br> Hasta: {{ \Carbon\Carbon::parse($fechaFinal)->isoFormat('dddd D [de] MMMM [de] YYYY') }}</h5>
<br><br><br>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th colspan="4" class="text-center">ATRASOS MATUTINOS</th>
            </tr>
            <tr>
                <th>N°</th>
                <th>Alumno</th>
                <th>Fecha</th>
                <th>Hora</th>

            </tr>
            </thead>
            <tbody>
            @forelse($atrasos as $atraso)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$atraso->alumno->nombres}} {{$atraso->alumno->apellidoPaterno}} {{$atraso->alumno->apellidoMaterno}}</td>
                    <td>{{ \Carbon\Carbon::parse($atraso->fecha)->isoFormat('dddd D [de] MMMM [de] YYYY') }}</td>
                    <td>{{$atraso->hora}}</td>
                </tr>

            @empty
                <tr>
                    <td colspan="4" class="text-center">No hay atrasos matutinos</td>
                </tr>
            @endforelse


            </tbody>
        </table>
    </div>
    <div class="col-12">
        @if($atrasosI)

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th colspan="4" class="text-center">ATRASOS INTERCLASES</th>
                </tr>
                <tr>
                    <th>N°</th>
                    <th>Alumno</th>
                    <th>Fecha</th>
                    <th>Hora</th>

                </tr>
                </thead>

                <tbody>

                @forelse($atrasosI as $atrasoI)
                    <tr class="{{ $loop->iteration % 4 == 0  ? 'bg-warning' : '' }}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$atraso->alumno->nombres}} {{$atraso->alumno->apellidoPaterno}} {{$atraso->alumno->apellidoMaterno}}</td>
                        <td>{{ \Carbon\Carbon::parse($atrasoI->fecha)->isoFormat('dddd D [de] MMMM [de] YYYY') }}</td>
                        <td>{{$atrasoI->hora}}</td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="text-center">No hay atrasos interclases</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        @else

            
        @endif
    </div>
</div>


<script src="{{asset('assets/js/jquery-3')}}.3.1.min.js"></script>
<script src="{{asset('assets/js/popper.min')}}.js"></script>
<script src="{{asset('assets/js/bootstrap.min')}}.js"></script>
<script src="{{asset('assets/js/perfect-scrollbar')}}.js"></script>
<script src="{{asset('assets/js/jquery-ui')}}.min.js"></script>
</body>
</html>
