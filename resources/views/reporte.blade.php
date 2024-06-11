@extends('layouts.app')

@section('content')

   <div class="container">
       @foreach($cursos as $curso)
           <br>
           <h2 class="text-center" style="color: #0c5460">{{ $curso->nombre }}</h2>
           <br>
           <table class="table table-striped table-bordered">
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
           <br>
       @endforeach

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">{{ __('REPORTE DIARIO DE ATRASOS') }}
                        <div class="row">
                            <h5>FECHA:
                                {{ date('d/m/Y') }} </h5>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{--                        tabla que muestre todos los atrasos del dia, separados por curso--}}






                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">CURSO</th>
                                <th scope="col">ALUMNO</th>
                                <th scope="col">HORA DE INGRESO</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cursos as $curso)
                                @foreach($atrasos as $atraso)

                                    @if($atraso->alumno->curso->id == $curso->id)

                                        <tr>

                                            <td>{{$atraso->alumno->curso->nombre}}</td>
                                            <td>{{$atraso->alumno->nombres}} {{$atraso->alumno->apellidoPaterno}} {{$atraso->alumno->apellidoMaterno}}</td>
                                            <td>{{$atraso->hora}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
