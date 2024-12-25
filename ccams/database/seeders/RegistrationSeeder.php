<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('registrations')->insert([
            // John Doe's registrations
            ['user_id' => 1, 'club_id' => 1, 'club_type' => 'Persatuan'], // Bahasa Melayu
            ['user_id' => 1, 'club_id' => 17, 'club_type' => 'Permainan'], // Bola Sepak
            ['user_id' => 1, 'club_id' => 29, 'club_type' => 'Unit Beruniform'], // Kadet Polis

            // Jane Smith's registrations
            ['user_id' => 2, 'club_id' => 2, 'club_type' => 'Persatuan'], // Rukun Negara
            ['user_id' => 2, 'club_id' => 18, 'club_type' => 'Permainan'], // Badminton
            ['user_id' => 2, 'club_id' => 30, 'club_type' => 'Unit Beruniform'], // PBSM

            // Ahmad Ali's registrations
            ['user_id' => 3, 'club_id' => 3, 'club_type' => 'Persatuan'], // Robotik
            ['user_id' => 3, 'club_id' => 19, 'club_type' => 'Permainan'], // Petanque
            ['user_id' => 3, 'club_id' => 31, 'club_type' => 'Unit Beruniform'], // Kadet Remaja Sekolah

            // Lisa Wong's registrations
            ['user_id' => 4, 'club_id' => 4, 'club_type' => 'Persatuan'], // Bahasa Inggeris
            ['user_id' => 4, 'club_id' => 20, 'club_type' => 'Permainan'], // Bola Jaring
            ['user_id' => 4, 'club_id' => 32, 'club_type' => 'Unit Beruniform'], // Kadet Bomba

            // Ali Hassan's registrations
            ['user_id' => 5, 'club_id' => 5, 'club_type' => 'Persatuan'], // Bahasa Cina
            ['user_id' => 5, 'club_id' => 21, 'club_type' => 'Permainan'], // Bola Keranjang
            ['user_id' => 5, 'club_id' => 33, 'club_type' => 'Unit Beruniform'], // Kadet Pertahanan Awam

            // Nur Amirah's registrations
            ['user_id' => 6, 'club_id' => 3, 'club_type' => 'Persatuan'], // Kelab Robotik
            ['user_id' => 6, 'club_id' => 22, 'club_type' => 'Permainan'], // Bola Tampar
            ['user_id' => 6, 'club_id' => 34, 'club_type' => 'Unit Beruniform'], // Pengakap

            // Teachers (as members of clubs)
            ['user_id' => 7, 'club_id' => 3, 'club_type' => 'Persatuan'], // Kelab Robotik
            ['user_id' => 7, 'club_id' => 22, 'club_type' => 'Permainan'], // Bola Tampar
            ['user_id' => 7, 'club_id' => 34, 'club_type' => 'Unit Beruniform'], // Pengakap

            ['user_id' => 8, 'club_id' => 2, 'club_type' => 'Persatuan'], // Kelab Rukun Negara
            ['user_id' => 8, 'club_id' => 23, 'club_type' => 'Permainan'], // Dodgeball
            ['user_id' => 8, 'club_id' => 35, 'club_type' => 'Unit Beruniform'], // Pandu Puteri

            ['user_id' => 9, 'club_id' => 8, 'club_type' => 'Persatuan'], // Kelab Sejarah
            ['user_id' => 9, 'club_id' => 24, 'club_type' => 'Permainan'], // Ping Pong
            ['user_id' => 9, 'club_id' => 36, 'club_type' => 'Unit Beruniform'], // Puteri Islam

            ['user_id' => 10, 'club_id' => 8, 'club_type' => 'Persatuan'], // Kelab Sejarah
            ['user_id' => 10, 'club_id' => 24, 'club_type' => 'Permainan'], // Ping Pong
            ['user_id' => 10, 'club_id' => 36, 'club_type' => 'Unit Beruniform'], // Puteri Islam
        ]);
    }
}
