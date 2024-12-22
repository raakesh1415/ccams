<x-layout>
    <div class="container">
        <h1 class="text-center mb-4">Penilaian Kelas {{ $classroom }}</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama Pelajar</th>
                            <th>Sukan</th>
                            <th>Persatuan</th>
                            <th>Unit Beruniform</th>
                            {{-- <th>Purata Jumlah</th> --}}
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                
                                <!-- Kolum Permainan -->
                                <td>
                                    @if($student->permainanClub)
                                        <div class="text-muted mb-1">{{ $student->permainanClub }}</div>
                                        @if($student->permainanAssessment)
                                            <strong class="text-success">
                                                {{ number_format($student->permainanAssessment->total_mark, 1) }}%
                                            </strong>
                                        @else
                                            <strong class="text-warning">Belum Dinilai Lagi</strong>
                                        @endif
                                    @else
                                        <span class="text-muted">Tidak Mendaftar</span>
                                    @endif
                                </td>
                                
                                <!-- Kolum Persatuan -->
                                <td>
                                    @if($student->persatuanClub)
                                        <div class="text-muted mb-1">{{ $student->persatuanClub }}</div>
                                        @if($student->persatuanAssessment)
                                            <strong class="text-success">
                                                {{ number_format($student->persatuanAssessment->total_mark, 1) }}%
                                            </strong>
                                        @else
                                            <strong class="text-warning">Belum Dinilai Lagi</strong>
                                        @endif
                                    @else
                                        <span class="text-muted">Tidak Mendaftar</span>
                                    @endif
                                </td>
                                
                                <!-- Kolum Unit Beruniform -->
                                <td>
                                    @if($student->uniformClub)
                                        <div class="text-muted mb-1">{{ $student->uniformClub }}</div>
                                        @if($student->uniformAssessment)
                                            <strong class="text-success">
                                                {{ number_format($student->uniformAssessment->total_mark, 1) }}%
                                            </strong>
                                        @else
                                            <strong class="text-warning">Belum Dinilai Lagi</strong>
                                        @endif
                                    @else
                                        <span class="text-muted">Tidak Mendaftar</span>
                                    @endif
                                </td>
                                
                                {{-- <!-- Kolum Purata -->
                                <td>
                                    @if($student->averageAssessment > 0)
                                        <strong class="text-success">
                                            {{ number_format($student->averageAssessment, 1) }}%
                                        </strong>
                                    @else
                                        <strong class="text-warning">N/A</strong>
                                    @endif
                                </td> --}}

                                <td>
                                    <a href="{{ route('assessment.viewclass', ['student_id' => $student->id]) }}" 
                                       class="btn btn-sm btn-info">
                                        <span class="fa fa-eye"></span> Lihat
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>