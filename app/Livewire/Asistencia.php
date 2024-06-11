<?php

namespace App\Livewire;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Inasistencia;
use App\Models\Nivel;
use Carbon\Carbon;
use Livewire\Component;

class Asistencia extends Component
{
    public $curso_id;

    public function mount($curso_id)
    {
        $this->curso_id = $curso_id;
    }

    public function store($alumnoId)
    {
        $alumno = Alumno::find($alumnoId);
        if ($alumno) {
            // Verifica si ya existe una inasistencia para el alumno en la fecha actual
            $inasistenciaExistente = Inasistencia::where('alumno_id', $alumno->id)
                ->where('fecha', Carbon::today())
                ->first();

            // Si no existe una inasistencia, la crea
            if (!$inasistenciaExistente) {
                Inasistencia::create([
                    'alumno_id' => $alumno->id,
                    'fecha' => Carbon::today(),
                    'tipo' => 0,
                ]);
                session()->flash('message', 'Inasistencia del alumno registrada correctamente');
                session()->flash('message_type', 'alert alert-success');
                $this->dispatch('inasistenciaCreada');
            } else {
                session()->flash('message', 'Ya existe una inasistencia registrada para el alumno hoy');
                session()->flash('message_type', 'alert alert-danger');
            }
        }
    }

    public function destroy($alumnoId)
    {
        $inasistencia = Inasistencia::where('alumno_id', $alumnoId)
            ->where('fecha', Carbon::today())
            ->first();

        if ($inasistencia) {
            $inasistencia->delete();
            session()->flash('message', 'Inasistencia del alumno revertida correctamente');
            session()->flash('message_type', 'alert alert-success');
        } else {
            session()->flash('message', 'No se encontró una inasistencia para el alumno hoy');
            session()->flash('message_type', 'alert alert-danger');
        }
    }


    public function render()
    {
        $hoy = Carbon::today();
        $alumnos = Alumno::where('curso_id', $this->curso_id)->get();
        $curso = Curso::where('id', $this->curso_id)->first();

        $inasistencias = Inasistencia::where('fecha', $hoy)
            ->whereRelation('alumno', 'curso_id', $this->curso_id)
            ->get();

        return view('livewire.asistencia', compact('hoy', 'alumnos','inasistencias', 'curso'));
    }
}
