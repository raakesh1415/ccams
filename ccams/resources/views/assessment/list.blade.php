<x-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Assessment List
                
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <a href="{{ url('assessment/list/create') }}" class="ms-1 btn btn-md btn-success float-end">
                        <span class="fa fa-plus"></span> Add Assessment</a>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Total Mark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assessment as $as)
                        <tr>
                            <td>{{ $as->user->name ?? 'N/A' }}</td>
                            <td>{{ $as->comment }}</td>
                            <td>{{ $as->total_mark }}%</td>
                            <td>
                                {{-- <a href="{{ route('assessment.create', $as->assessment_id) }}" class="btn btn-sm btn-success"><span class="fa fa-plus"></i>"></span></a> --}}
                                <a href="{{ route('assessment.show', 'assessment_id') }}" class="btn btn-sm btn-info"><span class="fa fa-eye"></a>
                                <a href="{{ route('assessment.edit', ['assessment_id' => $as->assessment_id]) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>
                                {{-- <a href="{{ route('assessment.destroy', ['assessment_id' => $as->assessment_id]) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a> --}}
                                <form action="{{ route('assessment.destroy', $as->assessment_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this assessment?');">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </form>    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>