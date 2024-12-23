<x-layout>
    <div class="container-fluid py-4 px-4 bg-light rounded">
        <div class="row g-4">
            <!-- Left Column: User Info and Profile Photo -->
            <div class="col-lg-4">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <img src="{{ Auth::user()->profile_pic ? asset('storage/profiles/' . Auth::user()->profile_pic) : asset('images/profile.png') }}" 
                             class="rounded-circle img-fluid mb-3" 
                             alt="Gambar Profil" 
                             style="width: 150px; height: 150px;">
                        <h3 class="card-title mb-1">{{ $user->name }}</h3>
                        <p class="text-muted mb-3">{{ Auth::user()->role }}</p>
                        <a href="/profile/edit" class="btn btn-primary btn-sm">Edit Profil</a>
                    </div>
                </div>

                <!-- About Me Section -->
                <div class="card mt-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Tentang Saya</h5>
                        <p class="card-text">{{ $user->about_me ?? 'Tiada maklumat diberikan' }}</p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Additional User Details and Information -->
            <div class="col-lg-8">
                <div class="row g-4">
                    <!-- User Details Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Maklumat Pengguna</h5>
                                <p><strong>Nama:</strong> {{ $user->name }}</p>
                                <p><strong>Peranan:</strong> {{ $user->role }}</p>
                                <p><strong>E-mel:</strong> {{ $user->email }}</p>
                                <p><strong>Kelas:</strong> {{ $user->classroom }}</p>
                                <a href="{{ route('profile.edit') }}" class="text-muted small">Edit Profil</a>
                            </div>
                        </div>
                    </div>

                    <!-- Address Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Maklumat Alamat</h5>
                                <p><strong>Negara:</strong> {{ $user->country ?? 'Tidak diberikan' }}</p>
                                <p><strong>Bandar:</strong> {{ $user->city ?? 'Tidak diberikan' }}</p>
                                <p><strong>Alamat:</strong> {{ $user->address ?? 'Tidak diberikan' }}</p>
                                <p><strong>Poskod:</strong> {{ $user->postal_code ?? 'Tidak diberikan' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Maklumat Aktiviti</h5>
                                @if($activities->isEmpty())
                                    <p>Tiada aktiviti tersedia.</p>
                                @else
                                    @foreach ($activities as $activity)
                                        <p><strong>Aktiviti:</strong> {{ $activity->activity_name ?? 'Tidak diberikan' }}</p>
                                        <p><strong>Lokasi:</strong> {{ $activity->location ?? 'Tidak diberikan' }}</p>
                                        <p><strong>Tarikh/Masa:</strong> {{ $activity->date_time ?? 'Tidak diberikan' }}</p>
                                        <p><strong>Kategori:</strong> {{ $activity->category ?? 'Tidak diberikan' }}</p>
                                        <p><strong>Penyertaan:</strong> {{ $activity->participants ?? 'Tidak diberikan' }}</p>
                                        <p><strong>Tempoh:</strong> {{ $activity->duration ?? 'Tidak diberikan' }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Club Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Maklumat Kelab</h5>
                                @if($clubs->isEmpty())
                                    <p>Tiada kelab tersedia.</p>
                                @else
                                    @foreach ($clubs as $club)
                                        <p><strong>Nama Kelab:</strong> {{ $club->club_name ?? 'Tidak diberikan' }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Reports Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Laporan</h5>
                                <p><strong>Sesi Pelayar:</strong> Data tersedia</p>
                                <p><strong>Gred Keseluruhan:</strong> Boleh diakses</p>
                            </div>
                        </div>
                    </div>

                    <!-- Login Activity Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Aktiviti Log Masuk</h5>
                                <p><strong>Log Masuk Terakhir:</strong> {{ \Carbon\Carbon::parse($user->last_login_at)->format('Y-m-d H:i:s') ?? 'Tidak tersedia' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
