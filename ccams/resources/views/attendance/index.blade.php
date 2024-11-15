<x-layout>
    <div class="text-center pt-3 pb-4">
        <h2 class="text-start">Attendance</h2>
        <h4 class="text-start pt-4">My Clubs</h4>
        
        <div class="row g-4 mt-0">
            @forelse($clubs as $club)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card club-card">
                        @if($club->club_pic && file_exists(storage_path('app/public/' . $club->club_pic)))
                            <img src="{{ asset('storage/' . $club->club_pic) }}" alt="{{ $club->club_name }}" class="img-fluid fixed-club-img">
                        @else
                            <div class="text-muted py-3">No Image Available</div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $club->club_name }}</h5>
                            <p class="card-text">{{ $club->club_category }}</p>
                            <a href="{{ route('attendance.show', ['club' => $club->club_id]) }}" class="btn btn-dark">View Attendance</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>You do not manage any club.</p>
            @endforelse
        </div>
    </div>
</x-layout>


<style>
    .fixed-club-img {
    height: 300px;
    width: 100%;
    object-fit: cover;
}

.card {
    border-radius: 8px;
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
}

.card:hover {
    transform: translateY(-5px);
}

.card-body {
    text-align: center;
}

.card-title {
    font-size: 1.25rem;
    color: #333;
}

.card-text {
    font-size: 0.9rem;
    color: #666;
}
</style>