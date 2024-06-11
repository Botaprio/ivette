    <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name', 'The Wessex School') }} - @yield('title')</title>
    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('vendors/iconic-fonts/font-awesome/css/all.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('vendors/iconic-fonts/flat-icons/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/iconic-fonts/cryptocoins/cryptocoins.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- jQuery UI -->
    <link href="{{asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet">
    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="{{asset('assets/css/slick.css')}}" rel="stylesheet">
    <!-- medboard styles -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- Page Specific CSS (Morris Charts.css) -->
    <link href="{{asset('assets/css/morris.css')}}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon.ico')}}">
</head>

<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
<!-- Setting Panel -->
<!-- Preloader -->

<div id="preloader-wrap">
    <div class="spinner spinner-8">
        <div class="ms-circle1 ms-child"></div>
        <div class="ms-circle2 ms-child"></div>
        <div class="ms-circle3 ms-child"></div>
        <div class="ms-circle4 ms-child"></div>
        <div class="ms-circle5 ms-child"></div>
        <div class="ms-circle6 ms-child"></div>
        <div class="ms-circle7 ms-child"></div>
        <div class="ms-circle8 ms-child"></div>
        <div class="ms-circle9 ms-child"></div>
        <div class="ms-circle10 ms-child"></div>
        <div class="ms-circle11 ms-child"></div>
        <div class="ms-circle12 ms-child"></div>
    </div>
</div>

<!-- Sidebar Navigation Left -->
@include('layouts.sidebarleft')

<!-- Main Content -->
<main class="body-content">
    <!-- Navigation Bar -->

    @include('layouts.navbar')
    <div class="ms-content-wrapper">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb pl-0">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="material-icons">home</i> Inicio</a>
                    </li>
                    <li class="breadcrumb-item">@yield('seccion')</li>
                    {{--                    <li class="breadcrumb-item"><a href="#">@yield('seccion')</a></li>--}}
                    <li class="breadcrumb-item active" aria-current="page">{{--@yield('seccion2')--}}</li>
                </ol>
            </nav>
            <div class="ms-panel">
                <div class="ms-panel-header ms-panel-custome">
                    <h6 class="">@yield('encabezado')</h6>
                    <a href=@yield('link') class="ms-text-primary">@yield('link2')</a>
                </div>
                <div class="ms-panel-body">
                    @yield('content')
                </div>
            </div>
        </div>

    </div>
    <!-- Body Content Wrapper -->
</main>
<!-- SCRIPTS -->
<!-- Global Required Scripts Start -->
<script src="{{asset('assets/js/jquery-3')}}.3.1.min.js"></script>
<script src="{{asset('assets/js/popper.min')}}.js"></script>
<script src="{{asset('assets/js/bootstrap.min')}}.js"></script>
<script src="{{asset('assets/js/perfect-scrollbar')}}.js"></script>
<script src="{{asset('assets/js/jquery-ui')}}.min.js"></script>
<!-- Global Required Scripts End -->
<script src="{{asset('assets/js/d3.v3')}}.min.js"></script>
<script src="{{asset('assets/js/topojson.v1')}}.min.js"></script>
<script src="{{asset('assets/js/datamaps.all')}}.min.js"></script>
<!-- Page Specific Scripts Start -->
<script src="{{asset('assets/js/slick.min')}}.js"></script>
<script src="{{asset('assets/js/moment.js')}}"></script>
<script src="{{asset('assets/js/jquery.webticker')}}.min.js"></script>
<script src="{{asset('assets/js/Chart.bundle')}}.min.js"></script>
<script src="{{asset('assets/js/index-chart')}}.js"></script>
<!-- Page Specific Scripts Finish -->
<script src="{{asset('assets/js/calendar.js')}}"></script>
<!-- medboard core JavaScript -->
<script src="{{asset('assets/js/framework.js')}}"></script>
<!-- Settings -->
<script src="{{asset('assets/js/settings.js')}}"></script>
</body>
</html>
