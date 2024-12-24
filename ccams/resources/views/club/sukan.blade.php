<x-layout>
    <x-slot name="header">
        <h2>Sukan</h2>
    </x-slot>

    <div class="container mt-4">
        <h2 class="text-center">Terokai Sukan</h2>

        <!-- Check if there are clubs in the 'Sukan' category -->
        @if($clubs->isEmpty())
            <p class="text-muted text-center mt-4">No clubs available in the "Sukan" category yet. Be the first to add one!</p>

            <!-- Add Club Button and Search Bar Container -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="/club/add" class="btn btn-outline-dark d-inline-flex align-items-center">
                    <span class="me-2 fw-bold">+</span>Add Club
                </a>
                <form action="{{ route('club.search') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari sukan...">
                    <button type="submit" class="btn btn-outline-dark">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        @else
            <!-- Add Club Button and Search Bar Container -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="/club/add" class="btn btn-outline-dark d-inline-flex align-items-center">
                    <span class="me-2 fw-bold">+</span>Tambah Kelab
                </a>
                <form action="{{ route('club.search') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Cari sukan...">
                    <button type="submit" class="btn btn-outline-dark">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        @endif

        <!-- Loop through each club and display it -->
        @if(!$clubs->isEmpty())
            <div class="row g-4">
                @foreach($clubs as $club)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border">
                            <img src="{{ asset('storage/' . $club->club_pic) }}" class="card-img-top" alt="Club Image" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h3 class="card-title h5">{{ $club->club_name }}</h3>
                                <p class="card-text text-muted">{{ Str::limit($club->club_description, 100) }}</p>
                                <a href="{{ route('club.details', ['club_id' => $club->club_id]) }}" class="btn btn-dark">Lihat Maklumat</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>