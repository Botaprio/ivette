<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cursos')->insert([
            //            tiny tots
            ['id' => 1, 'nivel_id' => 1,  'nombre' => 'Tiny Tots A'],
            ['id' => 2, 'nivel_id' => 1,  'nombre' => 'Tiny Tots B'],
            ['id' => 3, 'nivel_id' => 1,  'nombre' => 'Tiny Tots C'],

            //play school
            ['id' => 4, 'nivel_id' => 2,  'nombre' => 'Play School A'],
            ['id' => 5, 'nivel_id' => 2,  'nombre' => 'Play School B'],
            ['id' => 6, 'nivel_id' => 2,  'nombre' => 'Play School C'],

            //pre kinder
            ['id' => 7, 'nivel_id' => 3,  'nombre' => 'Pre Kinder A'],
            ['id' => 8, 'nivel_id' => 3,  'nombre' => 'Pre Kinder B'],
            ['id' => 9, 'nivel_id' => 3,  'nombre' => 'Pre Kinder C'],

            //kinder
            ['id' => 10, 'nivel_id' => 4,  'nombre' => 'Kinder A'],
            ['id' => 11, 'nivel_id' => 4,  'nombre' => 'Kinder B'],
            ['id' => 12, 'nivel_id' => 4,  'nombre' => 'Kinder C'],

            //1° básico
            ['id' => 13, 'nivel_id' => 5,  'nombre' => '1° Básico A'],
            ['id' => 14, 'nivel_id' => 5,  'nombre' => '1° Básico B'],
            ['id' => 15, 'nivel_id' => 5,  'nombre' => '1° Básico C'],

            //2° básico
            ['id' => 16, 'nivel_id' => 6,  'nombre' => '2° Básico A'],
            ['id' => 17, 'nivel_id' => 6,  'nombre' => '2° Básico B'],
            ['id' => 18, 'nivel_id' => 6,  'nombre' => '2° Básico C'],

            //3° básico
            ['id' => 19, 'nivel_id' => 7,  'nombre' => '3° Básico A'],
            ['id' => 20, 'nivel_id' => 7,  'nombre' => '3° Básico B'],
            ['id' => 21, 'nivel_id' => 7,  'nombre' => '3° Básico C'],


            //4° básico
            ['id' => 22, 'nivel_id' => 8,  'nombre' => '4° Básico A'],
            ['id' => 23, 'nivel_id' => 8,  'nombre' => '4° Básico B'],
            ['id' => 24, 'nivel_id' => 8,  'nombre' => '4° Básico C'],


            //5° básico
            ['id' => 25, 'nivel_id' => 9,  'nombre' => '5° Básico A'],
            ['id' => 26, 'nivel_id' => 9,  'nombre' => '5° Básico B'],
            ['id' => 27, 'nivel_id' => 9,  'nombre' => '5° Básico C'],


            //6° básico
            ['id' => 28, 'nivel_id' => 10,  'nombre' => '6° Básico A'],
            ['id' => 29, 'nivel_id' => 10,  'nombre' => '6° Básico B'],
            ['id' => 30, 'nivel_id' => 10,  'nombre' => '6° Básico C'],


            //7° básico
            ['id' => 31, 'nivel_id' => 11,  'nombre' => '7° Básico A'],
            ['id' => 32, 'nivel_id' => 11,  'nombre' => '7° Básico B'],
            ['id' => 33, 'nivel_id' => 11,  'nombre' => '7° Básico C'],


            //8° básico
            ['id' => 34, 'nivel_id' => 12,  'nombre' => '8° Básico A'],
            ['id' => 35, 'nivel_id' => 12,  'nombre' => '8° Básico B'],
            ['id' => 36, 'nivel_id' => 12,  'nombre' => '8° Básico C'],


            //1° medio
            ['id' => 37, 'nivel_id' => 13,  'nombre' => '1° Medio A'],
            ['id' => 38, 'nivel_id' => 13,  'nombre' => '1° Medio B'],
            ['id' => 39, 'nivel_id' => 13,  'nombre' => '1° Medio C'],


            //2° medio
            ['id' => 40, 'nivel_id' => 14,  'nombre' => '2° Medio A'],
            ['id' => 41, 'nivel_id' => 14,  'nombre' => '2° Medio B'],
            ['id' => 42, 'nivel_id' => 14,  'nombre' => '2° Medio C'],


            //3° medio
            ['id' => 43, 'nivel_id' => 15,  'nombre' => '3° Medio A'],
            ['id' => 44, 'nivel_id' => 15,  'nombre' => '3° Medio B'],
            ['id' => 45, 'nivel_id' => 15,  'nombre' => '3° Medio C'],


            //4° medio
            ['id' => 46, 'nivel_id' => 16,  'nombre' => '4° Medio A'],
            ['id' => 47, 'nivel_id' => 16,  'nombre' => '4° Medio B'],
            ['id' => 48, 'nivel_id' => 16,  'nombre' => '4° Medio C'],
        ]);

    }
}
