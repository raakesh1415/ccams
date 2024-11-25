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
        // Sample users for testing
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password123'),
                'ic' => '123456789012',
                'role' => 'student',
                'about_me' => 'I am a diligent student who loves programming.',
                'profile_pic' => 'profile_pics/johndoe.jpg', // Example file path
                'address' => '123 Main Street',
                'city' => 'Skudai',
                'country' => 'Malaysia',
                'postal_code' => 81310,
                'last_login_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password123'),
                'ic' => '987654321098',
                'role' => 'teacher',
                'about_me' => 'I enjoy teaching co-curricular activities.',
                'profile_pic' => 'profile_pics/janesmith.png', // Example file path
                'address' => '456 Park Avenue',
                'city' => 'Johor Bahru',
                'country' => 'Malaysia',
                'postal_code' => 81200,
                'last_login_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ahmad Ali',
                'email' => 'ahmad.ali@example.com',
                'password' => Hash::make('password123'),
                'ic' => '123123123123',
                'role' => 'student',
                'about_me' => 'A passionate robotics club member.',
                'profile_pic' => 'profile_pics/ahmadali.jpg', // Example file path
                'address' => '789 Garden Lane',
                'city' => 'Ipoh',
                'country' => 'Malaysia',
                'postal_code' => 31400,
                'last_login_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lisa Wong',
                'email' => 'lisa.wong@example.com',
                'password' => Hash::make('password123'),
                'ic' => '444555666777',
                'role' => 'teacher',
                'about_me' => 'I coordinate co-curricular programs.',
                'profile_pic' => 'profile_pics/lisawong.jpg', // Example file path
                'address' => '101 High Street',
                'city' => 'Kuala Lumpur',
                'country' => 'Malaysia',
                'postal_code' => 50000,
                'last_login_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
