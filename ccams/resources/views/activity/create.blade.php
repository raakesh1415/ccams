<!-- create.blade.php -->
<x-layout>
    <x-slot name="header">
        <h2>Add Activity</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="add-activity-container">
        <a href="{{ url()->previous() }}" class="go-back">Go Back</a>

        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="activity-form">
                <h3>Activity Details</h3>

                <label for="activity_name">Activity Name</label>
                <input type="text" id="activity_name" required>

                <label for="location">Location</label>
                <input type="text" id="location" required>

                <label for="date_time">Date & Time</label>
                <input type="datetime-local" id="date_time" required>

                <label for="description">Description</label>
                <textarea id="description" rows="4" required></textarea>

                <label for="participants">Participants</label>
                <input type="text" id="participants" required>

                <label for="poster">Add Poster</label>
                <input type="file" id="poster" accept="image/*">
                <small>*Drag or browse from device</small>

                <label for="category">Category</label>
                <input type="text" id="category" required>

                <label for="duration">Duration</label>
                <input type="text" id="duration" required>

                <button type="submit" class="submit-btn">Add Activity</button>
            </div>
        </form>
    </div>

    <style>
    
        .add-activity-container { padding: 20px; max-width: 800px; margin: 0 auto; background: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
        .go-back { display: inline-block; margin-bottom: 20px; color: #007bff; text-decoration: none; }
        .activity-form h3 { margin-bottom: 20px; font-size: 1.5em; }
        label { display: block; margin-top: 15px; font-weight: bold; }
        input[type="text"], input[type="datetime-local"], input[type="file"], textarea { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ccc; border-radius: 4px; }
        .submit-btn { margin-top: 20px; padding: 10px 20px; background-color: #5a67d8; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 1em; }
        .submit-btn:hover { background-color: #4c51bf; }
    </style>
</x-layout>
