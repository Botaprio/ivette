<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Inasistencia;
use App\Models\Nivel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $hoy = Carbon::today();
//        $cursos = Curso::with(['alumnos' => function ($query) use ($hoy) {
//            $query->whereHas('atrasos', function ($query) use ($hoy) {
//                $query->whereDate('fecha', $hoy);
//            });
//        }])->get();


        $niveles = Nivel::with('cursos')->get();
        return view('cursos.index', compact('niveles'));
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
    public function show(Curso $curso)
    {
        $hoy = Carbon::today();
        $alumnos = Alumno::where('curso_id', $curso->id)->get();

        $inasistencias = Inasistencia::where('fecha', $hoy)
            ->whereRelation('alumno', 'curso_id', $curso->id)
            ->get();

        return view('cursos.show', compact('hoy', 'alumnos','inasistencias','curso'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //
    }


}
