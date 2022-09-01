<?php

namespace Database\Seeders;

use App\Models\RoomBoy;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id'=>1,
            'name' => 'Admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('password'),
        ]);
        User::create([
            'role_id'=>2,
            'name' => 'Front Desk',
            'email'=>'frontdesk@gmail.com',
            'password'=>bcrypt('password'),
        ]);
        User::create([
            'role_id'=>3,
            'name' => 'Kiosk',
            'email'=>'kiosk@gmail.com',
            'password'=>bcrypt('password'),
        ]);
        User::create([
            'role_id'=>4,
            'name' => 'Kitchen',
            'email'=>'kitchen@gmail.com',
            'password'=>bcrypt('password'),
        ]);
        User::create([
            'role_id'=>6,
            'name'=>"House Keeping",
            'email'=>'housekeeping@gmail.com',
            'password'=>bcrypt('password'),
        ]);

        for ($i=0; $i < 99 ; $i++) { 
            $user = User::create([
                'role_id'=>5,
                'name'=>fake()->name,
                'email'=>fake()->email,
                'password'=>bcrypt('password'),
            ]);
            RoomBoy::create([
                'user_id'=>$user->id,
            ]);
        }
    }
}
