<x-layout>
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <h2 class="text-center mb-4">Penilaian {{ $club->club_name }}</h2>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <a href="#" class="ms-1 btn btn-md btn-success float-end" data-bs-toggle="modal"
                        data-bs-target="#createAssessmentModal">
                        <span class="fa fa-plus"></span> Tambah Penilaian
                    </a>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Ulasan</th>
                            <th>Jumlah Markah</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assessments as $as)
                            <tr>
                                <td>{{ $as->user->name ?? 'N/A' }}</td>
                                <td>{{ $as->user->classroom ?? 'N/A' }}</td>
                                <td>{{ $as->comment }}</td>
                                <td>{{ $as->total_mark }}%</td>
                                <td>
                                    <a href="{{ route('assessment.show', ['assessment_id' => $as->assessment_id]) }}"
                                        class="btn btn-sm btn-info"><span class="fa fa-eye"></span></a>
                                    <a href="{{ route('assessment.edit', ['assessment_id' => $as->assessment_id]) }}"
                                        class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $as->assessment_id }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <div class="modal fade" id="deleteModal{{ $as->assessment_id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel{{ $as->assessment_id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <i class="fas fa-times-circle text-danger"
                                                        style="font-size: 50px;"></i>
                                                    <h5 class="modal-title"
                                                        id="deleteModalLabel{{ $as->assessment_id }}">Adakah anda
                                                        pasti?</h5>
                                                    <p class="mt-3">Adakah anda benar-benar ingin memadam markah
                                                        penilaian untuk <br>{{ $as->user->name }}? Proses ini tidak
                                                        boleh dibatalkan.</p>
                                                    <div class="d-flex justify-content-center mt-4">
                                                        <button type="button" class="btn btn-secondary me-2"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <form
                                                            action="{{ route('assessment.destroy', ['assessment_id' => $as->assessment_id]) }}"
                                                            method="POST" class="mb-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Padam</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create Assessment Modal -->
    <div class="modal fade" id="createAssessmentModal" tabindex="-1" aria-labelledby="createAssessmentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h5 class="modal-title" id="createAssessmentModalLabel">Tambah Penilaian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <div class="modal-body text-center">
                    <i class="fas fa-clipboard-list text-success" style="font-size: 50px;"></i>
                    <h5 class="modal-title pb-3" id="createAssessmentModalLabel">Tambah Penilaian</h5>
                    <form action="{{ route('assessment.create', ['club_id' => $club->club_id]) }}" method="GET">
                        <label for="user_id" class="form-label">Pilih Pelajar:</label>
                        <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="">-- Pilih Pelajar --</option>
                                @forelse ($users as $registration)
                                    @if ($registration->user)
                                        <option value="{{ $registration->user->id }}">{{ $registration->user->name }}
                                        </option>
                                    @endif
                                @empty
                                    <option disabled>Tidak ada pelajar yang tersedia untuk dinilai</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-1"></div>
                        </div>
                        <input type="hidden" name="club_id" value="{{ $club->club_id }}">
                        <div class="mt-4 d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Teruskan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>
