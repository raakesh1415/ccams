<x-layout>
    <div class="text-center pt-3 pb-4">
        <h2>Details for {{ $student->name }} (Club: {{ $club->club_name }})</h2>

        <div class="mb-4">
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Email:</strong> {{ $student->email }}</p>
            <p><strong>IC Number:</strong> {{ $student->ic }}</p>
        </div>

        <h4>Attendance</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Week</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                    <tr>
                        <td>Week {{ $attendance->week_number }}</td>
                        <td>
                            <span class="badge 
                                @if($attendance->status == 'Present') bg-success 
                                @elseif($attendance->status == 'Absent') bg-danger 
                                @else bg-warning @endif">
                                {{ $attendance->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
