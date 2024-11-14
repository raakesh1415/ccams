<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create 10 students
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password123'), // You can change the password here
            'ic' => '02102412931',
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'janesmith@example.com',
            'password' => bcrypt('password123'), // You can change the password here
            'ic' => '4398438232',
            'role' => 'student',
        ]);

        // Add more students as needed
        User::create([
            'name' => 'Mark Johnson',
            'email' => 'markjohnson@example.com',
            'password' => bcrypt('password123'),
            'ic' => '5433535341',
            'role' => 'student',
        ]);

        // You can use a loop to generate more students if you need
        User::factory(10)->create([
            'role' => 'student',  // Assuming you're using factories
        ]);
    }
}
