<x-layout>
   

    <!-- Back Button -->
    <div class="text-start">
        <a href="{{ url()->previous() }}" class="btn btn-dark">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>
    
    <div class="container mt-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{ $user->profile_pic ? asset('storage/profiles/' . $user->profile_pic) : asset('images/profile.png') }}" 
                             class="rounded-circle mb-3" 
                             alt="Gambar Profil"
                             style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $user->name }}</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Kelas:</strong> {{ $user->classroom }}</p>
                                <p><strong>No. IC:</strong> {{ $user->ic }}</p>
                                <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Alamat:</strong> {{ $user->address ?? 'Tidak ditetapkan' }}</p>
                                <p><strong>Bandar:</strong> {{ $user->city ?? 'Tidak ditetapkan' }}</p>
                                <p><strong>Negara:</strong> {{ $user->country ?? 'Tidak ditetapkan' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
</x-layout>
