<x-layout>
    <x-slot name="header">
        <h2>Unit Beruniform</h2>
    </x-slot>

    <div class="club-details-container">
        <h2>Explore Unit Beruniform Clubs</h2>

        <!-- Add spacing between Explore title and the rest of the content -->
        <div class="mt-4"></div> <!-- Creates the spacing between the title and the message -->

        <!-- Check if there are clubs in the 'Unit Beruniform' category -->
        @if($clubs->isEmpty())
            <p>No clubs available in the "Unit Beruniform" category yet. Be the first to add one!</p>

            <!-- Add Club Button positioned below the message on the left -->
            <div class="add-club-button mb-4" style="text-align: left;">
                <div style="display: inline-block; border: 2px solid #333; border-radius: 12px; padding: 4px;">
                    <button type="button" 
                            onclick="window.location.href='/club/add'"
                            style="border: none; background-color: transparent; color: #555; font-size: 0.875rem; font-weight: 500; padding: 4px 12px; border-radius: 8px;">
                        <span style="color: black; font-weight: bold; margin-right: 8px;">+</span>
                        Add Club
                    </button>
                </div>
            </div>
        @else
            <!-- Add Club Button - Positioned on the Left when there are clubs -->
            <div class="add-club-button mb-4" style="text-align: left;">
                <div style="display: inline-block; border: 2px solid #333; border-radius: 12px; padding: 4px;">
                    <button type="button" 
                            onclick="window.location.href='/club/add'"
                            style="border: none; background-color: transparent; color: #555; font-size: 0.875rem; font-weight: 500; padding: 4px 12px; border-radius: 8px;">
                        <span style="color: black; font-weight: bold; margin-right: 8px;">+</span>
                        Add Club
                    </button>
                </div>
            </div>
        @endif

        <!-- Loop through each club and display it -->
        @if(!$clubs->isEmpty())
            <div class="row">
                @foreach($clubs as $club)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/' . $club->club_pic) }}" class="card-img-top" alt="Club Image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $club->club_name }}</h5>
                                <p class="card-text">{{ Str::limit($club->club_description, 100) }}</p>
                                <a href="#" class="btn btn-dark">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
