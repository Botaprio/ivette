@extends('layouts.app')

@section('content')


    Señor(a)
    Apoderado de <h6>{{$alumno->nombres}}, {{$alumno->apellidoPaterno}} {{$alumno->apellidoMaterno}}, {{$alumno->curso->nombre}}</h6>
    Presente.
    <br>
    Estimado(a) señor(a):
    <br>
    Por medio del presente, me permito saludarle y recordar que el ingreso a clases del Área Senior es a las 08:10 hrs.

    Por lo anterior, informo a usted que su hijo(a) {{$alumno->nombres}}, cuenta a la fecha con un número de 03 atrasos y que, de acuerdo a nuestro Reglamento Interno de Disciplina, esta condición lo inhabilita a llegar nuevamente atrasado. En el caso que esto ocurriera, recibirá automáticamente un Detention.
    <br>
    Los atrasos son los días:
    <br><br>
    <ul>
        @foreach($atrasos as $atraso)
            <li>Atraso N° {{$loop->iteration}}: {{ \Carbon\Carbon::parse($atraso->fecha)->isoFormat('dddd D [de] MMMM [de] YYYY') }} - Hora :{{$atraso->hora}}</li>

        @endforeach
    </ul>
    <br>

    Sin más sobre el particular, y agradeciendo su atención y comprensión, le saluda atentamente,

    <br>
    <br>




    <br>
    Jefatura de Área



@endsection
