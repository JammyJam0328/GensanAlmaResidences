<?php

namespace Database\Seeders;

use App\Models\RoomStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomStatus::create([
            'name' => 'Available',
        ]);
        RoomStatus::create([
            'name' => 'Occupied',
        ]);
        RoomStatus::create([
            'name' => 'Reserved',
        ]);
        RoomStatus::create([
            'name' => 'Maintenance',
        ]);
        RoomStatus::create([
            'name' => 'Unavailable',
        ]);
        RoomStatus::create([
            'name' => 'Selected In Kiosk',
        ]);
        RoomStatus::create([
            'name' => 'Uncleaned',
        ]);
    }
}
