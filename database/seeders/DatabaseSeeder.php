<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(AreaSeeder::class);
        $this->call(NivelSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(AlumnoSeeder::class);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Fernando Botasso',
            'email' => 'fbotasso@gmail.com',
            'password' =>  bcrypt('123123123')
        ]);
        $this->call(AlumnosTableSeeder::class);
    }
}
