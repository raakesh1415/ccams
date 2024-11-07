<x-layout>
    <x-slot name="header">
        <h2>Club Details</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="club-details-container">
        <a href="{{ url()->previous() }}" class="go-back">Go Back</a>

        <form action="{{ route('clubs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-section">
                <!-- Left Column -->
                <div class="left-column">
                    <!-- Club Name -->
                    <label for="club_name">Club Name</label>
                    <input type="text" id="club_name" name="club_name" class="form-control" required>

                    <!-- Description -->
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" class="form-control" required></textarea>

                    <!-- Participants -->
                    <label for="participants">Participants</label>
                    <input type="number" id="participants" name="participants" class="form-control" required>
                </div>

                <!-- Right Column -->
                <div class="right-column">
                    <!-- Add Poster -->
                    <label for="poster">Add Poster</label>
                    <input type="file" id="poster" name="poster" accept="image/*" class="form-control-file">
                    <small>*Drag or browse from device</small>

                    <!-- Category -->
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        <option value="Kelab / Persatuan">Kelab / Persatuan</option>
                        <option value="Sukan / Permainan">Sukan / Permainan</option>
                        <option value="Unit Beruniform">Unit Beruniform</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary submit-btn">Add Club</button>
        </form>
    </div>
</x-layout>
