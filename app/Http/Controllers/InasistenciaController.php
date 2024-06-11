<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Inasistencia;
use App\Models\Nivel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

//use Barryvdh\DomPDF\Facade as PDF;


class InasistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $niveles = Nivel::all();
        $cursos = Curso::with(['alumnos' => function ($query) {
            $query->whereHas('inasistencias', function ($query) {
                $query->where('fecha', Carbon::today());
            });
        }])->get();

        $totalInasistencias = Inasistencia::where('fecha', Carbon::today())->count();

        return view('inasistencias.index', compact('cursos', 'totalInasistencias', 'niveles'));
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
        // Busca una inasistencia existente para el alumno en la fecha actual
        $inasistenciaExistente = Inasistencia::where('fecha', Carbon::today())
            ->where('alumno_id', $request->alumno_id)
            ->first();

        // Si no existe una inasistencia, crea una nueva
        if (!$inasistenciaExistente) {
            Inasistencia::create([
                'fecha' => Carbon::today(),
                'alumno_id' => $request->alumno_id,
            ]);

            return back()->with('status', 'Inasistencia creada con éxito');
        }

        // Si ya existe una inasistencia, redirige al usuario a la página anterior con un mensaje de error
        return back()->with('error', 'Ya existe una inasistencia para este alumno hoy');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inasistencia $inasistencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inasistencia $inasistencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inasistencia $inasistencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // Busca la inasistencia de hoy para el alumno específico
        $inasistencia = Inasistencia::where('fecha', Carbon::today())
            ->where('alumno_id', $request->alumno_id)->first();

        // Si la inasistencia existe, la elimina
        if ($inasistencia) {
            $inasistencia->delete();
        }

        return back()->with('status', 'Inasistencia eliminada');
    }

    /**
     * Reporte de inasistencias
     */
    public function reporteInasistencias()
    {
        // Obtiene todas las inasistencias

    }

    /**
     * Rango de inasistencias
     */

    public function rango(Request $request)
    {

//        // Obtiene las fechas de inicio y finalización del rango desde la solicitud
//        $fechaInicio = $request->fechaInicio;
//        $fechaFinal = $request->fechaFinal;
//
//        // Obtiene todas las inasistencias en el rango de fechas
//        $inasistencias = Inasistencia::whereBetween('fecha', [$fechaInicio, $fechaFinal])->get();

        return view('inasistencias.rango'/* ,compact('inasistencias')*/);
    }


    public function verRango(Request $request)
    {

        $fechaInicio = $request->fechaInicio;
        $fechaFinal = $request->fechaFinal;

        $inasistencias = Inasistencia::whereBetween('fecha', [$fechaInicio, $fechaFinal])
            ->orderBy('fecha', 'asc')
            ->get();


        $cursos = Curso::with(['alumnos.inasistencias' => function ($query) use ($fechaInicio, $fechaFinal) {
            $query->whereBetween('fecha', [$fechaInicio, $fechaFinal]);
        }])->get();


        $cantidadInasistencias = Inasistencia::whereBetween('fecha', [$fechaInicio, $fechaFinal])->count();

        return view('inasistencias.verRango', compact('inasistencias', 'cantidadInasistencias', 'fechaInicio', 'fechaFinal', 'cursos'));

    }


    public function generatePDF()
    {
        // Recopila los datos que se pasarán a la vista
        $niveles = Nivel::all();
        $cursos = Curso::with(['alumnos' => function ($query) {
            $query->whereHas('inasistencias', function ($query) {
                $query->where('fecha', Carbon::today());
            });
        }])->get();



        $totalInasistencias = Inasistencia::where('fecha', Carbon::today())->count();

        // Carga la vista 'inasistencias.index' y pasa los datos
        $pdf = PDF::loadView('inasistencias.pdf', compact('cursos', 'totalInasistencias', 'niveles'));

        // Genera el PDF y lo descarga
        return $pdf->stream('inasistencias.pdf');
    }

}
