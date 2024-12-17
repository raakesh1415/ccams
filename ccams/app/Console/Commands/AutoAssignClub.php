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

        // Step 2: Find students with role 'student' who haven't registered all club types
        $unregisteredStudents = User::where('role', 'student') // Filter users with role 'student'
            ->whereHas('registrations', function ($query) {
                $query->select('club_type')->distinct();
            }, '<', 3) // Ensure less than 3 club types registered
            ->get();

        if ($unregisteredStudents->isEmpty()) {
            $this->info("All students have already registered for the required club types.");
            return;
        }

        // Step 3: Find clubs with free seating grouped by club type
        $availableClubsByType = Club::withCount('registrations')
            ->having('capacity', '>', 'registrations_count')
            ->get()
            ->groupBy('club_type'); // Group clubs by their type

        if ($availableClubsByType->isEmpty()) {
            $this->error("No clubs with free seating available.");
            return;
        }

        // Step 4: Assign students to clubs
        foreach ($unregisteredStudents as $student) {
            $registeredClubTypes = $student->registrations->pluck('club.club_type')->unique();

            foreach ($availableClubsByType as $clubType => $clubs) {
                // Skip already registered club types
                if ($registeredClubTypes->contains($clubType)) {
                    continue;
                }

                // Pick a random club from the available clubs of the current type
                $club = $clubs->random();

                Registration::create([
                    'user_id' => $student->id,
                    'club_id' => $club->id,
                ]);

                $this->info("Student ID {$student->id} assigned to Club ID {$club->id} (Type: {$clubType})");

                // Update registered club types
                $registeredClubTypes->push($clubType);
            }
        }

        $this->info("Auto-assignment completed successfully!");
    }
}
