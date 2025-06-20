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
                <h4 class="card-title mb-4">Tambah Aktiviti Baru</h4>
                <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Activity Name -->
                    <div class="mb-3">
                        <label for="activity_name" class="form-label">Nama Aktiviti <span class="text-danger">*</span></label>
                        <input type="text" name="activity_name" id="activity_name" class="form-control" value="{{ old('activity_name') }}" required>
                        @error('activity_name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Location -->
                    <div class="mb-3">
                        <label for="location" class="form-label">Lokasi <span class="text-danger">*</span></label>
                        <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}" required>
                        @error('location')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Date & Time -->
                    <div class="mb-3">
                        <label for="date_time" class="form-label">Tarikh <span class="text-danger">*</span></label>
                        <input type="datetime-local" name="date_time" id="date_time" class="form-control" value="{{ old('date_time') }}" required>
                        @error('date_time')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Penerangan <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Participants -->
                    <div class="mb-3">
                        <label for="participants" class="form-label">Jumlah Peserta</label>
                        <input type="number" name="participants" id="participants" class="form-control" value="{{ old('participants') }}">
                        @error('participants')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Poster -->
                    <div class="mb-3">
                        <label for="poster" class="form-label">Tambah Poster (JPEG/PNG) <span class="text-danger">*</span></label>
                        <input type="file" name="poster" id="poster" class="form-control" accept="image/jpeg,image/png" required>
                        @error('poster')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori <span class="text-danger">*</span></label>
                        <select name="category" id="category" class="form-select" required>
                            <option value="Open to All" {{ old('category') == 'Open to All' ? 'selected' : '' }}>Terbuka Kepada Semua</option>
                            <option value="Club" {{ old('category') == 'Club' ? 'selected' : '' }}>Kelab</option>
                        </select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Clubs Dropdown -->
                    <div class="mb-3" id="clubDropdown" style="display: none;">
                        <label for="club_id" class="form-label">Pilih Kelab <span class="text-danger">*</span></label>
                        <select name="club_id" id="club_id" class="form-select">
                            @foreach($clubs as $club)
                                <option value="{{ $club->club_id }}">{{ $club->club_name }}</option>
                            @endforeach
                        </select>
                        @error('club_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Duration -->
                    <div class="mb-3">
                        <label for="duration" class="form-label">Durasi <span class="text-danger">*</span></label>
                        <input type="text" name="duration" id="duration" class="form-control" value="{{ old('duration') }}" required>
                        @error('duration')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Registration ID (hidden) -->
                    <input type="hidden" name="registration_id" value="{{ auth()->user()->id }}">

                    <button type="submit" class="btn btn-dark btn-lg">Tambah Aktiviti</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('category').addEventListener('change', function() {
            var clubDropdown = document.getElementById('clubDropdown');
            if (this.value === 'Club') {
                clubDropdown.style.display = 'block';
            } else {
                clubDropdown.style.display = 'none';
            }
        });
    </script>
</x-layout>
