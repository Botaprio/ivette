<?php

use App\Http\Controllers\AtrasoController;
use App\Http\Controllers\CursoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('profesores',[AtrasoController::class,'profesores']);
Route::middleware(['auth'])->group(function () {

Route::post('/atrasos/informe-curso-fecha', [App\Http\Controllers\AtrasoController::class, 'informeCursoFecha'])->name('atrasos.informeCursoFecha');
Route::get('/alumnos/{alumno}/informe', [App\Http\Controllers\AlumnoController::class, 'informe'])->name('alumnos.informe');
Route::get('/inasistencias/rango', [App\Http\Controllers\InasistenciaController::class, 'rango'])->name('inasistencias.rango');
Route::post('/inasistencias/verRango', [App\Http\Controllers\InasistenciaController::class, 'verRango'])->name('inasistencias.verRango');
Route::post('/atrasos/curso-rango', [App\Http\Controllers\AtrasoController::class, 'cursorango'])->name('atrasos.cursoRango');
Route::get('/inasistencias/pdf', [App\Http\Controllers\InasistenciaController::class, 'generatePDF'])->name('inasistencias.pdf');
Route::view('/alumnos/import', 'alumnos.import')->name('import');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/alumnos/peligro', [App\Http\Controllers\AlumnoController::class, 'peligro'])->name('alumnos.peligro');
Route::get('/alumnos/detention', [App\Http\Controllers\AlumnoController::class, 'detention'])->name('alumnos.detention');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reporte', [App\Http\Controllers\AtrasoController::class, 'index'])->name('reporte');
Route::get('/reporte-por-curso', [App\Http\Controllers\AtrasoController::class, 'curso'])->name('atrasos.curso');
Route::get('/reporte-por-area', [App\Http\Controllers\AtrasoController::class, 'area'])->name('atrasos.area');
Route::post('/import', [App\Http\Controllers\AlumnoController::class, 'import'])->name('alumnos.import');
Route::post('/importmultiple', [App\Http\Controllers\AlumnoController::class, 'importMultiple'])->name('alumnos.importMultiple');
Route::resource('alumnos', 'App\Http\Controllers\AlumnoController');
Route::resource('areas', 'App\Http\Controllers\AreaController');
Route::resource('cursos', 'App\Http\Controllers\CursoController');
Route::resource('niveles', 'App\Http\Controllers\NivelController');
Route::resource('atrasos', App\Http\Controllers\AtrasoController::class);
Route::resource('inasistencias', App\Http\Controllers\InasistenciaController::class);
Route::resource('detentions', App\Http\Controllers\DetentionController::class);

Route::get('/reporteInasistencias', [App\Http\Controllers\InasistenciaController::class, 'reporteInasistencias'])->name('reporteInasistencias');
Route::get('/inasistencias/reporteDiario', [App\Http\Controllers\InasistenciaController::class, 'reporteAsistenciaDiaria'])->name('inasistencias.reporteAsistenciaDiaria');

//ruta a la vista detention, método POST, recibe el id del alumno
Route::post('/detention/{alumno}', [App\Http\Controllers\AlumnoController::class, 'detention'])->name('alumnos.detention');
Route::post('/aviso/{alumno}', [App\Http\Controllers\AlumnoController::class, 'aviso'])->name('alumnos.aviso');

});

