<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Main Admin',
            'email' => 'mainadmin@gmail.com',
            'password' => Hash::make('adminganteng'),
            'phone' => 0,
            'profile_image' => 'Foto',
        ]);
    }
}
