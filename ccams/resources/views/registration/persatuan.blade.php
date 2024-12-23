<x-layout>
    <div class="container mt-5">
        <h2 class="text-center"><b>PERSATUAN</b></h2>

        <!-- Display prompt messages -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Kelab Listings -->
        <div class="row mt-4">
            @if ($persatuan->isEmpty())
                <div class="text-center">
                    <p><b>Tiada kelab tersedia untuk pendaftaran pada masa ini.<b></p>
                </div>
            @else
                @foreach ($persatuan as $club)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="row g-0 h-100">
                                <div class="col-md-4 h-100">
                                    <div class="ratio ratio-1x1">
                                        <img src="{{ asset('storage/' . $club->club_pic) }}"
                                            class="img-fluid rounded-start w-100 h-100" alt="{{ $club->club_name }}"
                                            style="object-fit: cover;">
                                        class="img-fluid rounded-start w-100 h-100"
                                        alt="{{ $club->club_name }}"
                                        style="object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3 class="card-title m-0">{{ $club->club_name }}</h3>
                                            <form
                                                action="{{ route('registration.register', ['clubId' => $club->club_id, 'clubType' => $club->club_category]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-dark" title="Register"
                                                    onclick="return confirm('Adakah anda pasti mahu mendaftar untuk kelab ini?');">
                                                    Mendaftar
                                                </button>
                                            </form>
                                        </div>
                                        <p class="text-muted mt-2">
                                            <i class="fas fa-users"></i> {{ $club->participant_total }} Ahli
                                        </p>
                                        <h5>Keterangan</h5>
                                        <p class="card-text text-justify">{{ $club->club_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('registration.index') }}" class="btn btn-dark">Kembali</a>
        </div>
    </div>

    <style>
        .image-container {
            position: relative;
            overflow: hidden;
        }

        h3 {
            font-size: 1.25rem;
            margin: 0;
        }

        h5 {
            margin: 10px 0 5px;
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .card-body {
                text-align: center;
            }

            .image-container {
                height: 200px;
                /* Fixed height for mobile */
            }
        }
    </style>
</x-layout>
