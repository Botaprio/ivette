<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nivel = new Nivel();
        $nivel->nombre = "Tiny Tots";
        $nivel->area_id = 1;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "Play School";
        $nivel->area_id = 1;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "Pre Kinder";
        $nivel->area_id = 1;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "Kinder";
        $nivel->area_id = 1;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "1° Básico";
        $nivel->area_id = 2;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "2° Básico";
        $nivel->area_id = 2;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "3° Básico";
        $nivel->area_id = 2;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "4° Básico";
        $nivel->area_id = 2;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "5° Básico";
        $nivel->area_id = 2;
        $nivel->save();


        $nivel = new Nivel();
        $nivel->nombre = "6° Básico";
        $nivel->area_id = 2;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "7° Básico";
        $nivel->area_id = 3;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "8° Básico";
        $nivel->area_id = 3;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "1° Medio";
        $nivel->area_id = 3;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "2° Medio";
        $nivel->area_id = 3;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "3° Medio";
        $nivel->area_id = 3;
        $nivel->save();

        $nivel = new Nivel();
        $nivel->nombre = "4° Medio";
        $nivel->area_id = 3;
        $nivel->save();
    }
}
