<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Area;
use App\Models\Atraso;
use App\Models\Curso;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class AtrasoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atrasos = Atraso::where('fecha', today()->format('Y-m-d'))
            ->orderBy('hora')->get();

        $cursos = Curso::all();
        return view('reporte', compact('atrasos', 'cursos'));
    }


    public function profesores()
    {
        $atrasos = Atraso::where('fecha', today()->format('Y-m-d'))
            ->orderBy('hora')->get();

        $cursos = Curso::where('id','>=','13')->get();
        $cursosPorNivel = $cursos->groupBy('nivel_id');
        return view('profesores', compact('atrasos', 'cursos', 'cursosPorNivel'));
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


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atraso $atraso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atraso $atraso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atraso $atraso)
    {
        //
    }

    public function curso()
    {
        $cursos = Curso::all();
        $atrasos = Atraso::all();
        return view('atrasos.curso', compact('cursos', 'atrasos'));
    }


    public function cursoRango(Request $request)
    {

        $fechaInicio = $request->fechaInicio;
        $fechaFinal = $request->fechaFinal;
        $cursos = Curso::all();
        $atrasos = Atraso::whereRelation('alumno', 'curso_id', $request->curso)
            ->whereBetween('fecha', [$fechaInicio, $fechaFinal])
            ->where('tipo',0)
            ->get();

        $cuentaAtrasos = Atraso::whereRelation('alumno', 'curso_id', $request->curso)
            ->whereBetween('fecha', [$fechaInicio, $fechaFinal])
            ->where('tipo',0)
            ->count();

        $atrasosI = Atraso::whereRelation('alumno', 'curso_id', $request->curso)
            ->whereBetween('fecha', [$fechaInicio, $fechaFinal])
            ->where('tipo',1)
            ->get();

        $cuentaAtrasosI = Atraso::whereRelation('alumno', 'curso_id', $request->curso)
            ->whereBetween('fecha', [$fechaInicio, $fechaFinal])
            ->where('tipo',1)
            ->count();

        $curso = Curso::find($request->curso);

//

        return view('atrasos.rangoCurso', compact('cursos', 'atrasos', 'curso', 'fechaInicio', 'fechaFinal', 'atrasosI', 'cuentaAtrasos', 'cuentaAtrasosI'));
    }

    public function area()
    {
        $areas = Area::all();
        $atrasos = Atraso::all();
        return view('atrasos.area', compact('areas', 'atrasos'));
    }

    public function informeCursoFecha(Request $request)
    {

        $curso = Curso::where('id',$request->curso_id)->first();
        $fechaInicio = $request->fechaInicio;
        $fechaFinal = $request->fechaFinal;

        $atrasos = Atraso::whereRelation('alumno', 'curso_id', $request->curso_id)
            ->whereBetween('fecha', [$fechaInicio, $fechaFinal])
            ->where('tipo',0)
            ->get();

        $atrasosI = Atraso::whereRelation('alumno', 'curso_id', $request->curso_id)
            ->whereBetween('fecha', [$fechaInicio, $fechaFinal])
            ->where('tipo',1)
            ->get();

        $pdf = PDF::loadView('atrasos.pdfRangoCurso', compact('curso', 'fechaInicio', 'fechaFinal', 'atrasos', 'atrasosI'));
        return $pdf->download($curso->nombre.' - Desde ' .\Carbon\Carbon::parse($fechaInicio)->isoFormat('D [de] MMMM [de] YYYY') . ' hasta ' .\Carbon\Carbon::parse($fechaFinal)->isoFormat('D [de] MMMM [de] YYYY'). '.pdf');
    }
}
