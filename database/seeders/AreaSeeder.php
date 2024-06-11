<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $area1 = new Area();
        $area1->id=1;
        $area1->nombre="Infant";
        $area1->save();

        $area2 = new Area();
        $area2->id=2;
        $area2->nombre="Junior";
        $area2->save();

        $area3 = new Area();
        $area3->id=3;
        $area3->nombre="Senior";
        $area3->save();
    }
}
