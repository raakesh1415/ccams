<x-layout>
    <div class="container mt-5">
        <h2 class="text-center"><b>UNIT BEUNIFORM</b></h2>

        <!-- Display prompt messages -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Kelab Listings -->
        <div class="row mt-4">
            @foreach ($beruniform as $club)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset($club->club_pic) }}" class="img-fluid rounded-start"
                                    alt="{{ $club->club_name }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h3 class="card-title m-0">{{ $club->club_name }}</h3>
                                        <form
                                            action="{{ route('registration.register', ['clubId' => $club->club_id, 'clubType' => $club->club_category]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-dark btn-sm">Register</button>
                                        </form>
                                    </div>
                                    <p class="text-muted mt-2">
                                        <i class="fas fa-users"></i> {{ $club->participant_total }} Members
                                    </p>
                                    <h5>Description</h5>
                                    <p class="card-text text-justify">{{ $club->club_description }}</p>
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
        }
    </style>
</x-layout>
