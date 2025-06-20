<x-layout>
    <div class="container-fluid">
        <h2 class="text-center fw-bold">SUKAN</h2>

        {{-- Alerts --}}
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Search Form --}}
        <form action="{{ route('registration.searchSukan') }}" method="GET" class="mt-4">
            <div class="row justify-content-end">
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari kelab..."
                            value="{{ request('query') }}">
                        <button class="btn btn-dark" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        {{-- Clubs List --}}
        <div class="row mt-4">
            @if ($sukan->isEmpty())
                <div class="text-center">
                    <p class="fw-bold">Tiada kelab tersedia untuk pendaftaran pada masa ini.</p>
                </div>
            @else
                @foreach ($sukan as $club)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm">
                            <div class="row g-0 h-100">
                                <div class="col-md-4">
                                    <div class="ratio ratio-1x1">
                                        <img src="{{ asset('storage/' . $club->club_pic) }}"
                                            class="img-fluid rounded-start object-fit-cover"
                                            alt="{{ $club->club_name }}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3 class="fs-5 m-0">{{ $club->club_name }}</h3>
                                            <form id="registrationForm-{{ $club->club_id }}"
                                                action="{{ route('registration.register', ['clubId' => $club->club_id, 'clubType' => $club->club_category]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#confirmationModal-{{ $club->club_id }}">
                                                    Mendaftar
                                                </button>
                                            </form>
                                        </div>
                                        <p class="text-muted mt-2">
                                            <i class="fas fa-users"></i> {{ $club->participant_total }} Ahli
                                        </p>
                                        <h5 class="fs-6 mt-2 mb-1">Keterangan</h5>
                                        <p class="card-text text-justify">{{ $club->club_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="confirmationModal-{{ $club->club_id }}" tabindex="-1"
                        aria-labelledby="confirmationModalLabel-{{ $club->club_id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <i class="fa fa-question-circle text-black" style="font-size: 50px;"></i>
                                    <h5 class="modal-title mt-3" id="confirmationModalLabel-{{ $club->club_id }}">
                                        PENGESAHAN PENDAFTARAN
                                    </h5>
                                    <p class="mt-3">Adakah anda pasti mahu mendaftar untuk kelab
                                        <strong>{{ $club->club_name }}</strong>?
                                    </p>
                                    <div class="d-flex justify-content-center mt-4">
                                        <button type="button" class="btn btn-secondary me-2"
                                            data-bs-dismiss="modal">Tidak</button>
                                        <button type="button" class="btn btn-success"
                                            onclick="document.getElementById('registrationForm-{{ $club->club_id }}').submit();">
                                            Pasti
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- Back Button --}}
        <div class="text-center mt-4">
            <a href="{{ route('registration.index') }}" class="btn btn-dark">Kembali</a>
        </div>
    </div>
</x-layout>
