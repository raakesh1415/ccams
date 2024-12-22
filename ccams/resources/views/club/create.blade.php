<x-layout>
    <x-slot name="header">
        <h2 class="mb-4 text-center">{{ isset($clubs) ? 'Edit' : 'Create' }} Kelab</h2>
        <div class="user-profile mb-4 text-center">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile" class="img-fluid rounded-circle shadow" style="max-width: 100px;">
        </div>
    </x-slot>

    <div class="container my-5">
        <!-- Centered Title -->
        <h3 class="text-center mb-4">{{ isset($clubs) ? 'Ubah' : 'Tambah' }} Maklumat Kelab</h3>

        <div class="card shadow-lg border-0 rounded-3 p-4">
            <!-- Form Action for Create or Edit -->
            <form action="{{ isset($clubs) ? route('club.update', ['club_id' => $clubs->club_id]) : route('club.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($clubs))
                    @method('PUT') <!-- Spoof PUT for edit -->
                @endif

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6 mb-4">
                        <!-- Club Name -->
                        <div class="mb-3">
                            <label for="club_name" class="form-label">Nama</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white">
                                    <i class="fas fa-users"></i>
                                </span>
                                <input type="text" id="club_name" name="club_name" class="form-control" required placeholder="Enter club name" value="{{ old('club_name', isset($clubs) ? $clubs->club_name : '') }}">
                            </div>
                        </div>

                        <!-- Club Description -->
                        <div class="mb-3">
                            <label for="club_description" class="form-label">Deskripsi</label>
                            <textarea id="club_description" name="club_description" rows="4" class="form-control" required placeholder="Enter club description" style="resize: none;">{{ old('club_description', isset($clubs) ? $clubs->club_description : '') }}</textarea>
                        </div>

                        <!-- Participant Total -->
                        <div class="mb-3">
                            <label for="participant_total" class="form-label">Jumlah Pelajar</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white">
                                    <i class="fas fa-user-friends"></i>
                                </span>
                                <input type="number" id="participant_total" name="participant_total" class="form-control" required placeholder="Enter total participants" value="{{ old('participant_total', isset($clubs) ? $clubs->participant_total : '') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6 mb-4">
                        <!-- Club Picture -->
                        <div class="mb-3">
                            <label for="club_pic" class="form-label">Gambar Kelab</label>
                            <small class="form-text text-muted">Muatnaik Gambar Kelab (Tidak Wajib)</small>
                            <input type="file" id="club_pic" name="club_pic" accept="image/*" class="form-control-file">
                            @if(isset($clubs) && $clubs->club_pic)
                                <img src="{{ asset('storage/'.$clubs->club_pic) }}" alt="Club Picture" class="img-fluid mt-2" style="max-width: 100px;">
                            @endif
                        </div>

                        <!-- Club Category -->
                        <div class="mb-3">
                            <label for="club_category" class="form-label">Kategori</label>
                            <select id="club_category" name="club_category" class="form-select" required>
                                <option value="">Select Category</option>
                                <option value="Kelab" {{ (old('club_category', isset($clubs) ? $clubs->club_category : '') == 'Persatuan') ? 'selected' : '' }}>Persatuan</option>
                                <option value="Sukan" {{ (old('club_category', isset($clubs) ? $clubs->club_category : '') == 'Sukan') ? 'selected' : '' }}>Sukan</option>
                                <option value="Unit Beruniform" {{ (old('club_category', isset($clubs) ? $clubs->club_category : '') == 'Unit Beruniform') ? 'selected' : '' }}>Unit Beruniform</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                    <button type="submit" class="btn btn-dark btn-lg px-4 py-2 shadow-sm rounded-pill">{{ isset($clubs) ? 'Simpan Maklumat' : 'Tambah' }} Kelab</button>
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
