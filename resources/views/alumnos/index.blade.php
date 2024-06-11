@extends('layouts.app')

@section('content')

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>CURSO</th>
            <th>NOMBRE ALUMNO</th>
            <th>ATRASOS</th>
            <th>ACCIONES</th>
        </tr>
        </thead>
        <tbody>

        @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->curso->nombre }}</td>
                <td>{{ $alumno->nombres }} {{ $alumno->apellidoPaterno }} {{ $alumno->apellidoMaterno }}</td>
                <td>{{ $alumno->atrasos_count }}</td>
                <td>
                    <!-- Aquí puedes agregar las acciones que necesites -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{ $alumnos->links()}}

@endsection
