<?php

namespace Database\Seeders;

use App\Models\Floor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <=10 ; $i++) { 
            Floor::create([
                'number' => $i,
            ]);
        }
    }
}
