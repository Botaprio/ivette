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

    <form method="POST" action="{{ route('inasistencias.verRango') }}">
        @csrf
        <div class="form-row">
            <div class="col-md-6 mb-3">
            <label for="fechaInicio">Fecha inicio:</label>
            <input type="date" id="fechaInicio" name="fechaInicio" class="form-control">
        </div>
            <div class="col-md-6 mb-3">
            <label for="fechaFinal">Fecha fin:</label>
            <input type="date" id="fechaFinal" name="fechaFinal" class="form-control">
        </div>
        </div>
        <button type="submit" class="btn btn-primary">Ver rango</button>
    </form>


{{--    @foreach($cursos as $curso)--}}
{{--        <h2 class="text-center">{{ $curso->nombre }}</h2>--}}
{{--        <br>--}}
{{--        <table class="table table-striped table-bordered">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Número</th>--}}
{{--                <th>Nombre</th>--}}
{{--                <th>Apellido Paterno</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($curso->alumnos as $index => $alumno)--}}
{{--                <tr>--}}
{{--                    <td>{{ $index + 1 }}</td>--}}
{{--                    <td>{{ $alumno->nombres }}</td>--}}
{{--                    <td>{{ $alumno->apellidoPaterno }}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--        <br>--}}
{{--    @endforeach--}}

{{--    <h2>Resumen de inasistencias</h2>--}}
{{--    <table class="table table-bordered table-striped thead-primary">--}}
{{--        <thead>--}}
{{--        <tr>--}}
{{--            <th>Curso</th>--}}
{{--            <th>Número de inasistencias</th>--}}
{{--        </tr>--}}
{{--        </thead>--}}
{{--        <tbody>--}}
{{--        @foreach($cursos as $curso)--}}
{{--            <tr>--}}
{{--                <td>{{ $curso->nombre }}</td>--}}
{{--                <td>{{ $curso->alumnos->count() }}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}

{{--    <br>--}}
{{--        <tr>--}}
{{--            <td> <h4>Total</h4></td>--}}
{{--            <td><h4>{{ $totalInasistencias }}</h4></td>--}}
{{--        </tr>--}}
{{--        </tbody>--}}
{{--    </table>--}}

@endsection
