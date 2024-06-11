<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function alumnos(){
        return $this->hasMany(Alumno::class);
    }

    public function nivel(){
        return $this->belongsTo(Nivel::class);
    }

}
