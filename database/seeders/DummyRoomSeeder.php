<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Type,Floor,Room};
class DummyRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $room_number = 1;
        for ($i = 1; $i <= 5; $i++) {
            $floor =Floor::create([
                'number' => $i,
            ]);
            for ($j = 1; $j <= 10; $j++) {
                // random room type
                $types = ['1','2','3','4'];
                $type = $types[array_rand($types)];
                $room = Room::create([
                    'number' => $room_number++,
                    'floor_id' => $floor->id,
                    'type_id' => $type,
                    'room_status_id' => 1,
                ]);
            }
        }
    }
}
