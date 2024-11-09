<x-layout>
    <div class="text-center pt-3 pb-4">
        <h2>Attendance for {{ $club->club_name }}</h2>
        <h4>Week 1 to Week 12</h4>

        <!-- Form to store attendance -->
        <form action="{{ route('attendance.store', ['club' => $club->club_id]) }}" method="POST">
            @csrf
            <input type="hidden" name="club_id" value="{{ $club->club_id }}">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        @for ($i = 1; $i <= 12; $i++)
                            <th>Week {{ $i }}</th>
                        @endfor
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            @for ($week = 1; $week <= 12; $week++)
                                <td>
                                    <select name="attendance[{{ $student->id }}][week_{{ $week }}]" class="form-select">
                                        @php
                                            // Get the attendance status for the student in this week
                                            $status = $attendance->where('student_id', $student->id)
                                                                ->where('week_number', $week)
                                                                ->first()->status ?? 'Absent';
                                        @endphp
                                        <option value="Present" {{ $status == 'Present' ? 'selected' : '' }}>Present</option>
                                        <option value="Absent" {{ $status == 'Absent' ? 'selected' : '' }}>Absent</option>
                                        <option value="Excused" {{ $status == 'Excused' ? 'selected' : '' }}>Excused</option>
                                    </select>
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-primary">Save Attendance</button>
        </form>
    </div>
</x-layout>
