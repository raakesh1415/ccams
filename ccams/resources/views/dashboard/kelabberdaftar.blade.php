<x-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2>{{ $clubs->club_name }} - Maklumat Kelab</h2>
            <a href="{{ url()->previous() }}" class="btn btn-dark">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex flex-column gap-4">
            <!-- Club Info Box -->
            <div class="shadow-sm border rounded p-4 d-flex align-items-stretch" style="min-height: 300px;">
                <div class="row w-100">
                    <!-- Image on the Left -->
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('storage/' . $clubs->club_pic) }}" class="img-fluid rounded" alt="Club Image" style="object-fit: cover; width: 100%; max-height: 300px;">
                    </div>

                    <!-- Details on the Right -->
                    <div class="col-md-8 d-flex flex-column justify-content-between">
                        <div>
                            <h3 class="h4">{{ $clubs->club_name }}</h3>
                            <p class="text-muted"><strong>Kategori:</strong> {{ $clubs->club_category }}</p>
                            <p>{{ $clubs->club_description }}</p>
                            <p class="text-secondary"><strong>Jumlah Pelajar:</strong> {{ $clubs->participant_total }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>