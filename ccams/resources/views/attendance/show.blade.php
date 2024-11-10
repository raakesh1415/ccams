<x-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ $club->club_name }} Attendance</h1>
        <p>Category: {{ $club->club_category }}</p>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Attendance List for {{ $club->club_name }}
            </div>
            <div class="card-body">
                @if($students->isEmpty())
                    <p>There is no member in this club.</p>
                @else
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>IC Number</th>
                                <th>W1</th>
                                <th>W2</th>
                                <th>W3</th>
                                <th>W4</th>
                                <th>W5</th>
                                <th>W6</th>
                                <th>W7</th>
                                <th>W8</th>
                                <th>W9</th>
                                <th>W10</th>
                                <th>W11</th>
                                <th>W12</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->ic_number }}</td>
                                    @for ($week = 1; $week <= 12; $week++)
                                        <td>
                                            {{ $student->attendance[$week - 1]->status ?? 'N/A' }}
                                        </td>
                                    @endfor
                                    <td>
                                        <a href="{{ route('attendance.edit', ['student_id' => $student->student_id, 'club_id' => $club->club_id]) }}" class="btn btn-sm btn-warning">
                                            <span class="fa fa-edit"></span> Edit
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-layout>
