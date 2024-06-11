<?php

namespace App\Livewire;

use App\Models\Alumno;
use App\Models\Atraso;
use App\Models\Retiro;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;


class Alumnos extends Component
{

    use WithPagination;
    public $search = '';


    public function crearAtraso($alumnoId)
    {

        $alumno = Alumno::find($alumnoId);
        if ($alumno) {
            Atraso::create([
                'alumno_id' => $alumno->id,
                'fecha' => Carbon::today(),
                'hora' => Carbon::now()->format('H:i:s'),
                'tipo' => 0,
                // Agrega aquí otros campos necesarios
            ]);

            //sumar 1 a la cantidad de atrasos del alumno
            $alumno->atrasos += 1;

            $alumno->save();

            //poner un mensaje de éxito
            session()->flash('message', 'Atraso del alumno registrado correctamente');
            $this->dispatch('atrasoCreado');
        }

    }

    public function crearInterclases($alumnoId)
    {

        $alumno = Alumno::find($alumnoId);
        if ($alumno) {
            Atraso::create([
                'alumno_id' => $alumno->id,
                'fecha' => Carbon::today(),
                'hora' => Carbon::now()->format('H:i:s'),
                'tipo' => 1,

            ]);

            $alumno->atrasosI += 1;

            $alumno->save();
            //poner un mensaje de éxito
            session()->flash('message', 'Atraso INTERCLASES del alumno registrado correctamente');
            $this->dispatch('atrasoCreado');
        }

    }

    public function crearRetiro($alumnoId)
    {

        $alumno = Alumno::find($alumnoId);
        if ($alumno) {
            Retiro::create([
                'alumno_id' => $alumno->id,
                'fecha' => Carbon::today(),
                'hora' => Carbon::now()->format('H:i:s'),

                // Agrega aquí otros campos necesarios
            ]);
            //poner un mensaje de éxito
            session()->flash('message', 'Atraso DE MAÑANA del alumno registrado correctamente');
            $this->dispatch('atrasoCreado');
        }

    }

    public function render()
    {
        $alumnos = Alumno::where('nombres', 'LIKE', '%' . $this->search . '%')
            ->orWhere('apellidoPaterno', 'LIKE', '%' . $this->search . '%')
            ->orWhere('apellidoMaterno', 'LIKE', '%' . $this->search . '%')
            ->paginate(10);

        $cuentaAlumnos = Alumno::count();

        return view('livewire.alumnos',
            compact('alumnos', 'cuentaAlumnos'));
    }
}
