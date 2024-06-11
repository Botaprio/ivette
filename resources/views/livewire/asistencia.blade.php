<div>

    <style>
        table td {
            padding-left: 10px; /* Adjust as needed */
            padding-right: 10px; /* Adjust as needed */
            border: 5px solid #000000; /* Adjust as needed */
        }
    </style>
    @if (session()->has('message'))
        <div class="{{ session('message_type') }}" >
            {{ session('message') }}
        </div>
    @endif

    <br>

        <h4 class="text-center"> LISTADO DE CURSO: </h4>
        <h4 class="text-center">{{$curso->nombre}}</h4>
        <br>
        <div class="table-responsive">
            <table class="table-bordered table-striped  thead-primary {{--table-responsive--}} table-hover">

                <tr>
                    <td>N°</td>
                    <td>Nombres</td>
                    <td>Apellido Paterno</td>
                    <td>Inasistencia</td>
                    <td>Registrar Inasistencia</td>
                    <td>Revertir Inasistencia </td>
                </tr>
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>{{ $alumno->nombres }}</td>
                        <td>{{ $alumno->apellidoPaterno }}</td>
                        <td class="text-center align-content-center">
                            @foreach($inasistencias as $inasistencia)
                                @if($inasistencia->alumno_id == $alumno->id)
                                    <span class="badge badge-danger">AUSENTE</span>

                                @endif
                            @endforeach
                        </td>
                        {{--                    <td>--}}

                        {{--                        <form action="{{ route('inasistencias.store',$alumno->id) }}" method="POST">--}}
                        {{--                            @csrf--}}
                        {{--                            <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">--}}
                        {{--                            <button type="submit" class="btn btn-primary">Inasistencia</button>--}}

                        {{--                        </form>--}}
                        {{--                    </td>--}}

                        <td class="text-center align-middle">
                            <button wire:click="store({{ $alumno->id }})" class="btn btn-primary btn-sm">Inasistencia</button>
                        </td>

                        <td>
                            @foreach($inasistencias as $inasistencia)
                                @if($inasistencia->alumno_id == $alumno->id)
                                    <button wire:click="destroy({{ $alumno->id }})" class="btn btn-warning">Reincorporar</button>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    {{--                    <td>--}}
                    {{--                        @foreach($inasistencias as $inasistencia)--}}
                    {{--                            @if($inasistencia->alumno_id == $alumno->id)--}}
                    {{--                                <form action="{{ route('inasistencias.destroy',$alumno->id) }}" method="POST">--}}
                    {{--                                    @method('DELETE')--}}
                    {{--                                    @csrf--}}
                    {{--                                    <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">--}}
                    {{--                                    <button type="submit" class="btn btn-warning">Reincorporar</button>--}}

                    {{--                                </form>--}}
                    {{--                            @endif--}}
                    {{--                        @endforeach--}}
                    {{--                    </td>--}}
                    <!-- Agrega más columnas según la información que quieras mostrar de cada alumno -->

                @endforeach
            </table>
        </div>
</div>
