<x-layout>
    <div class="container mt-5">
        <h1 class="text-left" style="text-transform: uppercase;"><b><i>SELAMAT DATANG, {{ $user->name }} !</i></b></h1>
        <h5 class="text-left">Semoga hari yang hebat! Semoga berjaya!</h5><br>
        <h2 class="text-left"><b>Kelas Berdaftar Anda</b></h2>

        <div class="row">
            <div class="col-4">
                <div class="card shadow-sm h-100">
                    <!-- Class Image-->
                    <div class="position-relative">
                        <img src="{{ asset('storage/class_pics/class.png') }}" alt="Club Image" class="card-img-top"
                            style="height: 150px; object-fit: cover;">
                    </div>

                    <div class="card-body">
                        <!-- Class Name -->
                        <h4 class="card-title text-center">{{ $user->class }}</h4>

                        <!-- Class Registered Status -->
                        <div class="text-center mb-1 p-1">
                            <span class="bg-success text-white p-2 rounded">Berdaftar</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-4"></div>

            <h2 class="text-left"><b>Kelab Berdaftar Anda</b></h2>
            @if ($registrations->isEmpty())
                <div class="text-center">
                    <p><b>Tiada kelab didaftarkan.<b></p>
                </div>
            @else
                <div class="row">
                    @foreach ($registrations as $registration)
                        <div class="col-4">
                            <div class="card shadow-sm h-100">
                                <!-- Club Image with Badge -->
                                <div class="position-relative">
                                    <img src="{{ asset('storage/' . $registration->club->club_pic) }}" alt="Club Image"
                                        class="card-img-top" style="height: 150px; object-fit: cover;">
                                    <div class="position-absolute top-0 start-0 m-2">
                                        <span
                                            class="bg-dark text-white p-2 rounded">{{ $registration->club_type }}</span>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <!-- Club Name -->
                                    <h4 class="card-title text-center">{{ $registration->club->club_name }}</h4>

                                    <!-- Club Registered Status -->
                                    <div class="text-center mb-1 p-1">
                                        <span class="bg-success text-white p-2 rounded">Berdaftar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="row my-4"></div>
            <h2 class="text-left"><b>Aktiviti Terancang Anda</b></h2>
        </div>
</x-layout>
