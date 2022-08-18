<?php

namespace Database\Seeders;

use App\Models\Rate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GensanAlmaResidencesRates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //  $table->unsignedBigInteger('type_id')->constrained();
        //     $table->unsignedBigInteger('staying_hour_id')->constrained();
        //     $table->string('amount');
        Rate::create([
            'type_id' => 1,
            'staying_hour_id' => 1,
            'amount' => 200,
        ]);
        Rate::create([
            'type_id' => 2,
            'staying_hour_id' => 1,
            'amount' => 250,
        ]);
        Rate::create([
            'type_id' => 4,
            'staying_hour_id' => 1,
            'amount' => 300,
        ]);
        // 
        Rate::create([
            'type_id' => 1,
            'staying_hour_id' => 2,
            'amount' => 300,
        ]);
        Rate::create([
            'type_id' => 2,
            'staying_hour_id' => 2,
            'amount' => 350,
        ]);
        Rate::create([
            'type_id' => 4,
            'staying_hour_id' => 2,
            'amount' => 400,
        ]);
        // 
        Rate::create([
            'type_id' => 1,
            'staying_hour_id' => 3,
            'amount' => 400,
        ]);
        Rate::create([
            'type_id' => 2,
            'staying_hour_id' => 3,
            'amount' => 450,
        ]);
        Rate::create([
            'type_id' => 4,
            'staying_hour_id' => 3,
            'amount' => 500,
        ]);
        // 
        Rate::create([
            'type_id' => 1,
            'staying_hour_id' => 4,
            'amount' => 500,
        ]);
        Rate::create([
            'type_id' => 2,
            'staying_hour_id' => 4,
            'amount' => 550,
        ]);
        Rate::create([
            'type_id' => 4,
            'staying_hour_id' => 4,
            'amount' => 600,
        ]);
    }
}
