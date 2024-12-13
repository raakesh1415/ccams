<x-layout>
    <x-slot name="header">
        <h2>Kelab / Persatuan</h2>
    </x-slot>

    <div class="container mt-4">
        <h2 class="text-center">Explore Kelab / Persatuan Clubs</h2>

        <!-- Check if there are clubs in the 'Kelab / Persatuan' category -->
        @if($club->isEmpty())
            <p class="text-muted text-center mt-4">No clubs available in the "Kelab / Persatuan" category yet. Be the first to add one!</p>

            <!-- Add Club Button positioned below the message on the left -->
            <div class="text-start mb-4">
                <a href="/club/add" class="btn btn-outline-dark d-inline-flex align-items-center">
                    <span class="me-2 fw-bold">+</span>Add Club
                </a>
            </div>
        @else
            <!-- Add Club Button - Positioned on the Left when there are clubs -->
            <div class="text-start mb-4">
                <a href="/club/add" class="btn btn-outline-dark d-inline-flex align-items-center">
                    <span class="me-2 fw-bold">+</span>Add Club
                </a>
            </div>
        @endif

        <!-- Loop through each club and display it -->
        @if(!$club->isEmpty())
            <div class="row g-4">
                @foreach($club as $club)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border">
                        <img src="{{ asset('storage/' . $club->club_pic) }}" class="card-img-top" alt="Club Image" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h3 class="card-title h5">{{ $club->club_name }}</h3>
                            <p class="card-text text-muted">{{ Str::limit($club->club_description, 100) }}</p>
                            <a href="{{ route('club.details', ['club_id' => $club->club_id]) }}" class="btn btn-dark">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
