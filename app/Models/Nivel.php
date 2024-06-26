<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    public function cursos(){
        return $this->hasMany(Curso::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }
}
