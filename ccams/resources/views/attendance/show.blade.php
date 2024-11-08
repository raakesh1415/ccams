<x-layout>
    <div class="container">
        <h2 class="text-start">{{ $club->name }} Attendance</h2>
        <p class="text-muted">{{ $club->type }}</p>
        
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Student Name</th>
                    @for($week = 1; $week <= 12; $week++)
                        <th>Week {{ $week }}</th>
                    @endfor
                </tr>
            </thead>
            <tbody>
                @foreach($club->attendanceRecords as $record)
                    <tr>
                        <td>{{ $record->student->name }}</td>
                        @for($week = 1; $week <= 12; $week++)
                            <td>{{ $record->{"week_$week"} ? 'Present' : 'Absent' }}</td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
