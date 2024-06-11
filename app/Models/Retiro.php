<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumno_id',
        'fecha',
        'hora',
        // Agrega aquí otros campos necesarios
    ];
    public function alumno(){
        return $this->belongsTo(Alumno::class);
    }
}
