<?php

namespace App\Http\Controllers;

use App\Imports\AlumnosImport;
use App\Imports\AlumnosMultipleImport;
use App\Models\Alumno;
use App\Models\Atraso;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::withCount('atrasos')
            ->orderBy('atrasos_count', 'desc')
            ->paginate(20);

        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        $atrasos = Atraso::where('alumno_id', $alumno->id)
            ->where('tipo', 0)
            ->get();

        $atrasosI = Atraso::where('alumno_id', $alumno->id)
            ->where('tipo', '1')
            ->orderBy('hora', 'asc')
            ->get();

        $detentions = Alumno::where('id', $alumno->id)
            ->get();
        return view('alumnos.show', compact('alumno', 'atrasos', 'atrasosI', 'detentions'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new AlumnosImport, $file);
        return redirect('/home')->with('success', 'All good!');
    }


    public function importMultiple(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new AlumnosMultipleImport, $file);
        return redirect('/home')->with('success', 'Importación exitosa!');
    }


    public function peligro()
    {


        $alumnosPeligro = Alumno::where('atrasos', '3')->get();
        $alumnosPeligroI = Alumno::where('atrasosI', '3')->get();

        $alumnosDetention = Alumno::where('atrasos', '>=', '4')->get();
        $alumnosDetentionI = Alumno::where('atrasosI', '>=', '4')->get();


        return view('alumnos.peligro', compact('alumnosDetention', 'alumnosPeligro', 'alumnosDetentionI', 'alumnosPeligroI'));
    }


    public function detention(Alumno $alumno)
    {
        $atrasos = Atraso::where('alumno_id', $alumno->id)
            ->where('tipo', 0)
            ->get();

        $atrasosI = Atraso::where('alumno_id', $alumno->id)
            ->where('tipo', 1)
            ->get();

        $alumnoConAtraso = Alumno::where('id', $alumno->id)
            ->where('atrasos', '>=',4)
            ->first();

        if ($alumnoConAtraso) {

            if ($alumnoConAtraso->atrasos >= 4) {
                // Increment the detentions attribute by 1
                $alumnoConAtraso->increment('detentions');

                // Atrasos = 0
                $alumnoConAtraso->decrement('atrasos',4);
            }
        }

        $alumnoConAtrasoI = Alumno::where('id', $alumno->id)
            ->where('atrasosI', '>=', 4)
            ->first();

        if ($alumnoConAtrasoI) {

            if ($alumnoConAtrasoI->atrasosI >= 4) {
                // Increment the detentions attribute by 1
                $alumnoConAtrasoI->increment('detentions');
                // Atrasos = 0
                $alumnoConAtrasoI->decrement('atrasosI',4);
            }
        }


        return view('alumnos.detention', compact('alumno', 'alumnoConAtraso', 'alumnoConAtrasoI', 'atrasos', 'atrasosI'));
    }


    public function aviso(Alumno $alumno)
    {

        $atrasos = Atraso::where('alumno_id', $alumno->id)->get();


        return view('alumnos.aviso', compact('alumno', 'atrasos'));
    }

    public function informe(Alumno $alumno)
    {

        $atrasos = Atraso::where('alumno_id', $alumno->id)
            ->where('tipo', 0)
            ->get();
        $atrasosI = Atraso::where('alumno_id', $alumno->id)
            ->where('tipo', 1)
            ->get();


        $pdf = PDF::loadView('alumnos.informe', compact('alumno', 'atrasos', 'atrasosI'));
//        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream($alumno->nombres.' '.$alumno->apellidoPaterno . ' ' . $alumno->apellidoMaterno . ' - Atrasos.pdf');
    }
}
