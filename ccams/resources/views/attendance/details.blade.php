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
            <h2>Butiran Kedatangan untuk {{ $student->name }} (Club: {{ $club->club_name }})</h2>
        </div>
        <div></div> <!-- Empty div to balance the layout -->
    </div>

    <div class="text-center pt-3 pb-4">
        <div class="mb-4">
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>E-mel:</strong> {{ $student->email }}</p>
            <p><strong>Nombor IC:</strong> {{ $student->ic }}</p>
        </div>

        <h4>Rekod Kedatangan</h4>
        @if($attendances->isEmpty())
            <p class="text-muted">Tiada rekod kedatangan.</p>
        @else
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Minggu</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $attendance)
                        <tr>
                            <td>Minggu {{ $attendance->week_number }}</td>
                            <td>
                                <span class="badge 
                                    @if($attendance->status == 'Hadir') bg-success 
                                    @elseif($attendance->status == 'T. Hadir') bg-danger 
                                    @else bg-warning @endif">
                                    {{ $attendance->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                <h5>Rumusan Kedatangan:</h5>
                <ul class="list-group">
                    <li class="list-group-item">Jumlah Hadir: <strong>{{ $totalPresent }}</strong></li>
                    <li class="list-group-item">Jumlah Tidak Hadir: <strong>{{ $totalAbsent }}</strong></li>
                    <li class="list-group-item">Jumlah Dikecuali: <strong>{{ $totalExcused }}</strong></li>
                </ul>
            </div>
        @endif
    </div>
</x-layout>
