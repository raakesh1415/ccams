<x-layout>
    <x-slot name="header">
        <h2>Activities</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile" class="rounded-circle"
                style="width: 50px; height: 50px;">
        </div>
    </x-slot>

    <div class="container mt-4">
        <h2 class="text-center mb-4"><b>AKTIVITI</b></h2>

        @if ($activities->isEmpty())
            <!-- No Activities View -->
            <div class="text-center mt-5">
                <img src="{{ asset('images/empty-icon.JPG') }}" alt="No Activities" class="img-fluid mb-3"
                    style="max-width: 150px;">
                <h3 class="text-muted">Tiada Aktiviti!</h3>
                <p class="text-secondary">Setelah aktiviti ditambahkan, ia akan dipaparkan di sini.</p>
                <a href="{{ route('activities.create') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> Tambah Aktiviti
                </a>
            </div>
        @else
            <!-- Add Activity Button -->
            @if (auth()->user()->role === 'teacher')
                <div class="text-center mb-4">
                    <a href="{{ route('activities.create') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus"></i> Tambah Aktiviti
                    </a>
                </div>
            @endif

            <!-- Activities List -->
            <div class="row justify-content-center">
                @foreach ($activities as $activity)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ $activity->poster ? asset('storage/' . $activity->poster) : asset('images/sample-activity.png') }}"
                                class="card-img-top" alt="Activity Poster" style="height: 400px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $activity->activity_name }}</h5>
                                <p class="card-text text-truncate">{{ Str::limit($activity->description, 100) }}</p>
                                <div class="d-flex justify-content-center gap-2">
                                    @if (auth()->user()->role === 'teacher')
                                        <a href="{{ route('activities.edit', $activity->activity_id) }}"
                                            class="btn btn-outline-success">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-url="{{ route('activities.destroy', $activity->activity_id) }}">
                                            <i class="fas fa-trash"></i> Padam
                                        </button>
                                    @endif
                                    @if (auth()->user()->role === 'student')
                                        <a href="{{ route('activities.show', $activity->activity_id) }}"
                                            class="btn btn-outline-info">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <i class="fas fa-times-circle text-danger" style="font-size: 50px;"></i>
                    <h5 class="modal-title" id="deleteModalLabel">Adakah kamu pasti?</h5>
                    <p class="mt-3">Adakah kamu benar-benar mahu memadamkan aktiviti ini?<br>Proses ini tidak boleh
                        dibuat asal.</p>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="POST" class="mb-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Update the modal form's action dynamically
        const deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const url = button.getAttribute('data-url');
            const form = document.getElementById('deleteForm');
            form.action = url;
        });
    </script>

</x-layout>
