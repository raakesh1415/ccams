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

            ['club_name' => 'Persatuan Bahasa Inggeris', 
            'club_description' => 'Meningkatkan penguasaan Bahasa Inggeris.', 
            'participant_total' => 139, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/persatuanbahasainggeris.jpg'],

             ['club_name' => 'Persatuan Bahasa Cina', 
            'club_description' => 'Meningkatkan penguasaan Bahasa Cina.', 
            'participant_total' => 139, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/persatuanbahasacina.jpg'],

            ['club_name' => 'Persatuan Bahasa Tamil', 
            'club_description' => 'Meningkatkan penguasaan Bahasa Tamil.', 
            'participant_total' => 137, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/persatuanbahasatamil.jpeg'],

            ['club_name' => 'Kelab STEM', 
            'club_description' => 'Meningkatkan penguasaan bidang STEM.', 
            'participant_total' => 137, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/kelabstem.png'],

            ['club_name' => 'Kelab Sejarah', 
            'club_description' => 'Meningkatkan penguasaan Sejarah.', 
            'participant_total' => 137, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/kelabsejarah.jpeg'],

            ['club_name' => 'Persatuan Pendidikan Islam', 
            'club_description' => 'Meningkatkan penguasaan Pendidikan Islam.', 
            'participant_total' => 137, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/persatuanpendidikanislam.jpeg'],

            ['club_name' => 'Kelab Kebudayaan', 
            'club_description' => 'Meningkatkan penguasaan kebudayaan Malaysia.', 
            'participant_total' => 137, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/kelabkebudayaan.jpeg'],

            ['club_name' => 'Kelab Kerjaya', 
            'club_description' => 'Meningkatkan penguasaan tentang kerjaya akan datang.', 
            'participant_total' => 137, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/kelabkerjaya.jpg'],

            ['club_name' => 'Kelab Inovasi/Rekacipta', 
            'club_description' => 'Meningkatkan penguasaan tentang inovasi dan rekacipta.', 
            'participant_total' => 137, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/kelabinovasirekacipta.jpg'],
            
            ['club_name' => 'Persatuan Koperasi Sekolah', 
            'club_description' => 'Memberi peluang kepada pelajar untuk mengendalikan koperasi sekolah.', 
            'participant_total' => 137, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/persatuankoperasisekolah.png'],

            ['club_name' => 'Kelab Pencinta Alam', 
            'club_description' => 'Menjaga Alam Sekita tanggungjawab bersama.', 
            'participant_total' => 137, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/kelabpencintaalam.jpeg'],
            
            ['club_name' => 'Kelab Pencinta Alam', 
            'club_description' => 'Bersama mencegah jenayah.', 
            'participant_total' => 137, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/kelabpencegahanjenayah.jpg'],

            ['club_name' => 'Kelab Kemahiran Al Quran', 
            'club_description' => 'Bersama mencegah jenayah.', 
            'participant_total' => 137, 
            'club_category' => 'Kelab / Persatuan', 
            'club_pic' => 'club_pics/kelabkemahiranalquran.jpeg'],

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
            
            ['club_name' => 'Bola Jaring', 
            'club_description' => 'Memahirkan teknik permainan Bola Jaring.', 
            'participant_total' => 80, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/bolajaring.jpg'],

            ['club_name' => 'Bola Keranjang', 
            'club_description' => 'Memahirkan teknik permainan Bola Keranjang.', 
            'participant_total' => 80, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/bolakeranjang.jpg'],

            ['club_name' => 'Bola Tampar', 
            'club_description' => 'Memahirkan teknik permainan Bola Tampar.', 
            'participant_total' => 80, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/bolatampar.jpeg'],

            ['club_name' => 'Dodgeball', 
            'club_description' => 'Memahirkan teknik permainan Dodgeball.', 
            'participant_total' => 80, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/dodgeball.jpg'],

            ['club_name' => 'Ping Pong', 
            'club_description' => 'Memahirkan teknik permainan Ping Pong.', 
            'participant_total' => 80, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/pingpong.jpg'],

            ['club_name' => 'Sepak Takraw', 
            'club_description' => 'Memahirkan teknik permainan Sepak Takraw', 
            'participant_total' => 80, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/sepaktakraw.jpeg'],

            ['club_name' => 'Catur', 
            'club_description' => 'Memahirkan teknik permainan Catur', 
            'participant_total' => 80, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/catur.jpeg'],

            ['club_name' => 'Kabaddi', 
            'club_description' => 'Memahirkan teknik permainan Kabaddi', 
            'participant_total' => 80, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/kabaddi.jpg'],

            ['club_name' => 'Bola Baling', 
            'club_description' => 'Memahirkan teknik permainan Bola Baling', 
            'participant_total' => 80, 
            'club_category' => 'Sukan / Permainan', 
            'club_pic' => 'club_pics/bolabaling.jpg'],

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

            ['club_name' => 'Kadet Bomba dan Penyelamat', 
            'club_description' => 'Latihan ketahanan.', 
            'participant_total' => 18, 
            'club_category' => 'Unit Beruniform', 
            'club_pic' => 'club_pics/kadetbombadanpenyelamat.png'],

            ['club_name' => 'Kadet Pertahanan Awam', 
            'club_description' => 'Latihan ketahanan.', 
            'participant_total' => 18, 
            'club_category' => 'Unit Beruniform', 
            'club_pic' => 'club_pics/kadetpertahananawam.jpg'],

            ['club_name' => 'Pengakap', 
            'club_description' => 'Latihan ketahanan.', 
            'participant_total' => 18, 
            'club_category' => 'Unit Beruniform', 
            'club_pic' => 'club_pics/pengakap.jpg'],

            ['club_name' => 'Pandu Puteri', 
            'club_description' => 'Latihan ketahanan.', 
            'participant_total' => 18, 
            'club_category' => 'Unit Beruniform', 
            'club_pic' => 'club_pics/panduputeri.png'],

            ['club_name' => 'Puteri Islam', 
            'club_description' => 'Latihan ketahanan.', 
            'participant_total' => 18, 
            'club_category' => 'Unit Beruniform', 
            'club_pic' => 'club_pics/puteriislam.png'],
        ];

        // Insert data into the database
        foreach ($clubs as $clubs) {
            DB::table('clubs')->insert([
                'club_name' => $clubs['club_name'],
                'club_description' => $clubs['club_description'],
                'participant_total' => $clubs['participant_total'],
                'club_category' => $clubs['club_category'],
                'club_pic' => $clubs['club_pic'], // Store the file name
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
