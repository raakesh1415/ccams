<x-layout>
    <div class="container mt-5">
        <h2 class="text-center"><b>REGISTERED CLUBS</h2>

        @if ($registrations->isEmpty())
            <p class="text-center">You have not registered for any clubs yet.</p>
        @else
            <div class="row mt-4">
                @foreach ($registrations as $registration)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h3 class="card-title">{{ $registration->club->club_name }}</h3>
                                <p><strong>Type:</strong> {{ $registration->club_type }}</p>
                                <p>{{ $registration->club->club_description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
