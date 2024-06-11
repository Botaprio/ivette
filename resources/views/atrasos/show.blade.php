@extends('layouts.app')

@section('content')

<div>
    <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="img-fluid" width="100" height="100">
</div>


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



@endsection
