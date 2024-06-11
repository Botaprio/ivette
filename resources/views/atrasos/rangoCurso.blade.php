@extends('layouts.app')

@section('seccion','cursos')
@section('encabezado','REPORTE DE ATRASOS POR CURSO')
@section('link')
    {{url('cursos')}}
@endsection
@section('link2','Home')
@section('seccion2','Home')

@section('content')

    <h4 class="text-center">INFORME DE ATRASOS - CURSO</h4>
    <h4 class="text-center">{{$curso->nombre}}</h4>

    <br>
    <h5 class="text-center">Desde: {{ \Carbon\Carbon::parse($fechaInicio)->isoFormat('dddd D [de] MMMM [de] YYYY') }}
        <br> Hasta: {{ \Carbon\Carbon::parse($fechaFinal)->isoFormat('dddd D [de] MMMM [de] YYYY') }}</h5>

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
                @foreach($atrasos as $atraso)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$atraso->alumno->nombres}} {{$atraso->alumno->apellidoPaterno}} {{$atraso->alumno->apellidoMaterno}}</td>
                        <td>{{ \Carbon\Carbon::parse($atraso->fecha)->isoFormat('dddd D [de] MMMM [de] YYYY') }}</td>
                        <td>{{$atraso->hora}}</td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
        <div class="col-12">
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

                @foreach($atrasosI as $atrasoI)
                    <tr class="{{ $loop->iteration % 4 == 0  ? 'bg-warning' : '' }}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$atraso->alumno->nombres}} {{$atraso->alumno->apellidoPaterno}} {{$atraso->alumno->apellidoMaterno}}</td>
                        <td>{{ \Carbon\Carbon::parse($atrasoI->fecha)->isoFormat('dddd D [de] MMMM [de] YYYY') }}</td>
                        <td>{{$atrasoI->hora}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div>
        <h5 class="text-center">Cantidad de Atrasos matutinos del Curso:{{$cuentaAtrasos}} </h5>
        <h5 class="text-center">Cantidad de Atrasos interclases del Curso:{{$cuentaAtrasosI}} </h5>
    </div>

{{--    <a href="{{route('atrasos.informe',$alumno->id)}}" class="btn btn-primary">Generar PDF</a>--}}
    <form action="{{route('atrasos.informeCursoFecha')}}" method="POST">
        @csrf

        <input type="hidden" name="curso_id" value="{{$curso->id}}">
        <input type="hidden" name="fechaInicio" value="{{$fechaInicio}}">
        <input type="hidden" name="fechaFinal" value="{{$fechaFinal}}">

        <input type="submit" class="btn btn-primary" value="Generar PDF">

    </form>

@endsection
