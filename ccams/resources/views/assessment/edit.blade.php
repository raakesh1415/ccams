<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Edit Penilaian untuk Kelab {{ $club->club_name }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('assessment.update', ['assessment_id' => $assessment->assessment_id]) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Bahagian Pelajar -->
                    <h3 class="mb-3">Butiran Pelajar</h3>
                    <div class="row mb-3">
                        <div class="col-md-4 mb-2">
                            <label for="user_id" class="form-label">Pilih Pelajar:</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="">-- Pilih Pelajar --</option>
                                @if($assessment->user)
                                    <option value="{{ $assessment->user->id }}" selected>
                                        {{ $assessment->user->name }} (Semasa)
                                    </option>
                                @endif
                                @foreach($users as $registration)
                                    @if ($registration->user && $registration->user->id !== $assessment->user_id)
                                        <option value="{{ $registration->user->id }}">
                                            {{ $registration->user->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <!-- Bahagian Kelab -->
                            <input type="hidden" class="form-control" id="club_id" name="club_id" value="{{ $club->club_id }}">
                        </div>     
                    </div>

                    <hr>

                    <!-- Bahagian Jawatan -->
                    <h3 class="mb-3">Jawatan <small class="text-muted">/ 10</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="president" value="Pengerusi" 
                                    {{ $assessment->position === 'Pengerusi' ? 'checked' : '' }}>
                                <label class="form-check-label" for="president">Pengerusi (10)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="vicePresident" value="Naib Pengerusi" 
                                    {{ $assessment->position === 'Naib Pengerusi' ? 'checked' : '' }}>
                                <label class="form-check-label" for="vicePresident">Naib Pengerusi (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="secretary" value="Setiausaha" 
                                    {{ $assessment->position === 'Setiausaha' ? 'checked' : '' }}>
                                <label class="form-check-label" for="secretary">Setiausaha (8)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="treasurer" value="Bendahari" 
                                    {{ $assessment->position === 'Bendahari' ? 'checked' : '' }}>
                                <label class="form-check-label" for="treasurer">Bendahari (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="viceSecretary" value="Naib Setiausaha" 
                                    {{ $assessment->position === 'Naib Setiausaha' ? 'checked' : '' }}>
                                <label class="form-check-label" for="viceSecretary">Naib Setiausaha (6)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="viceTreasurer" value="Naib Bendahari" 
                                    {{ $assessment->position === 'Naib Bendahari' ? 'checked' : '' }}>
                                <label class="form-check-label" for="viceTreasurer">Naib Bendahari (6)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="ajk" value="AJK" 
                                    {{ $assessment->position === 'AJK' ? 'checked ' : '' }}>
                                <label class="form-check-label" for="ajk">AJK (6)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="activeMember" value="Ahli Aktif" 
                                    {{ $assessment->position === 'Ahli Aktif' ? 'checked' : '' }}>
                                <label class="form-check-label" for="activeMember">Ahli Aktif (4)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="ordinaryMember" value="Ahli Biasa" 
                                    {{ $assessment->position === 'Ahli Biasa' ? 'checked' : '' }}>
                                <label class="form-check-label" for="ordinaryMember">Ahli Biasa (2)</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Bahagian Tahap Penglibatan -->
                    <h3 class="mb-3">Peringkat Penglibatan <small class="text-muted">/ 20</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <h4 class="h5">Penglibatan 1</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1International" value="I1" 
                                    {{ is_array($assessment->engagement) && in_array('I1', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng1International">Antarabangsa (20)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1National" value="N1"
                                    {{ is_array($assessment->engagement) && in_array('N1', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng1National">Kebangsaan (17)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1Country" value="C1"
                                    {{ is_array($assessment->engagement) && in_array('C1', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng1Country">Negari (14)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1District" value="D1"
                                    {{ is_array($assessment->engagement) && in_array('D1', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng1District">Daerah/Zon (11)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1School" value="S1"
                                    {{ is_array($assessment->engagement) && in_array('S1', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng1School">Sekolah/Tiada (0)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="h5">Penglibatan 2</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2International" value="I2"
                                    {{ is_array($assessment->engagement) && in_array('I2', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng2International">Antarabangsa (15)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2National" value="N2"
                                    {{ is_array($assessment->engagement) && in_array('N2', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng2National">Kebangsaan (12)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2Country" value="C2"
                                    {{ is_array($assessment->engagement) && in_array('C2', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng2Country">Negari (10)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2District" value="D2"
                                    {{ is_array($assessment->engagement) && in_array('D2', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng2District">Daerah/Zon (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2School" value="S2"
                                    {{ is_array($assessment->engagement) && in_array('S2', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng2School">Sekolah/Tiada (0)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="h5">Penglibatan 3</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3International" value="I3"
                                    {{ is_array($assessment->engagement) && in_array('I3', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng3International">Antarabangsa (10)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3National" value="N3"
                                    {{ is_array($assessment->engagement) && in_array('N3', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng3National">Kebangsaan (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3Country" value="C3"
                                    {{ is_array($assessment->engagement) && in_array('C3', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng3Country">Negari (6)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3District" value="D3"
                                    {{ is_array($assessment->engagement) && in_array('D3', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng3District">Daerah/Zon (4)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3School" value="S3"
                                    {{ is_array($assessment->engagement) && in_array('S3', $assessment->engagement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="eng3School">Sekolah/Tiada (0)</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Bahagian Tahap Pencapaian -->
                    <h3 class="mb-3">Tahap Pencapaian <small class="text-muted">/ 20</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <h4 class="h5">Penglibatan</h4>
                            <p class="mb-0">Antarabangsa</p>
                            <p class="mb-0">Kebangsaan</p>
                            <p class="mb-0">Negari</p>
                            <p class="mb-0">Daerah / Zon</p>
                            <p class="mb-0">Sekolah</p>
                        </div>
                        <div class="col-md-3">
                            <h4 class="h5">Johan</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champInt" value="IC"
                                    {{ is_array($assessment->achievement) && in_array('IC', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="champInt">20</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champNat" value="NC"
                                    {{ is_array($assessment->achievement) && in_array('NC', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="champNat">17</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champCountry" value="CC"
                                    {{ is_array($assessment->achievement) && in_array('CC', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="champCountry">14</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champDist" value="DC"
                                    {{ is_array($assessment->achievement) && in_array('DC', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="champDist">11</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champSchool" value="SC"
                                    {{ is_array($assessment->achievement) && in_array('SC', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="champSchool">8</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="h5">Naib Johan</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp1Int" value="I1"
                                    {{ is_array($assessment->achievement) && in_array('I1', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="runnerUp1Int">19</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp1Nat" value="N1"
                                    {{ is_array($assessment->achievement) && in_array('N1', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="runnerUp1Nat">16</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp1Country" value="C1"
                                    {{ is_array($assessment->achievement) && in_array('C1', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="runnerUp1Country">13</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp1Dist" value="D1"
                                    {{ is_array($assessment->achievement) && in_array('D1', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="runnerUp1Dist">10</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp1School" value="S1"
                                    {{ is_array($assessment->achievement) && in_array('S1', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="runnerUp1School">7</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="h5">Ketiga</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp2Int" value="I2"
                                    {{ is_array($assessment->achievement) && in_array('I2', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="runnerUp2Int">18</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox ```html
                                " name="achievement[]" id="runnerUp2Nat" value="N2"
                                    {{ is_array($assessment->achievement) && in_array('N2', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="runnerUp2Nat">15</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp2Country" value="C2"
                                    {{ is_array($assessment->achievement) && in_array('C2', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="runnerUp2Country">12</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp2Dist" value="D2"
                                    {{ is_array($assessment->achievement) && in_array('D2', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="runnerUp2Dist">9</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp2School" value="S2"
                                    {{ is_array($assessment->achievement) && in_array('S2', $assessment->achievement) ? 'checked' : '' }}>
                                <label class="form-check-label" for="runnerUp2School">6</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Bahagian Komitmen -->
                    <h3 class="mb-3">Komitmen <small class="text-muted">/ 10</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="leadership" value="C1"
                                    {{ is_array($assessment->commitment) && in_array('C1', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="leadership">Menunjukkan kepimpinan (3)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="manageActivities" value="C2"
                                    {{ is_array($assessment->commitment) && in_array('C2', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="manageActivities">Menguruskan aktiviti (3)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="helpTeachers" value="C3"
                                    {{ is_array($assessment->commitment) && in_array('C3', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="helpTeachers">Membantu guru/rakan (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="provideEquipment" value="C4"
                                    {{ is_array($assessment->commitment) && in_array('C4', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="provideEquipment">Menyediakan peralatan (2)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="cleanArea" value="C5"
                                    {{ is_array($assessment->commitment) && in_array('C5', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="cleanArea">Membersihkan kawasan (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="punctual" value="C6"
                                    {{ is_array($assessment->commitment) && in_array('C6', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="punctual">Tepat pada masa (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="showInterest" value="C7"
                                    {{ is_array($assessment->commitment) && in_array('C7', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="showInterest">Menunjukkan minat (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="showSeriousness" value="C8"
                                    {{ is_array($assessment->commitment) && in_array('C8', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="showSeriousness">Menunjukkan kesungguhan (2)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="followInstructions" value="C9"
                                    {{ is_array($assessment->commitment) && in_array('C9', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="followInstructions">Mengikuti arahan (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="trying" value="C10"
                                    {{ is_array($assessment->commitment) && in_array('C10', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="trying">Mencuba (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="giveCooperation" value="C11"
                                    {{ is_array($assessment->commitment) && in_array('C11', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="giveCooperation">Memberi kerjasama (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="observableValue" value="C12"
                                    {{ is_array($assessment->commitment) && in_array('C12', $assessment->commitment) ? 'checked' : '' }}>
                                <label class="form-check-label" for="observableValue">Sebarang nilai murni yang dapat dilihat (2)</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Bahagian Sumbangan Perkhidmatan -->
                    <h3 class="mb-3">Khidmat Sumbangan (Peringkat Sekolah) <small class="text-muted">/ 10</small></h3>
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs1" value="CS1"
                                {{ is_array($assessment->contribution) && in_array('CS1', $assessment->contribution) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cs1">Murid yang didaftarkan sebagai peserta program / kejohanan / pertandingan / karnival / kursus (10)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs2" value="CS2"
                                {{ is_array($assessment->contribution) && in_array('CS2', $assessment->contribution) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cs2">Melibatkan kemahiran khusus-hakim / pengadil, jurulatih pasukan / aspek teknikal (10)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs3" value="CS3"
                                {{ is_array($assessment->contribution) && in_array('CS3', $assessment->contribution) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cs3">Penglibatan murid yang terlibat dalam aktiviti seperti persembahan selingan (8)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs4" value="CS4"
                                {{ is_array($assessment->contribution) && in_array('CS4', $assessment->contribution) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cs4">Membantu dari segi menjayakan aktiviti unit seperti mengambil bahagian dalam persembahan, kumpulan sorak dan yang berkaitan (5)</label>
                        </div>
                    </div>
                    <hr>

                    <!-- Bahagian Kehadiran dan Komen -->
                    <h3 class="mb-3">Kehadiran & Komen <small class="text-muted">/ 40</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-2">
                            <label for="attendance" class="form-label">Kehadiran:</label>
                            <input type="text" class="form-control" id="attendance" name="attendance" value="{{ $assessment->attendance }}">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="comment" class="form-label">Komen:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="1" placeholder="Masukkan komen anda di sini">{{ $assessment->comment }}</textarea>
                        </div>
                    </div>

                    <!-- Butang Hantar -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Kemas Kini Penilaian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .form-check-input:checked {
            background-color: #343a40; /* Warna latar belakang gelap */
            border-color: #343a40; /* Warna sempadan gelap */
        }
        
        .form-check-input:checked:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.25); /* Bayangan fokus pilihan */
        }
    </style>
</x-layout>