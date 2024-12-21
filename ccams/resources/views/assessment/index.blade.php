<x-layout>
    <div class="container">
        @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
        <div class="text-center">
            {{-- <h2 class="text-start">Assessment</h2> --}}
            <h2 class="text-center">My Clubs</h2>
            <div class="row g-4 mt-0">
                <!-- Classroom -->
                @if (Auth::user()->role === 'teacher')
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card club-card">
                            <div class="ratio ratio-16x9">
                                <img src="{{ asset('storage/class_pics/class.png') }}" alt="Class Image"
                                    class="card-img-top img-fluid">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Class {{ Auth::user()->classroom }}</h5>
                                <p class="card-text">Class Assessment</p>
                                <a href="{{ route('assessment.classlist', Auth::user()->classroom) }}"
                                    class="btn btn-dark">View Class</a>
                            </div>
                        </div>
                    </div>
                @endif
                @foreach ($registrations as $registration)
                    <!-- Clubs -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card club-card">
                            <div class="ratio ratio-16x9"> <!-- Adjusts the aspect ratio to 16: -->
                                <img src="{{ asset('storage/' . $registration->club->club_pic) }}" alt="Club Image"
                                    class="card-img-top img-fluid"> <!-- Ensures the image fits within the container -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $registration->club->club_name }}</h5>
                                <p class="card-text">{{ $registration->club_type }}</p>
                                @if (Auth::user()->role === 'teacher')
                                    <a href="{{ route('assessment.list', $registration->club->club_id) }}"
                                        class="btn btn-dark">Assessment</a>
                                @endif
                                @if (Auth::user()->role === 'student')
                                    <a href="{{ route('assessment.view', $registration->club_id) }}"
                                        class="btn btn-dark">Assessment</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
