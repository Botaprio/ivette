@extends('layouts.app2')
@section('title', 'Profesores')
@section('content')

    <h3 class="text-center">VISOR DE ATRASOS</h3>
    <h4 class="text-center">Fecha: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</h4>
    <br>




        <div>
            <h6>Selecciona tu Curso:</h6>
        </div>
        <br>
        @foreach($cursosPorNivel as $nivel => $cursos)
            <div class="">

                <ul class="nav nav-tabs   mb-4" role="tablist">
                    @foreach($cursos as $curso)
                        <li role="presentation">
                            <a href="#tab{{ $curso->id }}" aria-controls="tab{{ $curso->id }}"
                               class="{{ $loop->first ? 'active' : '' }}" role="tab"
                               data-toggle="tab">{{ $curso->nombre }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content">
                @foreach($cursos as $curso)
                    <div role="tabpanel" class="tab-pane {{ $loop->first ? 'active show fade in' : 'fade' }}"
                         id="tab{{ $curso->id }}">
                        <table class="table-striped table table-bordered" style="border: 3px solid black;">
                            <thead>
                            <tr>
                                <th scope="col">ALUMNO</th>
                                <th scope="col">HORA DE INGRESO</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($atrasos as $atraso)
                                @if($atraso->alumno->curso->id == $curso->id)
                                    <tr>
                                        <td>{{$atraso->alumno->nombres}} {{$atraso->alumno->apellidoPaterno}} {{$atraso->alumno->apellidoMaterno}}</td>
                                        <td>{{$atraso->hora}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>

    @endforeach
    <br>

@endsection
