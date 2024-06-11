@extends('layouts.app')

@section('seccion','cursos')
@section('encabezado','REPORTE DE ATRASOS POR CURSO')
@section('link')
    {{url('cursos')}}
@endsection
@section('link2','Home')
@section('seccion2','Home')

@section('content')
    <form method="POST" action="{{ route('atrasos.cursoRango')}}">
        @csrf
        <label for="curso">SELECCIONE EL CURSO</label>
        <br>
        <select name="curso" id="curso" class="form-control">
            <option value="">seleccione Curso</option>
            @foreach($cursos as $curso)
                <option value="{{$curso->id}}">{{$curso->nombre}}</option>
            @endforeach
        </select>

        <br>
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

@endsection
