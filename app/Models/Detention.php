<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detention extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'realizado', 'atraso_id'];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
