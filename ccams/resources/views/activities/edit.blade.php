<x-layout>
    <x-slot name="header">
        <h2>Edit Activity</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="add-activity-container">
        <a href="{{ url()->previous() }}" class="go-back">Go Back</a>

        <form action="{{ route('activities.update', $activity->activity_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Activity Name -->
            <label for="activity_name">Activity Name</label>
            <input type="text" name="activity_name" id="activity_name" value="{{ old('activity_name', $activity->activity_name) }}" required>

            <!-- Location -->
            <label for="location">Location</label>
            <input type="text" name="location" id="location" value="{{ old('location', $activity->location) }}" required>

            <!-- Date & Time -->
            <label for="date_time">Date & Time</label>
            <input type="datetime-local" name="date_time" id="date_time" 
             value="{{ old('date_time', is_string($activity->date_time) ? $activity->date_time : $activity->date_time->format('Y-m-d\TH:i')) }}" required>

            <!-- Description -->
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" required>{{ old('description', $activity->description) }}</textarea>

            <!-- Participants -->
            <label for="participants">Participants</label>
            <input type="number" name="participants" id="participants" value="{{ old('participants', $activity->participants) }}">

            <!-- Poster -->
            <label for="poster">Add Poster</label>
            <input type="file" name="poster" id="poster" accept="image/*">
            @if ($activity->poster)
                <img src="{{ asset('storage/' . $activity->poster) }}" alt="Current Poster" width="100">
            @endif

            <!-- Category -->
            <label for="category">Category</label>
            <select name="category" id="category" required>
                <option value="Open to All" {{ $activity->category == 'Open to All' ? 'selected' : '' }}>Open to All</option>
                <option value="Club" {{ $activity->category == 'Club' ? 'selected' : '' }}>Club</option>
            </select>

            <!-- Duration -->
            <label for="duration">Duration</label>
            <input type="text" name="duration" id="duration" value="{{ old('duration', $activity->duration) }}" required>

            <button type="submit" class="submit-btn">Update Activity</button>
        </form>

    </div>

    <style>
        .add-activity-container { padding: 20px; max-width: 800px; margin: 0 auto; background: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .go-back { display: inline-block; margin-bottom: 20px; color: #007bff; text-decoration: none; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input[type="text"], input[type="datetime-local"], input[type="file"], textarea, select { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; }
        .submit-btn { margin-top: 20px; padding: 10px 20px; background-color: #5a67d8; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1em; }
        .submit-btn:hover { background-color: #4c51bf; }
    </style>
</x-layout>
