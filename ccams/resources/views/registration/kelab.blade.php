<x-layout>
    <div class="container mt-5">
        <h2 class="text-center">KELAB / PERSATUAN</h2>

        <!-- Kelab Listings -->
        <!-- Image, member_count,...variable have to be same as Club Model variable -->
        <div class="row mt-4">
            @foreach ($kelab as $club)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="row g-0">
                            <div class="col-md-4">

                                <img src="{{ asset($club->image) }}" class="img-fluid rounded-start"
                                    alt="{{ $club->name }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column">
                                    <h3 class="card-title">{{ $club->name }}</h3>
                                    <p class="text-muted">
                                        <i class="fas fa-users"></i> {{ $club->members_count }} Members
                                    </p>
                                    <h5>Description</h5>
                                    <p class="card-text text-justify">{{ $club->description }}</p>
                                    <div class="mt-auto">
                                        <a href="{{ route('registration.register', $club->id) }}"
                                            class="btn btn-dark">Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('registration.index') }}" class="btn btn-dark">Return</a>
        </div>
    </div>

    <style>
        /* Additional styling to ensure layout structure */
        h3 {
            margin: 0;
            font-size: 1.25rem;
        }

        h5 {
            margin: 10px 0 5px;
            font-size: 1rem;
        }

        @media (max-width: 768px) {
            .card-body {
                text-align: center;
            }
        }
    </style>
</x-layout>
