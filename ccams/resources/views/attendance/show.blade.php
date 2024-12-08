<x-layout>
    <div class="text-center pt-3 pb-4">
        <h2>Attendance for {{ $club->club_name }}</h2>
        <h4>Week 1 to Week 12</h4>

        <!-- Success Message Modal -->
        @if(session('success'))
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="successModalLabel">Success</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ session('success') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Student Name</th>
                    @for ($i = 1; $i <= 12; $i++)
                        <th>Week {{ $i }}</th>
                    @endfor
                    <th>Update</th> 
                    <th>View Details</th> <!-- Add Update column -->
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        @for ($week = 1; $week <= 12; $week++)
                            <td>
                                @php
                                    // Get the attendance status for the current user and week
                                    $attendance = $student->attendances->where('week_number', $week)->first();
                                    $status = $attendance ? $attendance->status : 'N/A';
                                @endphp
                                @if($status == 'N/A')
                                    <span class="badge bg-secondary">{{ $status }}</span>
                                @else
                                    <span class="badge 
                                        @if($status == 'Present') bg-success 
                                        @elseif($status == 'Absent') bg-danger 
                                        @else bg-warning @endif">
                                        {{ $status }}
                                    </span>
                                @endif
                            </td>
                        @endfor
                        <td>
                            <!-- Button to open the modal to update attendance for this student -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateAttendanceModal{{ $student->id }}">
                                Update
                            </button>
                        </td>
                        <td>
                            <a href="{{ route('attendance.viewDetails', ['user_id' => $student->id, 'club_id' => $club->club_id]) }}" class="btn btn-info">
                                View Details
                            </a>
                        </td>
                    </tr>

                    <!-- Modal for updating attendance of this student -->
                    <div class="modal fade" id="updateAttendanceModal{{ $student->id }}" tabindex="-1" aria-labelledby="updateAttendanceModalLabel{{ $student->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateAttendanceModalLabel{{ $student->id }}">Update Attendance for {{ $student->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form action="{{ route('attendance.update', ['studentId' => $student->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT') <!-- Ensure PUT method is used for updating -->
                                    <input type="hidden" name="club_id" value="{{ $club->club_id }}">

                                    @for ($week = 1; $week <= 12; $week++)
                                        <div class="mb-3">
                                            <label for="week_{{ $week }}" class="form-label">Week {{ $week }}</label>
                                            @php
                                                $status = $student->attendances->where('week_number', $week)->first()->status ?? 'Absent';
                                            @endphp
                                            <select name="attendance[week_{{ $week }}]" id="week_{{ $week }}" class="form-select">
                                                <option value="Present" {{ $status == 'Present' ? 'selected' : '' }}>✅ Present</option>
                                                <option value="Absent" {{ $status == 'Absent' ? 'selected' : '' }}>❌ Absent</option>
                                                <option value="Excused" {{ $status == 'Excused' ? 'selected' : '' }}>🟡 Excused</option>
                                            </select>
                                        </div>
                                    @endfor
                                    <button type="submit" class="btn btn-primary">Save Attendance</button>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JavaScript to automatically show the modal if there's a success message -->
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            });
        </script>
    @endif
</x-layout>
