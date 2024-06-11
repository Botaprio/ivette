<div>
    <br><br>

    {{--    mensaje de sesion para cuando se elimina un atraso--}}

    @if (session()->has('message'))
        <div class="alert alert-danger">
            {{ session('message') }}
        </div>
    @endif


    <h3 class="text-center">REGISTROS DE ATRASOS</h3>

    <br><br>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Curso</th>
            <th scope="col">Atraso</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($atrasos as $atraso)
            <tr>
                <td>{{ $atraso->alumno->nombres }} {{ $atraso->alumno->apellidoPaterno }} {{ $atraso->alumno->apellidoMaterno }}</td>
                <td>{{ $atraso->alumno->curso->nombre}}</td>
                <td>{{$atraso->hora}}</td>
                @if($atraso->tipo ==0)
                <td>
                    <button wire:click="eliminarAtraso({{ $atraso->id }})" class="btn btn-danger">Eliminar Atraso Mañana</button>
                </td>
                    @else
                    <td>
                        <button wire:click="eliminarAtrasoInterclases({{ $atraso->id }})" class="btn btn-dark">Eliminar Atraso Interclases</button>
                    </td>
                @endif
            </tr>
        @endforeach


        </tbody>
    </table>
    {{--    generate links for pagination--}}

    {{ $atrasos->links() }}


    <br>

    <h3 class="text-center">REGISTROS DE RETIROS</h3>
    <br>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Curso</th>
            <th scope="col">Retiro</th>
            <th scope="col">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($retiros as $retiro)
            <tr>
                <td>{{ $retiro->alumno->nombres }} {{ $retiro->alumno->apellidoPaterno }} {{ $retiro->alumno->apellidoMaterno }}</td>
                <td>{{ $retiro->alumno->curso->nombre}}</td>
                <td>{{$retiro->hora}}</td>
                <td>
                    <button wire:click="eliminarRetiro({{ $retiro->id }})" class="btn btn-success">Eliminar Retiro</button>
                </td>


            </tr>
        @endforeach


        </tbody>
    </table>
    {{--    generate links for pagination--}}

    {{ $atrasos->links() }}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        window.addEventListener('show-session-message', event => {
            $("#sessionMessage").delay(5000).slideUp(300);
        });
    </script>
</div>
