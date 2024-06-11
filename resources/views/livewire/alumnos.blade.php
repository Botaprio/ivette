<div>
    <div>
        <h4 class="text-center alert alert-success">CANTIDAD DE ALUMNOS EN EL SISTEMA: {{ $cuentaAlumnos}}</h4>

    </div>
    <br>
    <hr>
    <div class="input-group">

        <h2><span class="badge bg-primary mx-3">Buscar Alumno: </span></h2>
        <input wire:model.live="search"
               type="search" class="form-control">
    </div>
    <br>
    {{--    mensaje de sesión, cada vez que se guarda correctamente un atraso--}}
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <br>


    <br>
    <table class="table">
        <thead>
        <tr class="">
            <th scope="col" class="text-center">Ver Historial</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido Paterno</th>
            <th scope="col">Apellido Materno</th>
            <th scope="col">Curso</th>
            <th scope="col" class="text-center">Atraso Mañana</th>
            <th scope="col" class="text-center">Atraso Interclases</th>
            <th scope="col" class="text-center">Retiro</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($alumnos as $alumno)
            <tr class="">
                <th>
                    {{--                    mostrar todos los atrasos del alumno, en la vista de atrasos.show.blade.php--}}

                    <a href="{{ route('alumnos.show', $alumno->id) }}" class="btn btn-info btn-sm">VER</a>
                </th>
                <td class="align-content-center mx-2 px-2">{{ $alumno->nombres }}</td>
                <td class="align-content-center mx-2 px-2">{{ $alumno->apellidoPaterno }}</td>
                <td class="align-content-center mx-2 px-2">{{ $alumno->apellidoMaterno }}</td>
                <td class="align-content-center mx-2 px-2">{{ $alumno->curso->nombre}}</td>
                <td>

                    <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
                    <button wire:click="crearAtraso({{ $alumno->id }})" class="btn btn-primary">Atraso</button>
                </td>
                <td>
                    <button wire:click="crearInterclases({{ $alumno->id }})" class="btn btn-warning">Interclases
                    </button>

                </td>
                <td>
                    <button wire:click="crearRetiro({{ $alumno->id }})" class="btn btn-light">Retiro</button>

                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="d-flex justify-content-center">
        {{ $alumnos->links() }}
    </div>

</div>
