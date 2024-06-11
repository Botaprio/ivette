@extends('layouts.app')

@section('content')

<div>
    <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="img-fluid" width="100" height="100">
</div>
<br>
    Señor(a)
    Apoderado de <h6>{{$alumno->nombres}}, {{$alumno->apellidoPaterno}} {{$alumno->apellidoMaterno}}
        , {{$alumno->curso->nombre}}</h6>
    <br>
    Presente.

    Estimado(a) señor(a):
    <br>
    A través de la presente, me permito saludarle e informar que su hijo(a)
    <strong> {{$alumno->nombres}}</strong>, ha sido sancionado(a) con Detention por reiterados atrasos en el horario de ingreso a nuestro establecimiento.

    Los atrasos son los días: <br>
    <br>
<div class="row">
<div class="col-6">
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
    <div class="col-6">
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


    Esta sanción se deberá realizar el día sábado 18 de mayo de 8:30 a las 10:30 hrs., con su uniforme escolar completo, en nuestro colegio.
    <br>
    Le saluda atentamente,
    <br>

    <br>
    Jefatura de Área

@endsection
