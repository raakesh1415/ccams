<x-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold text-dark">{{ $activity->activity_name }}</h2>
            <div class="user-profile">
                <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile" 
                     class="rounded-circle border border-secondary" 
                     style="width: 50px; height: 50px;">
            </div>
        </div>
    </x-slot>

    <div class="container mt-5">
        <div class="row gy-4">
            <!-- Left: Poster -->
            <div class="col-md-6 d-flex justify-content-center">
                <img src="{{ $activity->poster ? asset('storage/' . $activity->poster) : asset('images/default-poster.jpg') }}" 
                     class="img-fluid rounded shadow-lg" 
                     alt="Activity Poster" 
                     style="max-height: 400px; object-fit: cover;">
            </div>

            <!-- Right: Details -->
            <div class="col-md-6">
                <h3 class="mb-3 text-primary fw-semibold text-dark">{{ $activity->activity_name }}</h3>
                <p class="text-dark"><strong>Lokasi:</strong> {{ $activity->location }}</p>
                <p class="text-dark"><strong>Masa Dan Tarikh:</strong> {{ \Carbon\Carbon::parse($activity->date_time)->format('d M Y, h:i A') }}</p>
                <p class="text-dark"><strong>Kategori:</strong> {{ $activity->category }}</p>
                @if ($activity->category !== 'Terbuka Kepada Semua' && $activity->club)
                    <p class="text-dark"><strong>Kelab:</strong> {{ $activity->club->club_name }}</p>
                @endif
                <p class="text-dark"><strong>Durasi:</strong> {{ $activity->duration }}</p>
                <p class="text-dark"><strong>Jumlah Peserta:</strong> {{ $activity->participants ?? 'Open to all' }}</p>
                <p class="text-dark"><strong>Penerangan:</strong></p>
                <p class="text-dark">{{ $activity->description }}</p>
                
                <!-- Go Back Button -->
                <a href="{{ url()->previous() }}" class="btn btn-dark mt-4">Kembali</a>
            </div>
        </div>
    </div>
</x-layout>
