<x-layout>
    <div class="container-fluid">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="text-center">
            {{-- <h2 class="text-start">Penilaian</h2> --}}
            <h2 class="text-center"><b>PENILAIAN</b></h2>
            @if (Auth::user()->role === 'teacher')
                <h4 class="text-start pt-4"><b>Kelas Berdaftar</b></h4>
                <div class="row g-4 mt-0">
                    <!-- Kelas -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card club-card">
                            <div class="ratio ratio-4x3">
                                <img src="{{ asset('storage/class_pics/class.png') }}" alt="Gambar Kelas"
                                    class="card-img-top img-fluid">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Kelas {{ Auth::user()->classroom }}</h5>
                                <p class="card-text">Penilaian Kelas</p>
                                <a href="{{ route('assessment.classlist', Auth::user()->classroom) }}"
                                    class="btn btn-dark">Lihat Kelas</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <h4 class="text-start pt-4"><b>Kelab Berdaftar</b></h4>
            <div class="row g-4 mt-0">
                @foreach ($registrations as $registration)
                    <!-- Kelab -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card club-card">
                            <div class="ratio ratio-4x3"> <!-- Menyesuaikan nisbah aspek kepada 16:9 -->
                                <img src="{{ asset('storage/' . $registration->club->club_pic) }}" alt="Gambar Kelab"
                                    class="card-img-top img-fluid"> <!-- Memastikan gambar sesuai dalam bekas -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $registration->club->club_name }}</h5>
                                <p class="card-text">{{ $registration->club_type }}</p>
                                @if (Auth::user()->role === 'teacher')
                                    <a href="{{ route('assessment.list', $registration->club->club_id) }}"
                                        class="btn btn-dark">Lihat Penilaian</a>
                                @endif
                                @if (Auth::user()->role === 'student')
                                    <a href="{{ route('assessment.view', $registration->club_id) }}"
                                        class="btn btn-dark">Lihat Penilaian</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
