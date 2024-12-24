<x-layout>
    <x-slot name="header">
        <h2>{{ $clubs->club_name }} - Maklumat Kelab</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="row shadow-sm border rounded p-4">
            <!-- Image on the Left -->
            <div class="col-md-4 text-center">
                <img src="{{ asset('storage/' . $clubs->club_pic) }}" class="img-fluid rounded" alt="Club Image" style="object-fit: cover; width: 100%; max-height: 300px;">
            </div>

            <!-- Details on the Right -->
            <div class="col-md-8">
                <h3 class="h4">{{ $clubs->club_name }}</h3>
                <p class="text-muted"><strong>Kategori:</strong> {{ $clubs->club_category }}</p>
                <p>{{ $clubs->club_description }}</p>
                <p class="text-secondary"><strong>Jumlah Pelajar:</strong> {{ $clubs->participant_total }}</p>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 mt-3">
                    <!-- Edit Button -->
                    <a href="{{ route('club.edit', ['club_id' => $clubs->club_id]) }}" class="btn btn-outline-success">
                        <i class="fas fa-edit"></i> Ubah
                    </a>

                    <!-- Delete Button to Trigger Modal -->
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="fas fa-trash"></i> Padam
                    </button>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <i class="fas fa-times-circle text-danger" style="font-size: 50px;"></i>
                        <h5 class="modal-title mt-3" id="deleteModalLabel">Adakah kamu pasti?</h5>
                        <p class="mt-3">Adakah kamu benar-benar mahu memadamkan kelab ini?<br>Proses ini tidak boleh dibatalkan setelah kelab dipadam.</p>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('club.destroy', ['club_id' => $clubs->club_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Padam</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
    </div>

        <!-- Registered Students Section -->
<div class="mt-4 shadow-sm border rounded p-4">
    <h4 class="mb-3">Senarai Pelajar Berdaftar</h4>

    @php
        // Filter registrations to include only students
        $studentRegistrations = $clubs->registrations->filter(function ($registration) {
            return $registration->user->role === 'student';
        });
    @endphp

    @if($studentRegistrations->isEmpty())
        <p class="text-muted">Tiada pelajar berdaftar buat masa ini.</p>
    @else
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Nama Pelajar</th>
                        <th>Kelas</th>
                        <th>Email</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studentRegistrations as $registration)
                        <tr>
                            <td>{{ $registration->user->name }}</td>
                            <td>{{ $registration->user->classroom }}</td>
                            <td>{{ $registration->user->email }}</td>
                            <td>
                                <a href="{{ route('club.student', $registration->user->id) }}" 
                                    class="btn btn-outline-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
</x-layout>