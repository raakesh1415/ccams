<x-layout>
    <x-slot name="header">
        <h2 class="text-center">Explore Club</h2>
        <div class="user-profile text-center">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile" class="profile-img rounded-circle">
        </div>
    </x-slot>

    <div class="club-container bg-white py-4">
        <h2 class="text-center mb-4">Club Type</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- Club Type 1 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/persatuan.jpg') }}" alt="Kelab / Persatuan" class="card-img-top">
                    <div class="card-body text-center">
                        <h3 class="card-title">Kelab / Persatuan</h3>
                        <a href="{{ route('club.kelab') }}" class="btn btn-dark mt-auto">See more</a>
                    </div>
                </div>
            </div>
            <!-- Club Type 2 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/sukanpermainan.jpg') }}" alt="Sukan / Permainan" class="card-img-top">
                    <div class="card-body text-center">
                        <h3 class="card-title">Sukan / Permainan</h3>
                        <a href="{{ route('club.sukan') }}" class="btn btn-dark mt-auto">See more</a>
                    </div>
                </div>
            </div>
            <!-- Club Type 3 -->
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/unitberuniform.jpg') }}" alt="Unit Beruniform" class="card-img-top">
                    <div class="card-body text-center">
                        <h3 class="card-title">Unit Beruniform</h3>
                        <a href="{{ route('club.unitberuniform') }}" class="btn btn-dark mt-auto">See more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
