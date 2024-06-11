<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }

    public function atrasos(){
        return $this->hasMany(Atraso::class);
    }

    public function retiros(){
        return $this->hasMany(Retiro::class);
    }

    protected $fillable = [
        'id',
        'nombres',
        'apellidoPaterno',
        'apellidoMaterno',
        'curso_id'
    ];

    public function detentions()
    {
        return $this->hasMany(Detention::class);
    }

    public function inasistencias()
    {
        return $this->hasMany(Inasistencia::class);
    }
}
