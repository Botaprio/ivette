@extends('layouts.app')

@section('seccion','cursos')
@section('encabezado','LISTADO DE TODOS LOS CURSOS')
@section('link')
    {{url('cursos')}}
@endsection
@section('link2','Cursos')
@section('seccion2','Cursos')

@section('content')

{{--    <livewire:asistencia/>--}}
    <br><br>
    <div class="row">
        <div class="col-3">

        </div>

        <div>
            <table class="table table-bordered table-striped table-responsive w-100 pl-5 ml-5">

                @foreach($niveles as $nivel)
                    <tr class="align-content-center justify-content-center">
                        <td class="align-content-center text-center"><h6>{{ $nivel->nombre }}</h6></td>
                        @foreach($nivel->cursos as $curso)
                            <td style="width: 300px" class="text-center">
                                <a href="{{route('cursos.show',$curso->id)}}"
                                   class="btn btn-primary">{{ $curso->nombre }}</a>
                            </td>
                            <td>

                            </td>
                        @endforeach


                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
