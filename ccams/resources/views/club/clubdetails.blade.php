<x-layout>
    <x-slot name="header">
        <h2>{{ $clubs->club_name }} - Club Details</h2>
    </x-slot>

    <div class="container mt-4">
        <div class="row shadow-sm border rounded p-4">
            <!-- Image on the Left -->
            <div class="col-md-4 text-center">
                <img src="{{ asset('storage/' . $clubs->club_pic) }}" class="img-fluid rounded" alt="Club Image" style="object-fit: cover; width: 100%; max-height: 300px;">
            </div>

            <!-- Details on the Right -->
            <div class="col-md-8">
                <h3 class="h4">{{ $clubs->club_name }}</h3>
                <p class="text-muted"><strong>Category:</strong> {{ $clubs->club_category }}</p>
                <p>{{ $clubs->club_description }}</p>
                <p class="text-secondary"><strong>Total Participants:</strong> {{ $clubs->participant_total }}</p>

                <!-- Action Buttons -->
                <div class="d-flex gap-2 mt-3">
                    <!-- Edit Button -->
                    <a href="{{ route('club.edit', ['club_id' => $clubs->club_id]) }}" class="btn btn-outline-success">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <!-- Delete Button to Trigger Modal -->
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <i class="fas fa-trash"></i> Delete
                    </button>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <i class="fas fa-times-circle text-danger" style="font-size: 50px;"></i>
                        <h5 class="modal-title mt-3" id="deleteModalLabel">Are you sure?</h5>
                        <p class="mt-3">Do you really want to delete this Club?<br>This process cannot be undone.</p>
                        <div class="d-flex justify-content-center mt-4">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('club.destroy', ['club_id' => $clubs->club_id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
    </div>
</x-layout>
