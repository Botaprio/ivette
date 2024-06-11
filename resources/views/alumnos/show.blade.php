@extends('layouts.app')


@section('seccion','cursos')
@section('encabezado','INFORME DE ATRASOS E INASISTENCIAS')
@section('link')
    {{url('cursos')}}
@endsection
@section('link2','Cursos')
@section('seccion2','Cursos')


@section('content')


    <h4 class="text-center">{{$alumno->nombres}} {{$alumno->apellidoPaterno}} {{$alumno->apellidoMaterno}} </h4>
    <h4 class="text-center">{{$alumno->curso->nombre}}</h4>

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
    <br>
    <div>
        <h5 class="text-center">Cantidad de Detentions: {{$alumno->detentions}}</h5>
    </div>

    <a href="{{route('alumnos.informe',$alumno->id)}}" class="btn btn-primary">Generar PDF</a>


@endsection
