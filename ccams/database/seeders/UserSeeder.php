<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate 5 students
        for ($i = 1; $i <= 5; $i++) {
            $student = User::create([
                'name' => 'Student ' . $i,
                'email' => 'student' . $i . '@example.com',
                'password' => Hash::make('password123'), // Same password for simplicity
                'ic' => Str::random(12), // Random 12-character string
                'role' => 'student',
            ]);

            echo "Created Student: {$student->email} / Password: password123\n";
        }

        // Generate 5 teachers
        for ($i = 1; $i <= 5; $i++) {
            $teacher = User::create([
                'name' => 'Teacher ' . $i,
                'email' => 'teacher' . $i . '@example.com',
                'password' => Hash::make('password123'), // Same password for simplicity
                'ic' => Str::random(12), // Random 12-character string
                'role' => 'teacher',
            ]);

            echo "Created Teacher: {$teacher->email} / Password: password123\n";
        }

        // Login Credentials
        // student1@example.com
        // password123

        // teacher1@example.com
        // password123
    }
}
