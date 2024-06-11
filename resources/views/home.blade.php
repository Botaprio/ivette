@extends('layouts.app')

@section('title', 'Inicio')


@section('content')



    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="text-center">SISTEMA DE REGISTRO DE ATRASOS</h4>

                <div class="row text-center">
                    <h5 class="">FECHA:
                        {{ date('d/m/Y') }} </h5>
                </div>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <livewire:alumnos/>
                    <livewire:atrasos/>


            </div>
        </div>

@endsection
