<?php

namespace Database\Seeders;

use App\Models\StayingHour;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'Single',
        ]);
        Type::create([
            'name' => 'Double',
        ]);
        Type::create([
            'name' => 'Triple',
        ]);
        Type::create([
            'name' => 'Queen',
        ]);
        Type::create([
            'name' => 'King',
        ]);
        for ($i=1; $i <=24 ; $i++) { 
            StayingHour::create([
                'number' => $i,
            ]);
        }
    }
}
