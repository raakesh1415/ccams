<x-layout>
    <x-slot name="header">
        <h2>Sukan / Permainan</h2>
    </x-slot>

    <div class="club-details-container">
        <h2>Explore Sukan / Permainan Clubs</h2>
        
        <!-- Add Club Button -->
        <div class="add-club-button mb-4">
            <button type="button" class="btn btn-primary" onclick="window.location.href='/club/add'">
                Add Club
            </button>
        </div>

        <!-- Check if there are clubs in the 'Sukan / Permainan' category -->
        @if($clubs->isEmpty())
            <p>No clubs available in the "Sukan / Permainan" category yet. Be the first to add one!</p>
        @else
            <!-- Loop through each club and display it -->
            <div class="row">
                @foreach($clubs as $club)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $club->club_pic) }}" class="card-img-top" alt="Club Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $club->club_name }}</h5>
                                <p class="card-text">{{ Str::limit($club->club_description, 100) }}</p>
                                <a href="#" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
