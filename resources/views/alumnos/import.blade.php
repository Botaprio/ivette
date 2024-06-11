@extends('layouts.app')

@section('content')

    <h4 class="text-center">Importación de Alumnos desde Excel</h4>


    <div class="row m-5">
        <div class="col-md-12">
            <form action="{{route('alumnos.import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="input-group">
                <button class="btn btn-success">IMPORTAR ALUMNOS DESDE EXCEL DE TAMARA</button>
            </form>
        </div>
    </div>

@endsection
