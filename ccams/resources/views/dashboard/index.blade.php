<x-layout>
    <div class="container-fluid">
        <h1 class="text-left" style="text-transform: uppercase; font-size: 2.5rem;"><b><i>SELAMAT DATANG, {{ $user->name }} !</i></b></h1>
        <h5 class="text-left" style="font-size: 1.25rem;">Semoga hari yang hebat! Semoga berjaya!</h5><br>
        <h2 class="text-left" style="font-size: 2rem;"><b>Kelab Berdaftar Anda</b></h2>
        @if ($registrations->isEmpty())
            <div class="text-center">
                <p style="font-size: 1.25rem;"><b>Tiada kelab didaftarkan.<b></p>
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
                                <h4 class="card-title text-center text-dark" style="font-size: 1.5rem;">{{ $registration->club->club_name }}</h4>
                                <br>

                                <!-- Club Registered Status -->
                                <div class="text-center mt-auto">
                                    <a href="{{ route('dashboard.club.show', $registration->club->club_id) }}"
                                        class="bg-success text-white p-2 rounded text-decoration-none" style="font-size: 1rem;">
                                        Berdaftar
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <h2 class="text-left mt-5" style="font-size: 2rem;"><b>Aktiviti Akan Datang</b></h2>
        @if ($activities->isEmpty())
            <div class="text-center">
                <p style="font-size: 1.25rem;"><b>Tiada aktiviti untuk kelab berdaftar.<b></p>
            </div>
        @else
            <div class="list-group">
                @foreach ($activities as $activity)
                    <div class="list-group-item list-group-item-action py-4 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ $activity->poster ? asset('storage/' . $activity->poster) : asset('images/sample-activity.png') }}" 
                                 alt="Activity Poster" class="img-fluid me-3" style="width: 100px; height: 100px; object-fit: cover;">
                            <div>
                                <a href="{{ route('activities.show', $activity->activity_id) }}" class="text-decoration-none text-dark">
                                    <h5 class="mb-1" style="font-size: 1.25rem;">{{ $activity->activity_name }}</h5>
                                    <small style="font-size: 1rem;">{{ \Carbon\Carbon::parse($activity->date_time)->format('d M Y, h:i A') }}</small>
                                    <p class="mb-1" style="font-size: 1rem;">{{ Str::limit($activity->description, 100) }}</p>
                                    @if ($activity->category === 'Open to All')
                                        <small style="font-size: 1rem;"><strong>Terbuka Kepada Semua</strong></small>
                                    @elseif ($activity->club_id)
                                        <small style="font-size: 1rem;"><strong>Kelab:</strong> {{ $activity->club->club_name }}</small>
                                    @endif
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('activities.show', $activity->activity_id) }}" class="btn btn-outline-info btn-md">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
