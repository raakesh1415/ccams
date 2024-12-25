<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // Students
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'ic' => '123456789012',
                'role' => 'student',
                'classroom' => '1 CARNATION',
                'last_login_at' => Carbon::now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'ic' => '987654321098',
                'role' => 'student',
                'classroom' => '2 LAVENDER',
                'last_login_at' => Carbon::now(),
            ],
            [
                'name' => 'Ahmad Ali',
                'email' => 'ahmad.ali@example.com',
                'password' => Hash::make('password123'),
                'ic' => '123123123123',
                'role' => 'student',
                'classroom' => '3 ORCHID',
                'last_login_at' => Carbon::now(),
            ],
            [
                'name' => 'Lisa Wong',
                'email' => 'lisa.wong@example.com',
                'password' => Hash::make('password123'),
                'ic' => '444555666777',
                'role' => 'student',
                'classroom' => '4 AL AWWAM',
                'last_login_at' => Carbon::now(),
            ],
            [
                'name' => 'Ali Hassan',
                'email' => 'ali.hassan@example.com',
                'password' => Hash::make('password123'),
                'ic' => '555666777888',
                'role' => 'student',
                'classroom' => '5 DAISY',
                'last_login_at' => Carbon::now(),
            ],
            [
                'name' => 'Nur Amirah',
                'email' => 'nuramierah130802@gmail.com',
                'password' => Hash::make('Gsjhii9oZ5v^p7'),
                'ic' => '020813060451',
                'role' => 'student',
                'classroom' => '5 IBNU SINA',
                'last_login_at' => Carbon::now(),
            ],
            // Teachers
            [
                'name' => 'Erfan Syabil',
                'email' => 'muhderfan2610@gmail.com',
                'password' => Hash::make('kiLR6b&%M'),
                'ic' => '021026060451',
                'role' => 'teacher',
                'classroom' => '5 IBNU SINA',
                'last_login_at' => Carbon::now(),
            ],
            [
                'name' => 'Mr. Tan',
                'email' => 'mr.tan@example.com',
                'password' => Hash::make('password123'),
                'ic' => '111222333444',
                'role' => 'teacher',
                'classroom' => '4 AL FATEH',
                'last_login_at' => Carbon::now(),
            ],
            [
                'name' => 'Ms. Lee',
                'email' => 'ms.lee@example.com',
                'password' => Hash::make('password123'),
                'ic' => '222333444555',
                'role' => 'teacher',
                'classroom' => '4 ARISTOTLE',
                'last_login_at' => Carbon::now(),
            ],
            [
                'name' => 'Mr. Wong',
                'email' => 'mr.wong@example.com',
                'password' => Hash::make('password123'),
                'ic' => '333444555666',
                'role' => 'teacher',
                'classroom' => '4 IBNU SINA',
                'last_login_at' => Carbon::now(),
            ],
        ]);
    }
}
