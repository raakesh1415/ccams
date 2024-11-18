<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Updated clubs with the specified names and images
        $clubs = [
            // Kelab/Persatuan
            ['club_name' => 'Persatuan Bahasa Melayu', 
            'club_description' => 'Meningkatkan penguasaan Bahasa Melayu.', 
            'participant_total' => 123, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/bahasa_melayu.png'],

            ['club_name' => 'Kelab Rukun Negara', 
            'club_description' => 'Menghayati prinsip Rukun Negara.', 
            'participant_total' => 100, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/kelab_rukun_negara.jpeg'],

            ['club_name' => 'Kelab Robotik', 
            'club_description' => 'Menguasai teknologi robotik.', 
            'participant_total' => 150, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/robotik.jpg'],

            //Sukan/Permainan
            ['club_name' => 'Bola Sepak', 
            'club_description' => 'Latihan fizikal dan strategi.', 
            'participant_total' => 200, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/bola_sepak.jpg'],

            ['club_name' => 'Badminton', 
            'club_description' => 'Menguasai kemahiran badminton.', 
            'participant_total' => 150, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/badminton.jpeg'],

            ['club_name' => 'Petanque', 
            'club_description' => 'Memahirkan teknik permainan petanque.', 
            'participant_total' => 80, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/petanque.jpg'],

            //Unit Beruniform
            ['club_name' => 'Kadet Polis', 
            'club_description' => 'Disiplin dan patriotisme.', 
            'participant_total' => 25, 
            'club_category' => 'Unit Beruniform', 
            'club_pic' => 'club_pics/kadet_polis.jpeg'],

            ['club_name' => 'PBSM', 
            'club_description' => 'Bantuan kecemasan.', 
            'participant_total' => 20, 
            'club_category' => 'Unit Beruniform', 
            'club_pic' => 'club_pics/pbsm.jpg'],

            ['club_name' => 'Kadet Remaja Sekolah', 
            'club_description' => 'Latihan ketahanan.', 
            'participant_total' => 18, 
            'club_category' => 'Unit Beruniform', 
            'club_pic' => 'club_pics/kadet_remaja.jpg'],
        ];

        // Insert data into the database
        foreach ($clubs as $club) {
            DB::table('club')->insert([
                'club_name' => $club['club_name'],
                'club_description' => $club['club_description'],
                'participant_total' => $club['participant_total'],
                'club_category' => $club['club_category'],
                'club_pic' => $club['club_pic'], // Store the file name
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

//      You guys can seed the club table. Just copy the image inside the 'public\sample_images' into 'public/storage/club_pics' folder. then run command:
//      php artisan db:seed --class=ClubSeeder
//      If error, make sure to link the storage first by running
//      php artisan storage:link
    }
}
