<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
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
        \App\Models\User::factory(20)->create();
        \App\Models\Building::factory(20)->create();
        \App\Models\Room::factory(20)->create();
        \App\Models\RoomType::factory(20)->create();
        \App\Models\User::create([
            'username' => 'Admin',
            'password' => 'Admin',
            'usertype' => 'Admin',
            'instansi' => 'Fakultas Teknik',
            'fullname' => 'Admin',
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'username' => 'SuperAdmin',
            'password' => 'SuperAdmin',
            'usertype' => 'SuperAdmin',
            'instansi' => 'Fakultas Teknik',
            'fullname' => 'SuperAdmin',
            'remember_token' => Str::random(10),
        ]);
    }
}
