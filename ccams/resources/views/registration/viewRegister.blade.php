<x-layout>
    <div class="container mt-5">
        <h2 class="text-center"><b>Your Registered Clubs</b></h2>

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
                            <button type="button" class="btn btn-danger" title="Unregister">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
