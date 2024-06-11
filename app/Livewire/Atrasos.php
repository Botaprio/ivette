<?php

namespace App\Livewire;

use App\Models\Atraso;
use App\Models\Retiro;
use Livewire\Component;

class Atrasos extends Component
{

    protected $listeners = ['atrasoCreado' => '$refresh'];


    public function eliminarAtraso($atrasoId)
    {
        $atraso = Atraso::find($atrasoId);
        if ($atraso) {
            $atraso->delete();

           //buscar al alumno de ese atraso
            $alumno = $atraso->alumno;
            //restar 1 a la cantidad de atrasos del alumno
            $alumno->atrasos -= 1;
            $alumno->save();

            session()->flash('message', 'Atraso eliminado correctamente');

        }
    }

    public function eliminarAtrasoInterclases($atrasoId)
    {
        $atraso = Atraso::find($atrasoId);
        if ($atraso) {
            $atraso->delete();

            //buscar al alumno de ese atraso
            $alumno = $atraso->alumno;
            //restar 1 a la cantidad de atrasos del alumno
            $alumno->atrasosI -= 1;
            $alumno->save();

            session()->flash('message', 'Atraso eliminado correctamente');

        }
    }

    public function eliminarRetiro($retiroId)
    {
        $retiro = Retiro::find($retiroId);
        if ($retiro) {
            $retiro->delete();

            session()->flash('message', 'Retiro eliminado correctamente');

        }
    }




    public function render()
    {
        $atrasos = Atraso::
        where('fecha', today())
            ->orderBy('hora', 'desc')
            ->paginate(10);


        $retiros = Retiro::
        where('fecha', today())
            ->orderBy('hora', 'desc')
            ->paginate(10);
        return view('livewire.atrasos', compact('atrasos', 'retiros'));
    }
}
