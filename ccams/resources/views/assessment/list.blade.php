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
                            <th>Position</th>
                            <th>Engagement</th>
                            <th>Commitment</th>
                            <th>Achievement</th>
                            <th>Contribution</th>
                            <th>Attendance</th>
                            <th>Comment</th>
                            <th>Total Mark</th>
                            <th>Action</th>
                            {{-- <th>Comment</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assessments as $as)
                        <tr>
                            <td>{{ $as->position }}</td>
                            <td>{{ $as->engagement }}</td>
                            <td>{{ $as->commitment }}</td>
                            <td>{{ $as->achievement }}</td>
                            <td>{{ $as->contribution }}</td>
                            <td>{{ $as->attendance }}</td>
                            <td>{{ $as->comment }}</td>
                            <td>{{ $as->total_mark }}</td>
                            <td>
                                {{-- <a href="{{ route('assessment.create', $as->assessment_id) }}" class="btn btn-sm btn-success"><span class="fa fa-plus"></i>"></span></a> --}}
                                <a href="{{ route('assessment.show', $as->assessment_id) }}" class="btn btn-sm btn-info"><span class="fa fa-eye"></a>
                                <a href="{{ route('assessment.edit', $as->assessment_id) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></a>
                                <a href="{{ route('assessment.destroy', $as->assessment_id) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <script>
        $(document).ready(function() {
            $('#datatablesSimple').DataTable({
                "paging": true,
                "pageLength": 10,
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                "language": {
                    "paginate": {
                        "previous": "Previous",
                        "next": "Next"
                    }
                }
            });
        });
    </script> --}}
</x-layout>