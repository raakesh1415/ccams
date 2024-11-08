<x-layout>
    <div class="text-center pt-3 pb-4">
        <h2 class="text-start">Attendance</h2>
        <h4 class="text-start pt-4">My Clubs</h4>
        
        <div class="row g-4 mt-0">
            @forelse($clubs as $club)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card club-card">
                        <img src="{{ asset('images/' . strtolower(str_replace(' ', '', $club->club_category)) . '.jpg') }}" alt="{{ $club->club_name }}" class="card-img-top p-0">
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
