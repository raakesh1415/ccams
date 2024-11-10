<x-layout>
    <x-slot name="header">
        <h2 class="mb-4 text-center">Club Details</h2>
        <div class="user-profile mb-4 text-center">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile" class="img-fluid rounded-circle shadow" style="max-width: 100px;">
        </div>
    </x-slot>

    <div class="container my-5">
        <!-- Centered Title -->
        <h3 class="text-center mb-4">Create a New Club</h3>

        <div class="card shadow-lg border-0 rounded-3 p-4">
            <form action="{{ route('clubs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6 mb-4">
                        <!-- Club Name -->
                        <div class="mb-3">
                            <label for="club_name" class="form-label">Club Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white">
                                    <i class="fas fa-users"></i>
                                </span>
                                <input type="text" id="club_name" name="club_name" class="form-control" required placeholder="Enter club name">
                            </div>
                        </div>

                        <!-- Club Description -->
                        <div class="mb-3">
                            <label for="club_description" class="form-label">Description</label>
                            <textarea id="club_description" name="club_description" rows="4" class="form-control" required placeholder="Enter club description" style="resize: none;"></textarea>
                        </div>

                        <!-- Participant Total -->
                        <div class="mb-3">
                            <label for="participant_total" class="form-label">Participants</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white">
                                    <i class="fas fa-user-friends"></i>
                                </span>
                                <input type="number" id="participant_total" name="participant_total" class="form-control" required placeholder="Enter total participants">
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6 mb-4">
                        <!-- Club Picture -->
                        <div class="mb-3">
                            <label for="club_pic" class="form-label">Club Picture</label>
                            <small class="form-text text-muted">Upload a club image (optional)</small>
                            <input type="file" id="club_pic" name="club_pic" accept="image/*" class="form-control-file">
                        </div>

                        <!-- Club Category -->
                        <div class="mb-3">
                            <label for="club_category" class="form-label">Category</label>
                            <select id="club_category" name="club_category" class="form-select" required>
                                <option value="">Select Category</option>
                                <option value="Kelab / Persatuan">Kelab / Persatuan</option>
                                <option value="Sukan / Permainan">Sukan / Permainan</option>
                                <option value="Unit Beruniform">Unit Beruniform</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                    <button type="submit" class="btn btn-dark btn-lg px-4 py-2 shadow-sm rounded-pill">Add Club</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Message JavaScript -->
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                alert('{{ session('success') }}');
                window.location.href = "{{ url('/club') }}";
            });
        </script>
    @endif
</x-layout>
