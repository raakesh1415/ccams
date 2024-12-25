<x-layout>
    <div class="container-fluid">
        <h1 class="text-left" style="text-transform: uppercase;"><b><i>SELAMAT DATANG, {{ $user->name }} !</i></b></h1>
        <h5 class="text-left">Semoga hari yang hebat! Semoga berjaya!</h5><br>
        <h2 class="text-left"><b>Kelab Berdaftar Anda</b></h2>
        @if ($registrations->isEmpty())
            <div class="text-center">
                <p><b>Tiada kelab didaftarkan.<b></p>
            </div>
        @else
            <div class="row g-3">
                @foreach ($registrations as $registration)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card shadow-sm h-100">
                            <!-- Club Image with Badge -->
                            <div class="ratio ratio-16x9">
                                <img src="{{ asset('storage/' . $registration->club->club_pic) }}" alt="Club Image"
                                    class="card-img-top img-fluid">
                                <div class="position-absolute top-0 start-0 m-2 pt-2">
                                    <span class="bg-dark text-white p-2 rounded">{{ $registration->club_type }}</span>
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column">
                                <!-- Club Name -->
                                <h4 class="card-title text-center text-dark">{{ $registration->club->club_name }}</h4>
                                <br>

                                <!-- Club Registered Status -->
                                <div class="text-center mt-auto">
                                    <a href="{{ route('dashboard.club.show', $registration->club->club_id) }}"
                                        class="bg-success text-white p-2 rounded text-decoration-none">
                                        Berdaftar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
