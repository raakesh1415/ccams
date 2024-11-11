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
                            @php
                                // Get the attendance status for the current user and week
                                $status = $student->attendances->where('week_number', $week)->first()->status ?? 'Absent';
                            @endphp
                            <select name="attendance[{{ $student->id }}][week_{{ $week }}]" class="form-select">
                                <option value="Present" {{ $status == 'Present' ? 'selected' : '' }}>✅</option>
                                <option value="Absent" {{ $status == 'Absent' ? 'selected' : '' }}>❌</option>
                                <option value="Excused" {{ $status == 'Excused' ? 'selected' : '' }}>🟡</option>
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
