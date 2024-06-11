<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inasistencia extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'alumno_id'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

}
