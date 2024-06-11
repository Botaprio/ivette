@extends('layouts.app')

@section('seccion','cursos')
@section('encabezado','REPORTE DE INASISTENCIAS')
@section('link')
    {{url('cursos')}}
@endsection
@section('link2','Cursos')
@section('seccion2','Cursos')

@section('content')

    <h4 class="text-center">INASISTENCIAS POR FECHAS: </h4>
    <br>
    @php
        use Carbon\Carbon;
    @endphp
    <h4 class="text-center">Desde {{ Carbon::parse($fechaInicio)->format('d-m-Y') }} hasta  {{ Carbon::parse($fechaFinal)->format('d-m-Y') }}</h4>




    @foreach($cursos as $curso)
        <h2>{{ $curso->nombre }}</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Alumno</th>
            </tr>
            </thead>
            <tbody>
            @foreach($curso->alumnos as $alumno)
                @foreach($alumno->inasistencias as $inasistencia)
                    <tr>
                        <td>{{ $inasistencia->fecha }}</td>
                        <td>{{ $alumno->nombres }} {{ $alumno->apellidoPaterno }} {{ $alumno->apellidoMaterno }}</td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    @endforeach

   <h4 class="text-center"> TOTAL : {{$inasistencias->count()}}</h4>


    <table class="table table-striped table-bordered thead-primary">
        <thead>
        <tr>
            <th>Fecha</th>
            <th>Alumno</th>
            <th>Curso</th>
        </tr>
        </thead>
        <tbody>
        @foreach($inasistencias as $inasistencia)
            <tr>
                <td>{{ $inasistencia->fecha }}</td>
                <td>{{ $inasistencia->alumno->nombres }} {{$inasistencia->alumno->apellidoPaterno}}  {{$inasistencia->alumno->apellidoMaterno}}</td>
                <td>{{ $inasistencia->alumno->curso->nombre }} </td>

            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
