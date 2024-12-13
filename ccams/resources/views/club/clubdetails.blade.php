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

        <!-- Action Buttons -->
        <div class="action-buttons">
            <!-- Edit Button -->
            <a href="{{ route('club.edit', ['club_id' => $club->club_id]) }}" class="btn btn-edit">
                <i class="fas fa-edit"></i> Edit
            </a>

            <!-- Delete Button to Trigger Modal -->
            <button type="button" class="btn btn-delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="fas fa-trash"></i> Delete
            </button>
        </div>

        <!-- Back Button -->
        <a href="{{ route('club.index') }}" class="btn btn-back mt-4"><i class="fas fa-arrow-left"></i> Go Back</a>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <div class="modal-body text-center">
                    <i class="fas fa-times-circle text-danger" style="font-size: 50px;"></i>
                    <h5 class="modal-title" id="deleteModalLabel">Are you sure?</h5>
                    <p class="mt-3">Do you really want to delete this Club?<br>This process cannot be undone.</p>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('club.destroy', ['club_id' => $club->club_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
                {{-- <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="{{ route('club.destroy', ['club_id' => $club->club_id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Include Bootstrap CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
        }

        .btn-back:hover {
            background-color: #5a6268;
        }
    </style>
</x-layout>
