

@extends('layouts.app')

@section('content')

        @livewire('asistencia', ['curso_id' => $curso->id])

@endsection


