<x-layout>
    {{-- <x-slot name="header">
        
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User  Profile" class="img-fluid rounded-circle" style="width: 100px; height: 100px;"> <!-- Replace with actual profile picture path -->
        </div>
    </x-slot> --}}

    <div class="text-center pt-3 pb-4">
        <h2 class="text-start ">Assessment</h2>
        <h4 class="text-start pt-4">My Clubs</h4>
        <div class="row g-4 mt-0">
            <!-- Club 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card club-card">
                    <img src="{{ asset('images/unitberuniform.jpg') }}" alt="St John's Ambulance" class="card-img-top p-0">
                    <div class="card-body">
                        <h5 class="card-title">St John's Ambulance</h5>
                        <p class="card-text">Uniform Body</p>
                        <button class="btn btn-dark">Assessment</button>
                    </div>
                </div>
            </div>
            <!-- Club 2 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card club-card">
                    <img src="{{ asset('images/persatuan.jpg') }}" alt="Coding & Robotics" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Coding & Robotics</h5>
                        <p class="card-text">Society</p>
                        <button class="btn btn-dark">Assessment</button>
                    </div>
                </div>
            </div>
            <!-- Club 3 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card club-card">
                    <img src="{{ asset('images/sukanpermainan.jpg') }}" alt="Badminton" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Badminton</h5>
                        <p class="card-text">Sports & Games</p>
                        <button class="btn btn-dark">Assessment</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-layout>