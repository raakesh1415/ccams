<x-layout>
    <div class="container-fluid">
        <div class="row align-items-center mb-3">
            <div class="col-auto pr-0">
                <a href="{{ url()->previous() }}" class="btn btn-dark">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="col text-center px-0">
                <h2 class="text-center">Butiran Penilaian - {{ $student->name }}</h2>
            </div>
        </div>
        
        {{-- <h2 class="text-center mb-4">Butiran Penilaian - {{ $student->name }}</h2> --}}
        <div class="card mb-4">
            <div class="card-header text-center">
                <h4>Butiran Pelajar</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Nama:</strong> {{ $student->name }}</p>
                        <p><strong>No IC:</strong> {{ $student->ic }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Alamat:</strong> {{ $student->address }}</p>
                        <p><strong>Email:</strong> {{ $student->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Tahun:</strong> 2024</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Kelas:</strong> {{ $student->classroom }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if ($permainanAssessment)
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4>Sukan - {{ $student->permainanClub }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Jawatan:</strong> {{ $permainanAssessment->position }}
                                @switch($permainanAssessment->position)
                                    @case('Pengerusi ')
                                        (10)
                                    @break

                                    @case('Naib Pengerusi ')
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
                            <p><strong>Kehadiran:</strong> {{ $permainanAssessment->attendance }} / 12
                                ({{ round(($permainanAssessment->attendance / 12) * 40) }})</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Peringkat Penglibatan:</strong></p>
                            <ul>
                                @if(is_array($permainanAssessment->engagement) || is_object($permainanAssessment->engagement))
                                @foreach ($permainanAssessment->engagement as $engagement)
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
                                @else 
                                    <li>Tidak Diketahui</li> 
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Tahap Pencapaian:</strong></p>
                            <ul>
                                @if(is_array($permainanAssessment->achievement) || is_object($permainanAssessment->achievement))
                                @foreach ($permainanAssessment->achievement as $achievement)
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
                                @else 
                                    <li>Tidak Diketahui</li> 
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Komitmen:</strong></p>
                            <ul class="row">
                                @if(is_array($permainanAssessment->commitment) || is_object($permainanAssessment->commitment))
                                @foreach ($permainanAssessment->commitment as $commitment)
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
                                                    Tepat pada masa (2)
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
                                @else 
                                    <div class="col-md-6">
                                        <li>Tidak Diketahui</li> 
                                    </div>
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Perkhidmatan Sumbangan (Tahap Sekolah):</strong></p>
                            <ul>
                                @if(is_array($permainanAssessment->contribution) || is_object($permainanAssessment->contribution))
                                @foreach ($permainanAssessment->contribution as $contribution)
                                    <li>
                                        @switch($contribution)
                                            @case('CS1')
                                                Murid yang didaftarkan sebagai peserta program / kejohanan / pertandingan / karnival / kursus (10)
                                            @break

                                            @case('CS2')
                                                Melibatkan kemahiran khusus-hakim/pengadil, jurulatih pasukan/aspek teknikal (10)
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
                                @else 
                                    <li>Tidak Diketahui</li> 
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Ulasan:</strong> {{ $permainanAssessment->comment }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Jumlah Markah:</strong> {{ $permainanAssessment->total_mark }}%</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($persatuanAssessment)
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4>Persatuan - {{ $student->persatuanClub }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Jawatan:</strong> {{ $persatuanAssessment->position }}
                                @switch($persatuanAssessment->position)
                                    @case('Pengerusi ')
                                        (10)
                                    @break

                                    @case('Naib Pengerusi ')
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

                                    @case('Active Member')
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
                            <p><strong>Kehadiran:</strong> {{ $persatuanAssessment->attendance }} / 12
                                ({{ round(($persatuanAssessment->attendance / 12) * 40) }})</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Peringkat Penglibatan:</strong></p>
                            <ul>
                                @if(is_array($persatuanAssessment->engagement) || is_object($persatuanAssessment->engagement))
                                @foreach ($persatuanAssessment->engagement as $engagement)
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
                                @else 
                                    <li>Tidak Diketahui</li> 
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Tahap Pencapaian:</strong></p>
                            <ul>
                                @if(is_array($persatuanAssessment->achievement) || is_object($persatuanAssessment->achievement))
                                @foreach ($persatuanAssessment->achievement as $achievement)
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
                                @else 
                                    <li>Tidak Diketahui</li> 
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Komitmen:</strong></p>
                            <ul class="row">
                                @if(is_array($persatuanAssessment->commitment) || is_object($persatuanAssessment->commitment))
                                @foreach ($persatuanAssessment->commitment as $commitment)
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
                                                    Tepat pada masa (2)
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
                                @else 
                                    <div class="col-md-6">
                                        <li>Tidak Diketahui</li> 
                                    </div>
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Perkhidmatan Sumbangan (Peringkat Sekolah):</strong></p>
                            <ul>
                                @if(is_array($persatuanAssessment->contribution) || is_object($persatuanAssessment->contribution))
                                @foreach ($persatuanAssessment->contribution as $contribution)
                                    <li>
                                        @switch($contribution)
                                            @case('CS1')
                                                Murid yang didaftarkan sebagai peserta program / kejohanan / pertandingan / karnival / kursus (10)
                                            @break

                                            @case('CS2')
                                                Melibatkan kemahiran khusus-hakim/pengadil, jurulatih pasukan/aspek teknikal (10)
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
                                @else 
                                    <li>Tidak Diketahui</li> 
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Ulasan:</strong> {{ $persatuanAssessment->comment }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Jumlah Markah:</strong> {{ $persatuanAssessment->total_mark }}%</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($uniformAssessment)
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4>Unit Beruniform - {{ $student->uniformClub }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Jawatan:</strong> {{ $uniformAssessment->position }}
                                @switch($uniformAssessment->position)
                                    @case('Pengerusi ')
                                        (10)
                                    @break

                                    @case('Naib Pengerusi ')
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

                                    @case('Active Member')
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
                            <p><strong>Kehadiran:</strong> {{ $uniformAssessment->attendance }} / 12
                                ({{ round(($uniformAssessment->attendance / 12) * 40) }})</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Peringkat Penglibatan:</strong></p>
                            <ul>
                                @if(is_array($uniformAssessment->engagement) || is_object($uniformAssessment->engagement))
                                @foreach ($uniformAssessment->engagement as $engagement)
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
                                @else 
                                    <li>Tidak Diketahui</li> 
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Tahap Pencapaian:</strong></p>
                            <ul>
                                @if(is_array($uniformAssessment->achievement) || is_object($uniformAssessment->achievement))
                                @foreach ($uniformAssessment->achievement as $achievement)
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
                                @else 
                                    <li>Tidak Diketahui</li> 
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Komitmen:</strong></p>
                            <ul class="row">
                                @if(is_array($uniformAssessment->commitment) || is_object($uniformAssessment->commitment))
                                @foreach ($uniformAssessment->commitment as $commitment)
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
                                                    Tepat pada masa (2)
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
                                @else 
                                    <div class="col-md-6">
                                        <li>Tidak Diketahui</li> 
                                    </div>
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Khidmatan Sumbangan (Peringkat Sekolah):</strong></p>
                            <ul>
                                @if(is_array($uniformAssessment->contribution) || is_object($uniformAssessment->contribution))
                                @foreach ($uniformAssessment->contribution as $contribution)
                                    <li>
                                        @switch($contribution)
                                            @case('CS1')
                                                Murid yang didaftarkan sebagai peserta program / kejohanan / pertandingan / karnival / kursus (10)
                                            @break

                                            @case('CS2')
                                                Melibatkan kemahiran khusus-hakim/pengadil, jurulatih pasukan/aspek teknikal (10)
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
                                @else 
                                    <li>Tidak Diketahui</li> 
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Ulasan:</strong> {{ $uniformAssessment->comment }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Jumlah Markah:</strong> {{ $uniformAssessment->total_mark }}%</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($uniformAssessment == null && $permainanAssessment == null && $persatuanAssessment == null) 
            <h4 class="text-center text-secondary mt-5 pt-4 pl-5">Penilaian Belum Dinilai Lagi</h4>
        @endif

    </div>
</x-layout>
