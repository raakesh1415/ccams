<x-layout>
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="text-center w-100">
            <h2 class="text-center" style="text-transform: uppercase;"><b>{{ $clubs->club_name }}</b></h2>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

                <div class="col-12 mx-auto">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $clubs->club_pic) }}" class="card-img-top" alt="Gambar Kelab"
                            style="max-width: 100%; height: 350px;">
                        <div class="card-body d-flex flex-column">
                            <h2 class="text-center" style="font-size: 1.5rem;">
                                {{ $clubs->club_category }}</h2>
                            <p class="text-muted mt-2">
                                <i class="fas fa-users me-2"></i>{{ $clubs->participant_total }} Ahli
                            </p>
                            <h2 style="font-size: 1.3rem;">Keterangan</h2>
                            <p class="card-text text-center" style="font-size: 1.2rem;">{{ $clubs->club_description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4 mx-auto">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-dark w-100">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
