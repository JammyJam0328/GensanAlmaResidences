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
        $types = Type::whereHas('rates')->get();
        // seed dummy 200 rooms
        $room_number=1;
        for ($i = 1; $i <= 10; $i++) {
            $floor =Floor::create([
                'number' => $i,
            ]);
            for ($j = 1; $j <= 30; $j++) {
                $room = Room::create([
                    'floor_id' => $floor->id,
                    'number' => $room_number,
                    'room_status_id' => 1,
                ]);
                $room_number++;
                foreach ($types as $type) {
                    $room->types()->attach($type->id);
                }
            }
        }
    }
}
