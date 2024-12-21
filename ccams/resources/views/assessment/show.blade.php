<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Butiran Penilaian - {{ $user->name }}</h3>
            </div>
            <div class="card-body">
                <h4 class="card-title pb-3">Butiran Pelajar</h4>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nama:</strong> {{ $user->name }}</p>
                        <p><strong>No IC:</strong> {{ $user->ic }}</p> 
                        <p><strong>Tahun:</strong> 2024</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Alamat:</strong> {{ $user->address }}</p> 
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Kelas:</strong> {{ $user->classroom }}</p> 
                    </div>
                </div>

                <hr>

                <h4 class="card-title pb-3">Kategori Penilaian</h4>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Jawatan:</strong> {{ $assessment->position }} 
                                @switch($assessment->position)
                                        @case('Pengerusi')
                                            (10)
                                            @break
                                        @case('Naib Pengerusi')
                                            (8)
                                            @break
                                        @case('Setiausaha')
                                            (8)
                                            @break
                                        @case('Bendahari')
                                            (8)
                                            @break
                                        @case('Naib Setiausaha')
                                            (6)
                                            @break
                                        @case('Naib Bendahari')
                                            (6)
                                            @break
                                        @case('AJK')
                                            (6)
                                            @break
                                        @case('Ahli Aktif')
                                            (4)
                                            @break
                                        @case('Ahli Biasa')
                                            (2)
                                            @break
                                        @default
                                            Tidak Diketahui
                                    @endswitch
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Kehadiran:</strong> {{ $assessment->attendance }} / 12 ({{ round(($assessment->attendance / 12) * 40) }})</p>
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Peringkat Penglibatan:</strong></p>
                        <ul>
                            @foreach ($assessment->engagement as $engagement)
                                <li>
                                    @switch($engagement)
                                        @case('I1')
                                            Tahap Antarabangsa (20)
                                            @break
                                        @case('N1')
                                            Tahap Kebangsaan (17)
                                            @break
                                        @case('C1')
                                            Tahap Negeri (14)
                                            @break
                                        @case('D1')
                                            Tahap Daerah/Zon (11)
                                            @break
                                        @case('S1')
                                            Tahap Sekolah/Tiada (0)
                                            @break
                                        @case('I2')
                                            Tahap Antarabangsa (15)
                                            @break
                                        @case('N2')
                                            Tahap Kebangsaan (12)
                                            @break
                                        @case('C2')
                                            Tahap Negeri (10)
                                            @break
                                        @case('D2')
                                            Tahap Daerah/Zon (8)
                                            @break
                                        @case('S2')
                                            Tahap Sekolah/Tiada (0)
                                            @break
                                        @case('I3')
                                            Tahap Antarabangsa (10)
                                            @break
                                        @case('N3')
                                            Tahap Kebangsaan (8)
                                            @break
                                        @case('C3')
                                            Tahap Negeri (6)
                                            @break
                                        @case('D3')
                                            Tahap Daerah/Zon (4)
                                            @break
                                        @case('S3')
                                            Tahap Sekolah/Tiada (0)
                                            @break
                                        @default
                                            Tidak Diketahui
                                    @endswitch
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Tahap Pencapaian:</strong></p>
                        <ul>
                            @foreach ($assessment->achievement as $achievement)
                                <li>
                                    @switch($achievement)
                                        @case('IC')
                                            Johan - Tahap Antarabangsa (20)
                                            @break
                                        @case('NC')
                                            Johan - Tahap Kebangsaan (17)
                                            @break
                                        @case('CC')
                                            Johan - Tahap Negeri (14)
                                            @break
                                        @case('DC')
                                            Johan - Tahap Daerah/Zon (11)
                                            @break
                                        @case('SC')
                                            Johan - Tahap Sekolah/Tiada (0)
                                            @break
                                        @case('I1')
                                            Naib Johan - Tahap Antarabangsa (15)
                                            @break
                                        @case('N1')
                                            Naib Johan - Tahap Kebangsaan (12)
                                            @break
                                        @case('C1')
                                            Naib Johan - Tahap Negeri (10)
                                            @break
                                        @case('D1')
                                            Naib Johan - Tahap Daerah/Zon (8)
                                            @break
                                        @case('S1')
                                            Naib Johan - Tahap Sekolah/Tiada (0)
                                            @break
                                        @case('I2')
                                            Ketiga - Tahap Antarabangsa (10)
                                            @break
                                        @case('N2')
                                            Ketiga - Tahap Kebangsaan (8)
                                            @break
                                        @case('C2')
                                            Ketiga - Tahap Negeri (6)
                                            @break
                                        @case('D2')
                                            Ketiga - Tahap Daerah/Zon (4)
                                            @break
                                        @case('S2')
                                            Ketiga - Tahap Sekolah/Tiada (0)
                                            @break
                                        @default
                                            Tidak Diketahui
                                    @endswitch
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Komitmen:</strong></p>
                        <ul class="row">
                            @foreach ($assessment->commitment as $commitment)
                                <div class="col-md-6">
                                    <li>
                                        @switch($commitment)
                                            @case('C1')
                                                Menunjukkan kepimpinan (3)
                                                @break
                                            @case('C2')
                                                Mengurus aktiviti (3)
                                                @break
                                            @case('C3')
                                                Membantu guru/rakan (2)
                                                @break
                                            @case('C4')
                                                Menyediakan peralatan (2)
                                                @break
                                            @case('C5')
                                                Membersihkan kawasan (2)
                                                @break
                                            @case('C6')
                                                Tepat pada masanya (2)
                                                @break
                                            @case('C7')
                                                Menunjukkan minat (2)
                                                @break
                                            @case('C8')
                                                Menunjukkan kesungguhan (2)
                                                @break
                                            @case('C9')
                                                Mengikuti arahan (2)
                                                @break
                                            @case('C10')
                                                Mencuba (2)
                                                @break
                                            @case('C11')
                                                Memberi kerjasama (2)
                                                @break
                                            @case('C12')
                                                Sebarang nilai murni yang boleh diperhatikan (2)
                                                @break
                                            @default
                                                Tidak Diketahui
                                        @endswitch
                                    </li>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Khidmatan Sumbangan (Peringkat Sekolah):</strong></p>
                        <ul>
                            @foreach ($assessment->contribution as $contribution)
                                <li>
                                    @switch($contribution)
                                        @case('CS1')
                                            Murid yang didaftarkan sebagai peserta program / kejohanan / pertandingan / karnival / kursus (10)
                                            @break
                                        @case('CS2')
                                            Melibatkan kemahiran khusus-hakim / pengadil, jurulatih pasukan / aspek teknikal (10)
                                            @break
                                        @case('CS3')
                                            Penglibatan murid yang terlibat dalam aktiviti seperti persembahan selingan (8)
                                            @break
                                        @case('CS4')
                                            Membantu dari segi menjayakan aktiviti unit seperti mengambil bahagian dalam persembahan, kumpulan sorak dan yang berkaitan (5)
                                            @break
                                        @default
                                            Tidak Diketahui
                                    @endswitch
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Ulasan:</strong> {{ $assessment->comment }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Jumlah Markah:</strong> {{ $assessment-> total_mark }}%</p>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</x-layout>