<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Club;
use App\Models\Registration;
use Carbon\Carbon;

class AutoAssignClub extends Command
{
    protected $signature = 'clubs:auto-assign';
    protected $description = 'Automatically assign students to clubs with free seating after registration deadline.';

    public function handle()
    {
        $this->info("Auto-assigning clubs to unregistered students...");

        // Step 1: Check the registration deadline
        $deadline = env('CLUB_REGISTRATION_DEADLINE');
        if (Carbon::now()->lt(Carbon::parse($deadline))) {
            $this->info("Deadline not reached. Skipping auto-assignment.");
            return;
        }

        // Step 2: Find unregistered students
        $unregisteredStudents = User::whereDoesntHave('registrations')->get();

        if ($unregisteredStudents->isEmpty()) {
            $this->info("All students are already registered.");
            return;
        }

        // Step 3: Find clubs with free seating
        $availableClubs = Club::withCount('registrations')
            ->having('capacity', '>', 'registrations_count')
            ->get();

        if ($availableClubs->isEmpty()) {
            $this->error("No clubs with free seating available.");
            return;
        }

        // Step 4: Assign students to clubs
        foreach ($unregisteredStudents as $student) {
            $club = $availableClubs->random();

            Registration::create([
                'user_id' => $student->id,
                'club_id' => $club->id,
            ]);

            $this->info("Student ID {$student->id} assigned to Club ID {$club->id}");
        }

        $this->info("Auto-assignment completed successfully!");
    }
}
