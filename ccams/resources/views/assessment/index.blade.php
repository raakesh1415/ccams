<x-layout>
    <div class="text-center pt-3 pb-4">
        <h2 class="text-start">Assessment</h2>
        <h4 class="text-start pt-4">My Clubs</h4>
        <div class="row g-4 mt-0">
            @foreach ($registrations as $registration)
            <!-- Club 1 -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card club-card">
                    <div class="ratio ratio-16x9"> <!-- Adjusts the aspect ratio to 16: -->
                        <img src="{{ asset('storage/' . $registration->club->club_pic) }}" alt="Club Image" class="card-img-top img-fluid"> <!-- Ensures the image fits within the container -->
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $registration->club->club_name }}</h5>
                        <p class="card-text">{{ $registration->club_type }}</p>
                        @if (Auth::user()->role === 'teacher')
                            <a href="{{ route('assessment.list', $registration->club->club_id) }}" class="btn btn-dark">Assessment</a>
                        @endif
                        @if (Auth::user()->role === 'student')
                            <a href="{{ route('assessment.view') }}" class="btn btn-dark">Assessment</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>
