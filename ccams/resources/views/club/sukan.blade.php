<x-layout>
    <x-slot name="header">
        <h2>Sukan</h2>
    </x-slot>

    <div class="club-details-container">
        <h2>Explore Sukan Clubs</h2>

        <!-- Add spacing between Explore title and the rest of the content -->
        <div class="mt-4"></div>

        <!-- Check if there are clubs in the 'Sukan' category -->
        @if($clubs->isEmpty())
            <p>No clubs available in the "Sukan" category yet. Be the first to add one!</p>

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
            <div class="club-list">
                @foreach($clubs as $club)
                    <div class="club-card">
                        <img src="{{ asset('storage/' . $club->club_pic) }}" class="card-img-top" alt="Club Image">
                        <h3 class="card-title">{{ $club->club_name }}</h3>
                        <p class="card-text">{{ Str::limit($club->club_description, 100) }}</p>
                        <a href="#" class="btn btn-dark">View Details</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <style>
        .club-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.2s;
            border: 1px solid #e2e6ea;
        }

        .club-card:hover {
            transform: translateY(-5px);
        }

        .club-card img {
            width: 100%;
            height: 200px; /* Fixed height for consistent image size */
            object-fit: cover; /* Ensures the image fits without being distorted */
            border-radius: 8px;
        }

        .club-card h3 {
            font-size: 1.5em;
            color: #333;
            margin: 10px 0;
        }

        .club-card p {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 20px;
        }

        .club-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
            width: 100%;
            max-width: 1200px;
        }

        @media (max-width: 1024px) {
            .club-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .club-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</x-layout>
