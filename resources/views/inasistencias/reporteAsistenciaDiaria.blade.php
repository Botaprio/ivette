@extends('layouts.app')

@section('seccion','cursos')
@section('encabezado','REPORTE DE INASISTENCIAS')
@section('link')
    {{url('cursos')}}
@endsection
@section('link2','Cursos')
@section('seccion2','Cursos')

@section('content')

    <h4 class="text-center">FECHA: {{\Carbon\Carbon::now()->format('d/m/Y')}}</h4>
    <br><br>

    @foreach($cursos as $curso)
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
            <td> <h4>Total</h4></td>
            <td><h4>{{ $totalInasistencias }}</h4></td>
        </tr>


{{--        @foreach($niveles as $nivel)--}}
{{--            <tr class="align-content-center justify-content-center">--}}
{{--                <td class="align-content-center text-center"><h6>{{ $nivel->nombre }}</h6></td>--}}
{{--                @foreach($nivel->cursos as $curso)--}}
{{--                    <td>{{ $curso->nombre }}</td>--}}
{{--                    <td>{{ $curso->alumnos->count() }}</td>--}}
{{--                @endforeach--}}


{{--            </tr>--}}
{{--        @endforeach--}}
        </tbody>
    </table>

    <a href="{{route('reporteAsistenciaDiaria')}}" class="btn-sm btn-warning">EXPORTAR PDF</a>
@endsection
