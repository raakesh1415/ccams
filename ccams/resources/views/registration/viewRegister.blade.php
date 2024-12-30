<x-layout>
    <div class="container-fluid">
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
                <option value="card" selected>Kad</option>
                <option value="list">Senarai</option>
            </select>
        </div>

        <!-- Check if there are any registrations -->
        @if ($registrations->isEmpty())
            <div class="text-center">
                <p><b>Tiada kelab didaftarkan.</b></p>
            </div>
        @else
            <!-- List View -->
            <div id="club-list-view" class="row mt-4" style="display: none;">
                @foreach ($registrations as $registration)
                    <div class="col-12 mb-4 list-view">
                        <div class="card shadow-sm h-100 rounded-3">
                            <div class="card-body d-flex align-items-start p-0">
                                <!-- Club Image -->
                                <div class="image-container"
                                    style="flex-shrink: 0; margin-right: 1rem; padding: 0; width: 200px; height: 130px; overflow: hidden; border-radius: 5px">
                                    <img src="{{ asset('storage/' . $registration->club->club_pic) }}" alt="Club Image"
                                        class="club-image"
                                        style="width: 100%; height: 100%; object-fit: fill; padding: 0;">
                                </div>
                                <!-- Club Details -->
                                <div class="flex-grow-1 p-4">
                                    <h5 class="card-title">{{ $registration->club->club_name }}</h5>
                                    <p style="font-size: 1.1rem;">{{ $registration->club_type }}</p>
                                </div>
                                <!-- Delete Button with Trash Icon -->
                                <form id="unregistrationForm-{{ $registration->registration_id }}"
                                    action="{{ route('registration.unregister', ['registrationId' => $registration->registration_id]) }}"
                                    method="POST" style="display: inline; padding: 20px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        style="font-size: 1.2rem; padding: 0.4rem 0.6rem;" data-bs-toggle="modal"
                                        data-bs-target="#confirmationModal-{{ $registration->registration_id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Confirmation Modal for List View -->
                    <div class="modal fade" id="confirmationModal-{{ $registration->registration_id }}" tabindex="-1"
                        aria-labelledby="confirmationModalLabel-{{ $registration->registration_id }}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <i class="fa fa-question-circle text-black" style="font-size: 50px;"></i>
                                    <h5 class="modal-title mt-3"
                                        id="confirmationModalLabel-{{ $registration->registration_id }}">
                                        PENGESAHAN PEMBATALAN
                                    </h5>
                                    <p class="mt-3">Adakah anda pasti mahu membatalkan pendaftaran daripada
                                        <strong>{{ $registration->club->club_name }}</strong>?
                                    </p>
                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="button" class="btn btn-secondary me-2"
                                            data-bs-dismiss="modal">Tidak</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="document.getElementById('unregistrationForm-{{ $registration->registration_id }}').submit();">
                                            Pasti
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Card View -->
            <div id="club-card-view" class="row mt-4">
                @foreach ($registrations as $registration)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card club-card">
                            <!-- Club Image -->
                            <div class="ratio ratio-4x3"> <!-- Menyesuaikan nisbah aspek kepada 16:9 -->
                                <img src="{{ asset('storage/' . $registration->club->club_pic) }}" alt="Gambar Kelab"
                                    class="card-img-top img-fluid"> <!-- Memastikan gambar sesuai dalam bekas -->
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $registration->club->club_name }}</h5>
                                <p class="card-text text-center">{{ $registration->club_type }}</p>
                                <div class="d-flex justify-content-center">
                                    <!-- Trash Icon Button -->
                                    <form id="unregistrationForm-card-{{ $registration->registration_id }}"
                                        action="{{ route('registration.unregister', ['registrationId' => $registration->registration_id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger"
                                            style="font-size: 1.2rem; padding: 0.4rem 0.6rem;" data-bs-toggle="modal"
                                            data-bs-target="#confirmationModal-card-{{ $registration->registration_id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Confirmation Modal for Card View -->
                    <div class="modal fade" id="confirmationModal-card-{{ $registration->registration_id }}"
                        tabindex="-1"
                        aria-labelledby="confirmationModalLabel-card-{{ $registration->registration_id }}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <i class="fa fa-question-circle text-black" style="font-size: 50px;"></i>
                                    <h5 class="modal-title mt-3"
                                        id="confirmationModalLabel-card-{{ $registration->registration_id }}">
                                        PENGESAHAN PEMBATALAN
                                    </h5>
                                    <p class="mt-3">Adakah anda pasti mahu membatalkan pendaftaran daripada
                                        <strong>{{ $registration->club->club_name }}</strong>?
                                    </p>
                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="button" class="btn btn-secondary me-2"
                                            data-bs-dismiss="modal">Tidak</button>
                                        <button type="button" class="btn btn-danger"
                                            onclick="document.getElementById('unregistrationForm-card-{{ $registration->registration_id }}').submit();">
                                            Pasti
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Script to Toggle Views -->
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
