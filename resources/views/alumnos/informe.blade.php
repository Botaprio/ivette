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
    <div class="logo-sn ms-d-block-lg logo">
        <img src="{{asset('assets/img/logo.png')}}" width=100 alt="logo"
             style="position: absolute;
    top: 0;
    left: 0;">
    </div>
    <p class="text-end m-0 header-text" style="font-style: italic;
    position: absolute;
    top: 0;
    right: 0;
    ">
        The Wessex School<br/>
        Concepción, Chile<br/>
        Reporte de Inasistencias y Atrasos<br/>
    </p>
</div>


<br><br><br><br>
<h4 class="text-center">{{$alumno->nombres}} {{$alumno->apellidoPaterno}} {{$alumno->apellidoMaterno}} </h4>
<h4 class="text-center">{{$alumno->curso->nombre}}</h4>

<br>
<div class="container-fluid">

    <div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th colspan="3" class="text-center">ATRASOS MATUTINOS</th>
            </tr>
            <tr>
                <th>N°</th>
                <th>Fecha</th>
                <th>Hora</th>

            </tr>
            </thead>
            <tbody>
            @foreach($atrasos as $atraso)
                <tr class="{{ $loop->iteration % 4 == 0 ? 'bg-warning' : '' }}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{ \Carbon\Carbon::parse($atraso->fecha)->isoFormat('dddd D [de] MMMM [de] YYYY') }}</td>
                    <td>{{$atraso->hora}}</td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
    <div style="page-break-after: always;"></div>
    <div>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th colspan="3" class="text-center">ATRASOS INTERCLASES</th>
            </tr>
            </thead>

            <tbody>

            @foreach($atrasosI as $atrasoI)
                <tr class="{{ $loop->iteration % 4 == 0  ? 'bg-warning' : '' }}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{ \Carbon\Carbon::parse($atrasoI->fecha)->isoFormat('dddd D [de] MMMM [de] YYYY') }}</td>
                    <td>{{$atrasoI->hora}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

<div style="position: absolute; bottom: 50px">
    <h4 class="text-center">{{$alumno->nombres}} {{$alumno->apellidoPaterno}} {{$alumno->apellidoMaterno}} - {{$alumno->curso->nombre}}</h4>
</div>

<div>
    <h5 class="text-center" style="position: absolute; bottom: 0; left: 0">Cantidad de Detentions: {{$alumno->detentions}}</h5>
</div>

<div>

    <h6 class="text-center" style="position: absolute; bottom: 0; right: 0">FECHA DE EMISIÓN: {{\Carbon\Carbon::now()->format('d-m-Y')}}</h6>
</div>

<script src="{{asset('assets/js/jquery-3')}}.3.1.min.js"></script>
<script src="{{asset('assets/js/popper.min')}}.js"></script>
<script src="{{asset('assets/js/bootstrap.min')}}.js"></script>
<script src="{{asset('assets/js/perfect-scrollbar')}}.js"></script>
<script src="{{asset('assets/js/jquery-ui')}}.min.js"></script>
</body>
</html>
