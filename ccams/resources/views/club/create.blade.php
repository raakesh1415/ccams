<x-layout>
    <x-slot name="header">
        <h2 class="mb-4 text-center">{{ isset($club) ? 'Edit' : 'Create' }} Club</h2>
        <div class="user-profile mb-4 text-center">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile" class="img-fluid rounded-circle shadow" style="max-width: 100px;">
        </div>
    </x-slot>

    <div class="container my-5">
        <!-- Centered Title -->
        <h3 class="text-center mb-4">{{ isset($club) ? 'Edit' : 'Create' }} a Club</h3>

        <div class="card shadow-lg border-0 rounded-3 p-4">
            <!-- Form Action for Create or Edit -->
            <form action="{{ isset($club) ? route('club.update', ['club_id' => $club->club_id]) : route('club.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($club))
                    @method('PUT') <!-- Spoof PUT for edit -->
                @endif

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
                                <input type="text" id="club_name" name="club_name" class="form-control" required placeholder="Enter club name" value="{{ old('club_name', isset($club) ? $club->club_name : '') }}">
                            </div>
                        </div>

                        <!-- Club Description -->
                        <div class="mb-3">
                            <label for="club_description" class="form-label">Description</label>
                            <textarea id="club_description" name="club_description" rows="4" class="form-control" required placeholder="Enter club description" style="resize: none;">{{ old('club_description', isset($club) ? $club->club_description : '') }}</textarea>
                        </div>

                        <!-- Participant Total -->
                        <div class="mb-3">
                            <label for="participant_total" class="form-label">Participants</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white">
                                    <i class="fas fa-user-friends"></i>
                                </span>
                                <input type="number" id="participant_total" name="participant_total" class="form-control" required placeholder="Enter total participants" value="{{ old('participant_total', isset($club) ? $club->participant_total : '') }}">
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
                            @if(isset($club) && $club->club_pic)
                                <img src="{{ asset('storage/'.$club->club_pic) }}" alt="Club Picture" class="img-fluid mt-2" style="max-width: 100px;">
                            @endif
                        </div>

                        <!-- Club Category -->
                        <div class="mb-3">
                            <label for="club_category" class="form-label">Category</label>
                            <select id="club_category" name="club_category" class="form-select" required>
                                <option value="">Select Category</option>
                                <option value="Kelab / Persatuan" {{ (old('club_category', isset($club) ? $club->club_category : '') == 'Kelab / Persatuan') ? 'selected' : '' }}>Kelab / Persatuan</option>
                                <option value="Sukan / Permainan" {{ (old('club_category', isset($club) ? $club->club_category : '') == 'Sukan / Permainan') ? 'selected' : '' }}>Sukan / Permainan</option>
                                <option value="Unit Beruniform" {{ (old('club_category', isset($club) ? $club->club_category : '') == 'Unit Beruniform') ? 'selected' : '' }}>Unit Beruniform</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                    <button type="submit" class="btn btn-dark btn-lg px-4 py-2 shadow-sm rounded-pill">{{ isset($club) ? 'Update' : 'Add' }} Club</button>
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
