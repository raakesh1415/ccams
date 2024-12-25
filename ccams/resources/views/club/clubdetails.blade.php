<x-layout>
    <x-slot name="header">
        <h2>{{ $clubs->club_name }} - Maklumat Kelab</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="d-flex flex-column gap-4">
            <!-- First Box (Persatuan Bahasa Melayu) -->
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

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2 mt-3">
                            @php
                                // Check if the logged-in teacher is registered to this club
                                $isRegisteredTeacher = $clubs->registrations->contains(function ($registration) {
                                    return $registration->user->id === Auth::id() && Auth::user()->role === 'teacher';
                                });
                            @endphp

                            @if($isRegisteredTeacher)
                                <!-- Edit Button -->
                                <a href="{{ route('club.edit', ['club_id' => $clubs->club_id]) }}" class="btn btn-outline-success">
                                    <i class="fas fa-edit"></i> Ubah
                                </a>

                                <!-- Delete Button to Trigger Modal -->
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    <i class="fas fa-trash"></i> Padam
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Box (Senarai Pelajar Berdaftar) -->
            <div class="shadow-sm border rounded p-4" style="min-height: 300px;">
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
                                    <th>No. IC</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentRegistrations as $registration)
                                    <tr>
                                        <td>{{ $registration->user->name }}</td>
                                        <td>{{ $registration->user->classroom }}</td>
                                        <td>{{ $registration->user->ic }}</td>
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
        </div>
    </div>
</x-layout>
