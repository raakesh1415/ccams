<x-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Assessment list
                            <a href="{{ url('assessment/list/create') }}" class="btn btn-success float-end">Add
                                Assessment</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Engagement</th>
                                    <th>Commitment</th>
                                    <th>Achievement</th>
                                    <th>Contribution</th>
                                    <th>Total Mark</th>
                                    <th>Action</th>
                                    {{-- <th>Comment</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assessment as $as)
                                <tr>
                                    <td>{{ $as->position }}</td>
                                    <td>{{ $as->engagement }}</td>
                                    <td>{{ $as->commitment }}</td>
                                    <td>{{ $as->achievement }}</td>
                                    <td>{{ $as->contribution }}</td>
                                    <td>{{ $as->totalMarks }}</td>
                                    <td>
                                        <a href="{{ route('assessment.show', $as->id) }}" class="btn btn-info">View</a>
                                        <a href="{{ route('assessment.edit', $as->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ route('assessment.destroy', $as->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
