<x-layout>
    <div class="container-fluid px-4 py-4">
        <h1>{{ $club->club_name }} Assessment List</h1>
        <div class="card mb-4">
            {{-- <div class="card-header"> 
                <i class="fas fa-table me-1"></i> Assessment List for {{ $club->club_name }} 
            </div> --}}
            <div class="card-body">
                <table id="datatablesSimple"> 
                    <a href="{{ route('assessment.create', ['club_id' => $club->club_id]) }}" class="ms-1 btn btn-md btn-success float-end">
                        <span class="fa fa-plus"></span> Add Assessment
                    </a>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Total Mark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assessments as $as)
                            <tr>
                                <td>{{ $as->user->name ?? 'N/A' }}</td>
                                <td>{{ $as->comment }}</td>
                                <td>{{ $as->total_mark }}%</td>
                                <td>
                                    <a href="{{ route('assessment.show', ['assessment_id' => $as->assessment_id]) }}"
                                        class="btn btn-sm btn-info"><span class="fa fa-eye"></a>
                                    <a href="{{ route('assessment.edit', ['assessment_id' => $as->assessment_id]) }}"
                                        class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $as->assessment_id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <!-- Delete Confirmation Modal -->
                                    <div class="modal fade" id="deleteModal{{ $as->assessment_id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $as->assessment_id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <i class="fas fa-times-circle text-danger" style="font-size: 50px;"></i>
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $as->assessment_id }}">Are you sure?</h5>
                                                    <p class="mt-3">Do you really want to delete the assessment mark for {{ $as->user->name }}?<br>This process cannot be undone.</p>
                                                    <div class="d-flex justify-content-center mt-4">
                                                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('assessment.destroy', ['assessment_id' => $as->assessment_id]) }}" method="POST" class="mb-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
