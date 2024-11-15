<x-layout>
    <div class="container mt-5">
        <h2 class="text-center"><b>REGISTERED CLUBS</b></h2>

        <!-- Display success or error messages -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Check if there are any registrations -->
        @if ($registrations->isEmpty())
            <div class="alert alert-danger">You have not registered for any clubs yet.</div>
        @else
            <!-- Registered Clubs List -->
            <div class="row mt-4">
                @foreach ($registrations as $registration)
                    <div class="col-12 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex align-items-start">
                                <!-- Club Image -->
                                <img src="{{ asset($registration->club->club_pic) }}" alt="Club Image"
                                    class="img-thumbnail me-3" style="width: 180px; height: 180px; object-fit: cover;">

                                <!-- Club Details -->
                                <div class="flex-grow-1">
                                    <h4 class="card-title">{{ $registration->club->club_name }}</h4>
                                    <p class="text-muted mb-1">{{ $registration->club_type }}</p>
                                    <p style="text-align: justify;">{{ $registration->club->club_description }}</p>
                                </div>

                                <!-- Delete Button with Trash Icon -->
                                <form
                                    action="{{ route('registration.unregister', ['registrationId' => $registration->registration_id]) }}"
                                    method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Unregister"
                                        onclick="return confirm('Are you sure you want to unregister from this club?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
