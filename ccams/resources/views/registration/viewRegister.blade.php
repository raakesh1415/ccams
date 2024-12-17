<x-layout>
    <div class="container mt-5">
        <h2 class="text-center"><b>KELAB BERDAFTAR</b></h2>

        <!-- Display success or error messages -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Toggle View Dropdown -->
        <div class="d-flex justify-content-end mb-3">
            <select id="view-toggle" class="form-select" style="width: 170px;">
                <option value="list" selected>List</option>
                <option value="card">Card</option>
            </select>
        </div>

        <!-- Check if there are any registrations -->
        @if ($registrations->isEmpty())
            <div class="text-center">
                <p><b>Tiada kelab didaftarkan.<b></p>
            </div>
        @else
            <!-- Registered Clubs View -->
            <div id="club-list-view" class="row mt-4">
                <!-- List View -->
                @foreach ($registrations as $registration)
                    <div class="col-12 mb-4 list-view">
                        <div class="card shadow-sm h-100 rounded-3">
                            <div class="card-body d-flex align-items-start p-0">
                                <!-- Club Image -->
                                <div class="image-container"
                                    style="flex-shrink: 0; margin-right: 1rem; padding: 0; width: 200px; height: 130px; overflow: hidden; border-radius: 5px">
                                    <img src="{{ asset('storage/' . $registration->club->club_pic) }}" alt="Club Image"
                                        class="club-image"
                                        style="width: 100%; height: 100%; object-fit: cover; padding: 0;">
                                </div>
                                <!-- Club Details -->
                                <div class="flex-grow-1 p-3">
                                    <h4 class="card-title">{{ $registration->club->club_name }}</h4>
                                    <p style="font-size: 1.1rem;">{{ $registration->club_type }}</p>
                                </div>
                                <!-- Delete Button with Trash Icon -->
                                <form
                                    action="{{ route('registration.unregister', ['registrationId' => $registration->registration_id]) }}"
                                    method="POST" style="display: inline; padding: 20px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Unregister"
                                        style="font-size: 1.2rem; padding: 0.4rem 0.6rem;"
                                        onclick="return confirm('Adakah anda pasti mahu membatalkan pendaftaran daripada kelab ini?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Card View -->
            <div id="club-card-view" class="row mt-4" style="display: none;">
                @foreach ($registrations as $registration)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100 position-relative">
                            <!-- Badge for Club Type -->
                            <div class="position-absolute" style="top: 10px; left: 10px;">
                                <span class="bg-dark text-white p-2 rounded" style="font-size: 1rem;">
                                    {{ $registration->club_type }}
                                </span>
                            </div>
                            <!-- Club Image -->
                            <img src="{{ asset('storage/' . $registration->club->club_pic) }}" alt="Club Image"
                                class="card-img-top" style="height: 180px; object-fit: cover;">
                            <!-- Card Body -->
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h4 class="card-title">{{ $registration->club->club_name }}</h4>
                                <div class="d-flex justify-content-end">
                                    <!-- Trash Icon Button -->
                                    <form
                                        action="{{ route('registration.unregister', ['registrationId' => $registration->registration_id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Unregister"
                                            style="font-size: 1.2rem; padding: 0.4rem 0.6rem;"
                                            onclick="return confirm('Adakah anda pasti mahu membatalkan pendaftaran daripada kelab ini?');">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        @endif
        <div class="text-center mt-4" style="padding: 10px">
            <a href="{{ route('registration.index') }}" class="btn btn-dark">Return</a>
        </div>
    </div>

    <!-- Add Script to Toggle Views -->
    <script>
        document.getElementById('view-toggle').addEventListener('change', function() {
            const listView = document.getElementById('club-list-view');
            const cardView = document.getElementById('club-card-view');

            if (this.value === 'list') {
                listView.style.display = 'block';
                cardView.style.display = 'none';
            } else {
                listView.style.display = 'none';
                cardView.style.display = 'flex';
            }
        });
    </script>
</x-layout>
