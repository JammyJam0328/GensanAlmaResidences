<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(RoomStatusSeeder::class);
        $this->call(GensanAlmaResidencesRates::class);
        $this->call(DummyRoomSeeder::class);
        $this->call(TransactionTypesSeeder::class);
        $this->call(DummyCheckIn::class);
    }
}
