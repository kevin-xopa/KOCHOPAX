<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('password'),
        // ]);

        for ($i = 0; $i < 30; $i++) {
            DB::table('employees')->insert([
                'key' => Str::random(4),
                'name' => Str::random(10),
                'last_name' => Str::random(10),
                'mother_last_name' => Str::random(10),
                'age' => 23,
                'birth_date' => '2000-06-28',
                'sex' => 'Mujer',
                'base_salary' => 1000,
                'created_at' => new DateTime(),
            ]);
        }
    }
}
