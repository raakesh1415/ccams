<x-layout>
    <x-slot name="header">
        <h2 class="mb-4">Club Details</h2>
        <div class="user-profile mb-4">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile" class="img-fluid rounded-circle" style="max-width: 100px;">
        </div>
    </x-slot>

    <div class="container">
        <form action="{{ route('clubs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6 mb-4">
                    <!-- Club Name -->
                    <div class="mb-3">
                        <label for="club_name" class="form-label"><b>Club Name</b></label>
                        <input type="text" id="club_name" name="club_name" class="form-control" required placeholder="Enter club name">
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" rows="4" class="form-control" required placeholder="Enter description" style="resize: none;"></textarea>
                    </div>

                    <!-- Participants -->
                    <div class="mb-3">
                        <label for="participants" class="form-label">Participants</label>
                        <input type="number" id="participants" name="participants" class="form-control" required placeholder="Enter total participants">
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6 mb-4">
                    <!-- Club Picture -->
                    <div class="mb-3">
                        <br><br><small class="form-text text-muted">Upload a club image (optional)</small> <br>
                        <label for="club_pic" class="form-label">Club Picture</label>
                        <input type="file" id="club_pic" name="club_pic" accept="image/*" class="form-control-file">
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" name="category" class="form-select" required>
                            <option value="">Select Category</option>
                            <option value="Kelab / Persatuan">Kelab / Persatuan</option>
                            <option value="Sukan / Permainan">Sukan / Permainan</option>
                            <option value="Unit Beruniform">Unit Beruniform</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                <button type="submit" class="btn btn-primary btn-sm px-4 py-2">Add Club</button>
            </div>
        </form>
    </div>
</x-layout>
