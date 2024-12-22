<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Borang Penilaian untuk Kelab {{ $club->club_name }}</h3> <!-- Display the club name -->
            </div>
            <div class="card-body">
                <form action="{{ route('assessment.store', $club_id) }}" method="POST"> @csrf <!-- Bahagian Pelajar -->
                    <h3 class="mb-3">Butiran Pelajar</h3>
                    <div class="row mb-3">
                        <div class="col-md-4 mb-2">
                            {{-- <label for="user_id" class="form-label">Pilih Pelajar:</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="">-- Pilih Pelajar --</option>
                                @forelse ($users as $registration)
                                    @if ($registration->user)
                                        <option value="{{ $registration->user->id }}">{{ $registration->user->name }}</option>
                                    @endif
                                @empty
                                    <option disabled>Tidak ada pelajar yang tersedia untuk dinilai</option>
                                @endforelse
                            </select> --}}
                            {{-- <div class="row mb-3">
                                <div class="col-md-4 mb-2">
                                    <label for="user_name" class="form-label">Nama Pelajar:</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" value="{{ $selectedUser->name }}" readonly>
                                    <input type="hidden" name="user_id" value="{{ $selectedUser->id }}">
                                </div>
                            </div> --}}

                            {{-- <div class="row">
                                <div class="col-md-6"> --}}
                            <input type="hidden" name="user_id" value="{{ $selectedUser->id }}">
                            <p><strong>Nama:</strong> {{ $selectedUser->name }}</p>
                            <p><strong>No IC:</strong> {{ $selectedUser->ic }}</p>
                        </div>
                        <div class="col-md-4 mb-2">
                            <p><strong>Alamat:</strong> {{ $selectedUser->address }}</p>
                            <p><strong>Email:</strong> {{ $selectedUser->email }}</p>
                        </div>
                        <div class="col-md-4 mb-2">
                            <p><strong>Tahun:</strong> 2024</p>
                            <p><strong>Kelas:</strong> {{ $selectedUser->classroom }}</p>
                            <input type="hidden" class="form-control" id="club_id"
                                name="club_id"value="{{ $club->club_id }}">
                        </div>
                    </div>

                    <hr>

                    <!-- Bahagian Jawatan -->
                    <h3 class="mb-3">Jawatan <small class="text-muted">/ 10</small> <span class="text-danger">*</span>
                    </h3>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="Pengerusi"
                                    value="Pengerusi" required>
                                <label class="form-check-label" for="Pengerusi">Pengerusi (10)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="NaibPengerusi"
                                    value="Naib Pengerusi" required>
                                <label class="form-check-label" for="NaibPengerusi">Naib Pengerusi (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="Setiausaha"
                                    value="Setiausaha" required>
                                <label class="form-check-label" for="Setiausaha">Setiausaha (8)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="Bendahari"
                                    value="Bendahari" required>
                                <label class="form-check-label" for="Bendahari">Bendahari (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="NaibSetiausaha"
                                    value="Naib Setiausaha" required>
                                <label class="form-check-label" for="NaibSetiausaha">Naib Setiausaha (6)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="NaibBendahari"
                                    value="Naib Bendahari" required>
                                <label class="form-check-label" for="NaibBendahari">Naib Bendahari (6)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="AJK"
                                    value="AJK" required>
                                <label class="form-check-label" for="AJK">AJK (6)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="AhliAktif"
                                    value="Ahli Aktif" required>
                                <label class="form-check-label" for="AhliAktif">Ahli Aktif (4)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="AhliBiasa"
                                    value="Ahli Biasa" required>
                                <label class="form-check-label" for="AhliBiasa">Ahli Biasa (2)</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Bahagian Peringkat Penglibatan -->
                    <h3 class="mb-3">Peringkat Penglibatan <small class="text-muted">/ 20</small> </h3>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <h4 class="h5">Penglibatan 1</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]"
                                    id="eng1International" value="I1">
                                <label class="form-check-label" for="eng1International">Antarabangsa (20)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]"
                                    id="eng1National" value="N1">
                                <label class="form-check-label" for="eng1National">Kebangsaan (17)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1Country"
                                    value="C1">
                                <label class="form-check-label" for="eng1Country">Negara (14)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]"
                                    id="eng1District" value="D1">
                                <label class="form-check-label" for="eng1District">Daerah/Zon (11)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1School"
                                    value="S1">
                                <label class="form-check-label" for="eng1School">Sekolah/Tiada (0)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="h5">Penglibatan 2</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]"
                                    id="eng2International" value="I2">
                                <label class="form-check-label" for="eng2International">Antarabangsa (15)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]"
                                    id="eng2National" value="N2">
                                <label class="form-check-label" for="eng2National">Kebangsaan (12)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2Country"
                                    value="C2">
                                <label class="form-check-label" for="eng2Country">Negara (10)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]"
                                    id="eng2District" value="D2">
                                <label class="form-check-label" for="eng2District">Daerah/Zon (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2School"
                                    value="S2">
                                <label class="form-check-label" for="eng2School">Sekolah/Tiada (0)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="h5">Penglibatan 3</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]"
                                    id="eng3International" value="I3">
                                <label class="form-check-label" for="eng3International">Antarabangsa (10)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]"
                                    id="eng3National" value="N3">
                                <label class="form-check-label" for="eng3National">Kebangsaan (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3Country"
                                    value="C3">
                                <label class="form-check-label" for="eng3Country">Negara (6)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]"
                                    id="eng3District" value="D3">
                                <label class="form-check-label" for="eng3District">Daerah/Zon (4)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3School"
                                    value="S3">
                                <label class="form-check-label" for="eng3School">Sekolah/Tiada (0)</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Bahagian Tahap Pencapaian -->
                    <h3 class="mb-3">Tahap Pencapaian <small class="text-muted">/ 20</small> </h3>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <h4 class="h5">Penglibatan</h4>
                            <p class="mb-0">Antarabangsa</p>
                            <p class="mb-0">Kebangsaan</p>
                            <p class="mb-0">Negara</p>
                            <p class="mb-0">Daerah / Zon</p>
                            <p class="mb-0">Sekolah</p>
                        </div>
                        <div class="col-md-3">
                            <h4 class="h5">Johan</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champInt"
                                    value="IC">
                                <label class="form-check-label" for="champInt">20</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champNat"
                                    value="NC">
                                <label class="form-check-label" for="champNat">17</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="champCountry" value="CC">
                                <label class="form-check-label" for="champCountry">14</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="champDist" value="DC">
                                <label class="form-check-label" for="champDist">11</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="champSchool" value="SC">
                                <label class="form-check-label" for="champSchool">8</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="h5">Naib Johan</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="runnerUp1Int" value="I1">
                                <label class="form-check-label" for="runnerUp1Int">19</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="runnerUp1Nat" value="N1">
                                <label class="form-check-label" for="runnerUp1Nat">16</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="runnerUp1Country" value="C1">
                                <label class="form-check-label" for="runnerUp1Country">13</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="runnerUp1Dist" value="D1">
                                <label class="form-check-label" for="runnerUp1Dist">10</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="runnerUp1School" value="S1">
                                <label class="form-check-label" for="runnerUp1School">7</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="h5">Ketiga</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="runnerUp2Int" value="I2">
                                <label class="form-check-label" for="runnerUp2Int">18</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="runnerUp2Nat" value="N2">
                                <label class="form-check-label" for="runnerUp2Nat">15</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="runnerUp2Country" value="C2">
                                <label class="form-check-label" for="runnerUp2Country">12</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="runnerUp2Dist" value="D2">
                                <label class="form-check-label" for="runnerUp2Dist">9</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]"
                                    id="runnerUp2School" value="S2">
                                <label class="form-check-label" for="runnerUp2School">6</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Bahagian Komitmen -->
                    <h3 class="mb-3">Komitmen <small class="text-muted">/ 10</small> </h3>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="leadership"
                                    value="C1">
                                <label class="form-check-label" for="leadership">Menunjukkan kepimpinan (3)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]"
                                    id="manageActivities" value="C2">
                                <label class="form-check-label" for="manageActivities">Menguruskan aktiviti
                                    (3)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]"
                                    id="helpTeachers" value="C3">
                                <label class="form-check-label" for="helpTeachers">Membantu guru/rakan (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]"
                                    id="provideEquipment" value="C4">
                                <label class="form-check-label" for="provideEquipment">Menyediakan peralatan
                                    (2)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="cleanArea"
                                    value="C5">
                                <label class="form-check-label" for="cleanArea">Membersihkan kawasan (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="punctual"
                                    value="C6">
                                <label class="form-check-label" for="punctual">Tepat pada masa (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]"
                                    id="showInterest" value="C7">
                                <label class="form-check-label" for="showInterest">Menunjukkan minat (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]"
                                    id="showSeriousness" value="C8">
                                <label class="form-check-label" for="showSeriousness">Menunjukkan kesungguhan
                                    (2)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]"
                                    id="followInstructions" value="C9"> <label class="form-check-label"
                                    for="followInstructions">Mengikuti arahan (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="trying"
                                    value="C10">
                                <label class="form-check-label" for="trying">Mencuba (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]"
                                    id="giveCooperation" value="C11">
                                <label class="form-check-label" for="giveCooperation">Memberi kerjasama (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]"
                                    id="observableValue" value="C12">
                                <label class="form-check-label" for="observableValue">Sebarang nilai murni yang dapat
                                    dilihat (2)</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Bahagian Sumbangan SerNaib -->
                    <h3 class="mb-3">Khidmat Sumbangan (Peringkat Sekolah) <small class="text-muted">/ 10 </small>
                    </h3>
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs1"
                                value="CS1">
                            <label class="form-check-label" for="cs1">Pelajar yang mendaftar sebagai peserta
                                program / pertandingan / karnival / kursus (10)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs2"
                                value="CS2">
                            <label class="form-check-label" for="cs2">Melibatkan kemahiran tertentu -
                                juri/penyelia, jurulatih pasukan/aspek teknikal (10)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs3"
                                value="CS3">
                            <label class="form-check-label" for="cs3">Penglibatan pelajar dalam aktiviti seperti
                                persembahan interlude (8)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs4"
                                value="CS4">
                            <label class="form-check-label" for="cs4">Membantu dalam menjayakan aktiviti unit
                                seperti menyertai persembahan, sorakan dan berkaitan (5)</label>
                        </div>
                    </div>
                    <hr>
                    <!-- Butiran Kehadiran -->
                    <h3 class="mb-3">Kehadiran & Komen <small class="text-muted">/ 40 </small> <span
                            class="text-danger">*</span></h3>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-2">
                            <label for="attendance" class="form-label">Kehadiran:</label>
                            <input type="text" class="form-control" id="attendance" name="attendance"
                                value="12">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="comment" class="form-label">Komen:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="1"
                                placeholder="Masukkan komen anda di sini" required></textarea>
                        </div>
                    </div>

                    <!-- Butang Hantar -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Hantar Penilaian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .form-check-input:checked {
            background-color: #343a40;
            /* Warna latar belakang gelap */
            border-color: #343a40;
            /* Warna sempadan gelap */
        }

        .form-check-input:checked:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.25);
            /* Bayangan fokus pilihan */
        }
    </style>

    <script>
        document.getElementById('user_id').addEventListener('change', function() {
            var userId = this.value;
            var clubId = document.getElementById('club_id').value;

            if (userId) {
                fetch(`/attendance/total-present/${userId}/${clubId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('attendance').value = data.totalPresent;
                    })
                    .catch(error => console.error('Error fetching total present:', error));
            } else {
                document.getElementById('attendance').value = '';
            }
        });
    </script>
</x-layout>
