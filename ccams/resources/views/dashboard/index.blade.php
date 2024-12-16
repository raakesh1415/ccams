<x-layout>
    <div class="container mt-5">
        <h1 class="text-left" style="text-transform: uppercase;"><b><i>WELCOME, {{ $user->name }} !</i></b></h1>
        <h5 class="text-left">Have a great day! Good Luck!</h5><br>

        <h2 class="text-left"><b>Your Registered Club</b></h2>

        @if ($registrations->isEmpty())
            <div class="text-center">
                <p><b>No clubs are registered.<b></p>
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
                                    <span class="bg-dark text-white p-2 rounded">{{ $registration->club_type }}</span>
                                </div>
                            </div>

                            <div class="card-body">
                                <!-- Club Name -->
                                <h4 class="card-title text-center">{{ $registration->club->club_name }}</h4>

                                <!-- Club Registered Status -->
                                <div class="text-center mb-1 p-1">
                                    <span class="bg-success text-white p-2 rounded">Registered</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <br>
        <h2 class="text-left"><b>Your Planned Activities</b></h2>
    </div>
</x-layout>
