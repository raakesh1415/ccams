<x-layout>
    <div class="container mt-5">
        <h2 class="text-center"><b>REGISTERED CLUBS</b></h2>

        @if ($registrations->isEmpty())
            <p class="text-center">You have not registered for any clubs yet</p>
        @else
            <!-- Registered Clubs List -->
            <div class="row mt-4">
                @foreach ($registrations as $registration)
                    <div class="col-md-6 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="card-title">{{ $registration->club->club_name }}</h4>
                                    <p class="text-muted mb-1">{{ $registration->club_type }}</p>
                                    <p>{{ $registration->club->club_description }}</p>
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
