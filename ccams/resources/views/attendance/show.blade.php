<x-layout>
    <div class="d-flex justify-content-between align-items-center pt-3 pb-4">
        <div>
            @if(auth()->user()->role == 'student')
                <a href="{{ route('attendance.indexStudent') }}" class="btn btn-dark">Kembali</a>
            @elseif(auth()->user()->role == 'teacher')
                <a href="{{ route('attendance.indexTeacher') }}" class="btn btn-dark">Kembali</a>
            @else
                <a href="{{ route('dashboard.index') }}" class="btn btn-dark">Kembali</a>
            @endif
        </div>
        <div class="text-center">
            <h2>Kedatangan untuk {{ $club->club_name }}</h2>
            <h4>Minggu {{ $startWeek }} to Minggu {{ $endWeek }}</h4>
        </div>
        <div></div> <!-- Empty div to balance the layout -->
    </div>

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

    <div class="d-flex justify-content-between mb-4">
        <!-- Attendance Filter Form -->
        <div>
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
                    <button type="submit" class="btn btn-dark">Tapis</button>
                </div>
            </form>
        </div>

        <!-- Search Bar -->
        <div class="mt-auto">
            <form action="{{ route('attendance.show', ['clubs' => $club->club_id]) }}" method="GET" class="row g-3 align-items-center">
                <div class="col-auto">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari Nama Pelajar" value="{{ request('search') }}">
                        <button class="btn btn-dark" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
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
                @if(empty(request('search')) || stripos($student->name, request('search')) !== false)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->ic }}</td>
                        @for ($week = $startWeek; $week <= $endWeek; $week++)
                            <td>
                                @php
                                    $attendance = $student->attendances->where('club_id', $club->club_id)->where('week_number', $week)->first();
                                    $status = $attendance ? $attendance->status : 'N/A';
                                @endphp
                                <span class="badge {{ 
                                    $status == 'Hadir' ? 'bg-success' : 
                                    ($status == 'T. Hadir' ? 'bg-danger' : 
                                    ($status == 'Dikecuali' ? 'bg-warning' : 'bg-secondary')) 
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
                            <a href="{{ route('attendance.viewDetails', ['user_id' => $student->id, 'club_id' => $club->club_id]) }}" class="btn btn-light">
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
                                                <label for="week_{{ $week }}">Minggu {{ $week }}</label>
                                                @php
                                                    $attendance = $student->attendances->where('club_id', $club->club_id)->where('week_number', $week)->first();
                                                    $status = $attendance ? $attendance->status : null;
                                                @endphp
                                                <select name="attendance[{{ $week }}][status]" id="week_{{ $week }}" class="form-select">
                                                    <option value="" {{ is_null($status) ? 'selected' : '' }}>- Pilih Status -</option>
                                                    <option value="Hadir" {{ $status == 'Hadir' ? 'selected' : '' }}>✅ Hadir</option>
                                                    <option value="T. Hadir" {{ $status == 'T. Hadir' ? 'selected' : '' }}>❌ T. Hadir</option>
                                                    <option value="Dikecuali" {{ $status == 'Dikecuali' ? 'selected' : '' }}>🟡 Dikecuali</option>
                                                </select>
                                            </div>
                                        @endfor

                                        <button type="submit" class="btn btn-primary">Simpan Rekod</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </tbody>
    </table>

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
