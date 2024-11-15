<x-layout>
    <div class="container mt-5">
        <h2 class="text-center"><b>CLUB TYPES</b></h2>
        <div class="row mt-4">

            <!-- Kelab / Persatuan-->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/std_kelab.jpeg') }}" class="card-img-top" alt="Kelab / Persatuan">
                    <div class="card-body d-flex flex-column">
                        <h3 class="text-center">Kelab / Persatuan</h3>
                        <p class="card-text text-justify">Encompasses a variety of clubs and associations, including
                            academic, arts, and cultural clubs, allowing students to develop their interests and talents
                            beyond the classroom while fostering teamwork and leadership values.</p>
                        <a href="{{ route('registration.kelab') }}" class="btn btn-dark mt-auto">Explore</a>
                    </div>
                </div>
            </div>

            <!-- Sukan / Permainan -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/std_sukan.png') }}" class="card-img-top" alt="Sukan / Permainan">
                    <div class="card-body d-flex flex-column">
                        <h3 class="text-center">Sukan / Permainan</h3>
                        <p class="card-text text-justify">Activities involving sports and games to encourage students to
                            stay active, healthy, and build sportsmanship. Through sports, students learn discipline,
                            strategy, and teamwork.</p>
                        <a href="{{ route('registration.sukan') }}" class="btn btn-dark mt-auto">Explore</a>
                    </div>
                </div>
            </div>

            <!-- Unit Beruniform -->
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('images/std_beruniform.png') }}" class="card-img-top" alt="Unit Beruniform">
                    <div class="card-body d-flex flex-column">
                        <h3 class="text-center">Unit Beruniform</h3>
                        <p class="card-text text-justify">Includes units like Scouts, Cadets, and St. John Ambulance
                            that provide training in physical endurance, leadership, and life skills while instilling
                            patriotism and discipline among students.</p>
                        <a href="{{ route('registration.beruniform') }}" class="btn btn-dark mt-auto">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
