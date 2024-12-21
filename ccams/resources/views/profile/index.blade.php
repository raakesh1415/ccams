<x-layout>
    <div class="container-fluid py-4 px-4 bg-light rounded">
        <div class="row g-4">
            <!-- Left Column: User Info and Profile Photo -->
            <div class="col-lg-4">
                <div class="card text-center border-0 shadow-sm">
                    <div class="card-body">
                        <img src="{{ Auth::user()->profile_pic ? asset('storage/profiles/' . Auth::user()->profile_pic) : asset('images/profile.png') }}" 
                             class="rounded-circle img-fluid mb-3" 
                             alt="Profile Image" 
                             style="width: 150px; height: 150px;">
                        <h3 class="card-title mb-1">{{ $user->name }}</h3>
                        <p class="text-muted mb-3">{{ Auth::user()->role }}</p>
                        <a href="/profile/edit" class="btn btn-primary btn-sm">Edit Profile</a>
                    </div>
                </div>

                <!-- About Me Section -->
                <div class="card mt-4 border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">About Me</h5>
                        <p class="card-text">{{ $user->about_me ?? 'No information provided' }}</p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Additional User Details and Information -->
            <div class="col-lg-8">
                <div class="row g-4">
                    <!-- User Details Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">User Details</h5>
                                <p><strong>Name:</strong> {{ $user->name }}</p>
                                <p><strong>Role:</strong> {{ $user->role }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <p><strong>Class:</strong> {{ $user->classroom }}</p>
                                <a href="{{ route('profile.edit') }}" class="text-muted small">Edit Profile</a>
                            </div>
                        </div>
                    </div>

                    <!-- Address Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Address Details</h5>
                                <p><strong>Country:</strong> {{ $user->country ?? 'Not provided' }}</p>
                                <p><strong>City:</strong> {{ $user->city ?? 'Not provided' }}</p>
                                <p><strong>Address:</strong> {{ $user->address ?? 'Not provided' }}</p>
                                <p><strong>Postal Code:</strong> {{ $user->postal_code ?? 'Not provided' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Activity Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Activity Details</h5>
                                @if($activities->isEmpty())
                                    <p>No activities available.</p>
                                @else
                                    @foreach ($activities as $activity)
                                        <p><strong>Activity:</strong> {{ $activity->activity_name ?? 'Not provided' }}</p>
                                        <p><strong>Location:</strong> {{ $activity->location ?? 'Not provided' }}</p>
                                        <p><strong>Date/Time:</strong> {{ $activity->date_time ?? 'Not provided' }}</p>
                                        <p><strong>Category:</strong> {{ $activity->category ?? 'Not provided' }}</p>
                                        <p><strong>Participants:</strong> {{ $activity->participants ?? 'Not provided' }}</p>
                                        <p><strong>Duration:</strong> {{ $activity->duration ?? 'Not provided' }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Club Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Club Details</h5>
                                @if($clubs->isEmpty())
                                    <p>No clubs available.</p>
                                @else
                                    @foreach ($clubs as $club)
                                        <p><strong>Club Name:</strong> {{ $club->club_name ?? 'Not provided' }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Reports Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Reports</h5>
                                <p><strong>Browser Sessions:</strong> Data available</p>
                                <p><strong>Grades Overview:</strong> Accessible</p>
                            </div>
                        </div>
                    </div>

                    <!-- Login Activity Section -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">Login Activity</h5>
                                <p><strong>Last Login:</strong> {{ \Carbon\Carbon::parse($user->last_login_at)->format('Y-m-d H:i:s') ?? 'Not available' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
