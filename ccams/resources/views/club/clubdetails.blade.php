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
            <p>{{ $club->participant_total }}</p>
        </div>

        <!-- Action Buttons Section (Dummy Links) -->
        <div class="action-buttons">
            <!-- Edit Button (dummy link) -->
           <!-- Edit Button -->
<a href="{{ route('club.edit', ['id' => $club->club_id]) }}" class="btn btn-edit">
    <i class="fas fa-edit"></i> Edit
</a>

            <!-- Delete Button (dummy link) -->
            <a href="#" class="btn btn-delete" onclick="alert('Delete functionality not implemented yet'); return false;">
                <i class="fas fa-trash-alt"></i> Delete
            </a>
        </div>

        <!-- Back Button -->
        <a href="#" class="btn btn-back mt-4"><i class="fas fa-arrow-left"></i> Go Back</a>
    </div>

    <!-- Include Font Awesome CDN for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMB25l7qH/rfvcbET3z5Qfqg5eU5c5kzv5O3r4n" crossorigin="anonymous">

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

        /* Button Styles */
        .action-buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 1em;
            font-weight: 500;
            text-decoration: none;
            transition: background-color 0.2s ease;
            cursor: pointer;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn-edit {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        .btn-edit:hover {
            background-color: #218838;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .btn-back {
            background-color: #6c757d;
            color: #fff;
            border: none;
            display: inline-flex;
            align-items: center;
            margin-top: 20px;
            text-align: center;
        }

        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</x-layout>
