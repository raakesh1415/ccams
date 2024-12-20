<x-layout>
    <div class="text-center pt-3 pb-4">
        <h2>Kedatangan untuk {{ $club->club_name }}</h2>
        <h4>Minggu {{ $startWeek }} to Minggu {{ $endWeek }}</h4>

        <!-- Success Message Modal -->
        @if(session('success'))
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-center">
                        <div class="modal-body">
                            <!-- Success Icon -->
                            <div class="mb-3">
                                <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
                            </div>
                            <!-- Success Message -->
                            <h5 class="modal-title" id="successModalLabel">Success</h5>
                            <p class="mt-2">{{ session('success') }}</p>
                            <!-- Close Button -->
                            <button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Attendance Filter Form -->
        <div class="mb-4">
            <form action="{{ route('attendance.show', ['clubs' => $club->club_id]) }}" method="GET" class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="start_week" class="form-label">Minggu Mula:</label>
                    <select name="start_week" id="start_week" class="form-select">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $i == $startWeek ? 'selected' : '' }}>Minggu {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-auto">
                    <label for="end_week" class="form-label">Minggu Akhir:</label>
                    <select name="end_week" id="end_week" class="form-select">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $i == $endWeek ? 'selected' : '' }}>Minggu {{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-auto mt-5">
                    <button type="submit" class="btn btn-primary">Tapis</button>
                </div>
            </form>
        </div>

        <!-- Attendance Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Pelajar</th>
                    <th>No. IC</th>
                    @for ($week = $startWeek; $week <= $endWeek; $week++)
                        <th>Minggu {{ $week }}</th>
                    @endfor
                    <th>Kemaskini</th> 
                    <th>Lihat Butiran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->ic }}</td>
                        @for ($week = $startWeek; $week <= $endWeek; $week++)
                            <td>
                                @php
                                    $attendance = $student->attendances->where('week_number', $week)->first();
                                    $status = $attendance ? $attendance->status : 'N/A';
                                @endphp
                                <span class="badge {{ 
                                    $status == 'Present' ? 'bg-success' : 
                                    ($status == 'Absent' ? 'bg-danger' : 
                                    ($status == 'Excused' ? 'bg-warning' : 'bg-secondary')) 
                                }}">
                                    {{ $status }}
                                </span>
                            </td>
                        @endfor
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateAttendanceModal{{ $student->id }}">
                                Kemaskini
                            </button>
                        </td>
                        <td>
                            <a href="{{ route('attendance.viewDetails', ['user_id' => $student->id, 'club_id' => $club->club_id]) }}" class="btn btn-info">
                                Lihat Butiran
                            </a>
                        </td>
                    </tr>

                    <!-- Modal for updating attendance -->
                    <div class="modal fade" id="updateAttendanceModal{{ $student->id }}" tabindex="-1" aria-labelledby="updateAttendanceModalLabel{{ $student->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateAttendanceModalLabel{{ $student->id }}">Kemaskini Kedatangan untuk {{ $student->name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('attendance.update', ['studentId' => $student->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="club_id" value="{{ $club->club_id }}">

                                        @for ($week = $startWeek; $week <= $endWeek; $week++)
                                            <div class="mb-3">
                                                <label for="week_{{ $week }}">Week {{ $week }}</label>
                                                @php
                                                    $attendance = $student->attendances->where('week_number', $week)->first();
                                                    $status = $attendance ? $attendance->status : null;
                                                @endphp
                                                <select name="attendance[{{ $week }}][status]" id="week_{{ $week }}" class="form-select">
                                                    <option value="" {{ is_null($status) ? 'selected' : '' }}>- Select Status -</option>
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

    <!-- Success Modal Trigger -->
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            });
        </script>
    @endif
</x-layout>
