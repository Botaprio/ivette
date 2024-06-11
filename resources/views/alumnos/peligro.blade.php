@extends('layouts.app')

@section('content')

    <h4 class="text-center">ALUMNOS EN RIESGO DE DETENTION</h4>
    <br>

    <table class="table table-bordered table-striped ">
        <thead>
        <tr class="table-warning">
            <th colspan="4" class="text-center"><h5>ATRASOS DE MAÑANA</h5></th>
        </tr>
        <tr>
            <th>CURSO</th>
            <th>NOMBRE ALUMNO</th>
            <th>ATRASOS</th>
            <th>ACCIONES</th>
        </tr>
        </thead>
        <tbody>

        @foreach($alumnosPeligro as $alumno)
            <tr>
                <td>{{ $alumno->curso->nombre }}</td>
                <td>{{ $alumno->nombres }} {{ $alumno->apellidoPaterno }} {{ $alumno->apellidoMaterno }}</td>
                <td>{{ $alumno->atrasos }}</td>
                <td>

                    <form action="{{ route('alumnos.aviso', $alumno->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">AVISO</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>

    <table class="table table-bordered table-striped">
        <thead>
        <tr class="table-warning">
            <th colspan="4" class="text-center"><h5>ATRASOS INTERCLASES</h5></th>
        </tr>
        <tr>
            <th>CURSO</th>
            <th>NOMBRE ALUMNO</th>
            <th>ATRASOS</th>
            <th>ACCIONES</th>
        </tr>
        </thead>
        <tbody>

        @foreach($alumnosPeligroI as $alumno)
            <tr>
                <td>{{ $alumno->curso->nombre }}</td>
                <td>{{ $alumno->nombres }} {{ $alumno->apellidoPaterno }} {{ $alumno->apellidoMaterno }}</td>
                <td>{{ $alumno->atrasosI }}</td>
                <td>

                    <form action="{{ route('alumnos.aviso', $alumno->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">AVISO</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>

    <h4 class="text-center">ALUMNOS QUE DEBEN IR A  DETENTION</h4>
    <br>
    <table class="table table-bordered table-striped">
        <thead>
        <tr class="table-danger">
            <th colspan="4" class="text-center"><h5>ATRASOS DE MAÑANA</h5></th>
        </tr>
        <tr>
            <th>CURSO</th>
            <th>NOMBRE ALUMNO</th>
            <th>ATRASOS</th>
            <th>ACCIONES</th>
        </tr>
        </thead>
        <tbody>

        @foreach($alumnosDetention as $alumno)
            <tr>
                <td>{{ $alumno->curso->nombre }}</td>
                <td>{{ $alumno->nombres }} {{ $alumno->apellidoPaterno }} {{ $alumno->apellidoMaterno }}</td>
                <td>{{ $alumno->atrasos }}</td>
                <td>

                    <form action="{{ route('alumnos.detention', $alumno->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">DETENTION</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <table class="table table-bordered table-striped">
        <thead>
        <tr class="table-danger">
            <th colspan="4" class="text-center"><h5>ATRASOS INTERCLASES</h5></th>
        </tr>
        <tr>
            <th>CURSO</th>
            <th>NOMBRE ALUMNO</th>
            <th>ATRASOS</th>
            <th>ACCIONES</th>
        </tr>
        </thead>
        <tbody>

        @foreach($alumnosDetentionI as $alumno)
            <tr>
                <td>{{ $alumno->curso->nombre }}</td>
                <td>{{ $alumno->nombres }} {{ $alumno->apellidoPaterno }} {{ $alumno->apellidoMaterno }}</td>
                <td>{{ $alumno->atrasosI }}</td>
                <td>

                    <form action="{{ route('alumnos.detention', $alumno->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">DETENTION</button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>




@endsection
