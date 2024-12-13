<!-- create.blade.php -->
<x-layout>
    <x-slot name="header">
        <h2>Add Activity</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="container mt-5">

        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title mb-4">Add a New Activity</h4>
                <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Activity Name -->
                    <div class="mb-3">
                        <label for="activity_name" class="form-label">Activity Name</label>
                        <input type="text" name="activity_name" id="activity_name" class="form-control" required>
                    </div>

                    <!-- Location -->
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" id="location" class="form-control" required>
                    </div>

                    <!-- Date & Time -->
                    <div class="mb-3">
                        <label for="date_time" class="form-label">Date & Time</label>
                        <input type="datetime-local" name="date_time" id="date_time" class="form-control" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                    </div>

                    <!-- Participants -->
                    <div class="mb-3">
                        <label for="participants" class="form-label">Participants</label>
                        <input type="number" name="participants" id="participants" class="form-control">
                    </div>

                    <!-- Poster -->
                    <div class="mb-3">
                        <label for="poster" class="form-label">Add Poster</label>
                        <input type="file" name="poster" id="poster" class="form-control" accept="image/*">
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select" required>
                            <option value="Open to All">Open to All</option>
                            <option value="Club">Club</option>
                        </select>
                    </div>

                    <!-- Duration -->
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" name="duration" id="duration" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Activity</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
