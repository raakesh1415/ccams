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

        <!-- Filter Options -->
        <div class="d-flex justify-content-end mb-4">
            <form action="{{ route('activities.index') }}" method="GET" class="d-inline-block">
                <div class="d-flex">
                    <select name="filter" id="filter" class="form-select me-2" style="min-width: 250px;" onchange="this.form.submit()">
                        <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>Terbuka Kepada Semua</option>
                        <option value="registered" {{ request('filter') == 'registered' ? 'selected' : '' }}>Kelab Didaftar</option>
                    </select>
                    <select name="view" id="view" class="form-select" style="min-width: 200px;" onchange="this.form.submit()">
                        <option value="card" {{ request('view') == 'card' ? 'selected' : '' }}>Kad</option>
                        <option value="list" {{ request('view') == 'list' ? 'selected' : '' }}>Senarai</option>
                    </select>
                </div>
            </form>
        </div>

        @if ($activities->isEmpty())
            <!-- No Activities View -->
            <div class="text-center mt-5">
                <img src="{{ asset('images/empty-icon.JPG') }}" alt="No Activities" class="img-fluid mb-3"
                    style="max-width: 150px;">
                <h3 class="text-muted">Tiada Aktiviti!</h3>
                <p class="text-secondary">Setelah aktiviti ditambahkan, ia akan dipaparkan di sini.</p>
                @if (auth()->user()->role === 'teacher')
                    <a href="{{ route('activities.create') }}" class="btn btn-dark btn-lg">
                        <i class="fas fa-plus"></i> Tambah Aktiviti
                    </a>
                @endif
            </div>
        @else
            <!-- Add Activity Button -->
            @if (auth()->user()->role === 'teacher')
                <div class="text-center mb-4">
                    <a href="{{ route('activities.create') }}" class="btn btn-dark btn-lg">
                        <i class="fas fa-plus"></i> Tambah Aktiviti
                    </a>
                </div>
            @endif

            <!-- Activities List -->
            @if ($viewType == 'list')
                <div class="list-group">
                    @foreach ($activities as $activity)
                        <div class="list-group-item list-group-item-action py-4 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="{{ $activity->poster ? asset('storage/' . $activity->poster) : asset('images/sample-activity.png') }}" 
                                     alt="Activity Poster" class="img-fluid me-3" style="width: 100px; height: 100px; object-fit: cover;">
                                <div>
                                    <a href="{{ route('activities.show', $activity->activity_id) }}" class="text-decoration-none text-dark">
                                        <h5 class="mb-1">{{ $activity->activity_name }}</h5>
                                        <small>{{ \Carbon\Carbon::parse($activity->date_time)->format('d M Y, h:i A') }}</small>
                                        <p class="mb-1">{{ Str::limit($activity->description, 100) }}</p>
                                        @if ($activity->category !== 'Open to All' && $activity->club_id)
                                            <small><strong>Kelab:</strong> {{ $activity->club->club_name }}</small>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                @if (auth()->user()->role === 'teacher')
                                    <a href="{{ route('activities.edit', $activity->activity_id) }}" class="btn btn-outline-success btn-md">
                                        <i class="fas fa-edit"></i> Kemaskini
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-md" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" data-url="{{ route('activities.destroy', $activity->activity_id) }}">
                                        <i class="fas fa-trash"></i> Padam
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row justify-content-center">
                    @foreach ($activities as $activity)
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-sm">
                                <img src="{{ $activity->poster ? asset('storage/' . $activity->poster) : asset('images/sample-activity.png') }}"
                                    class="card-img-top" alt="Activity Poster" style="height: 400px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ $activity->activity_name }}</h5>
                                    <p class="card-text text-truncate">{{ Str::limit($activity->description, 100) }}</p>
                                    
                                    @if ($activity->category !== 'Open to All' && $activity->club_id)
                                        <p class="card-text"><strong>Kelab:</strong> {{ $activity->club->club_name }}</p>
                                    @endif

                                    <div class="d-flex justify-content-center gap-2">
                                        @if (auth()->user()->role === 'teacher')
                                            <a href="{{ route('activities.edit', $activity->activity_id) }}"
                                                class="btn btn-outline-success">
                                                <i class="fas fa-edit"></i> Kemaskini
                                            </a>
                                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal"
                                                data-url="{{ route('activities.destroy', $activity->activity_id) }}">
                                                <i class="fas fa-trash"></i> Padam
                                            </button>
                                        @else
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
