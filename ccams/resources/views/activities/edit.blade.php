<x-layout>
    <x-slot name="header">
        <h2>Edit Activity</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="container mt-5">

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('activities.update', $activity->activity_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Activity Name -->
                    <div class="mb-3">
                        <label for="activity_name" class="form-label">Activity Name</label>
                        <input type="text" name="activity_name" id="activity_name" class="form-control" value="{{ old('activity_name', $activity->activity_name) }}" required>
                    </div>

                    <!-- Location -->
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $activity->location) }}" required>
                    </div>

                    <!-- Date & Time -->
                    <div class="mb-3">
                        <label for="date_time" class="form-label">Date & Time</label>
                        <input type="datetime-local" name="date_time" id="date_time" class="form-control" 
                            value="{{ old('date_time', is_string($activity->date_time) ? $activity->date_time : $activity->date_time->format('Y-m-d\TH:i')) }}" required>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $activity->description) }}</textarea>
                    </div>

                    <!-- Participants -->
                    <div class="mb-3">
                        <label for="participants" class="form-label">Participants</label>
                        <input type="number" name="participants" id="participants" class="form-control" value="{{ old('participants', $activity->participants) }}">
                    </div>

                    <!-- Poster -->
                    <div class="mb-3">
                        <label for="poster" class="form-label">Add Poster</label>
                        <input type="file" name="poster" id="poster" class="form-control" accept="image/*">
                        @if ($activity->poster)
                            <img src="{{ asset('storage/' . $activity->poster) }}" alt="Current Poster" class="img-fluid mt-3" style="max-width: 150px;">
                        @endif
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select" required>
                            <option value="Open to All" {{ $activity->category == 'Open to All' ? 'selected' : '' }}>Open to All</option>
                            <option value="Club" {{ $activity->category == 'Club' ? 'selected' : '' }}>Club</option>
                        </select>
                    </div>

                    <!-- Duration -->
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration</label>
                        <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration', $activity->duration) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Activity</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
