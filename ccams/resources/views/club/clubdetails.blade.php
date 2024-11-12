<x-layout>
    <x-slot name="header">
        <h2>{{ $club->club_name }} - Club Details</h2>
    </x-slot>

    <div class="club-details-container">
        <div class="club-card">
            <img src="{{ asset('storage/' . $club->club_pic) }}" alt="Club Image" style="width:100%; height:auto; border-radius: 8px;">
            <h3>{{ $club->club_name }}</h3>
            <p><strong>Category:</strong> {{ $club->club_category }}</p>
            <p>{{ $club->club_description }}</p>
        </div>

        <div class="participants-count">
            <h3>Total Participants</h3>
            <p>{{ $club->participant_total }}</p> <!-- Display the total participants here -->
        </div>

        <a href="{{ route('club.index') }}" class="btn btn-dark mt-4">Go Back</a>

    </div>

    <style>
        .club-details-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .club-card img {
            width: 100%;
            object-fit: cover;
        }

        .club-card h3, .participants-count h3 {
            font-size: 1.5em;
            color: #333;
            margin: 10px 0;
        }

        .club-card p, .participants-count p {
            font-size: 1em;
            color: #666;
        }
    </style>
</x-layout>