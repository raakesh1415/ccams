<x-layout>
    <x-slot name="header">
        <h2>Profil Pelajar</h2>
    </x-slot>
    
    <div class="container mt-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if($user->profile_pic)
                            <img src="{{ asset('storage/' . $user->profile_pic) }}" class="rounded-circle mb-3" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" class="rounded-circle mb-3" 
                                 style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $user->name }}</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Kelas:</strong> {{ $user->classroom }}</p>
                                <p><strong>No. IC:</strong> {{ $user->ic }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Jantina:</strong> {{ ucfirst($user->gender) }}</p>
                                <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Club Memberships -->
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <h4 class="mb-0">Keahlian Kelab</h4>
            </div>
            <div class="card-body">
                @if($user->registrations->isEmpty())
                    <p class="text-muted">Tiada keahlian kelab buat masa ini.</p>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Kelab</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->registrations as $registration)
                                    <tr>
                                        <td>{{ $registration->club->club_name }}</td>
                                        <td>{{ $registration->club->club_category }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- Back Button -->
        <div class="text-end">
            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</x-layout>