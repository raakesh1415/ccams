<x-layout>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Assessment List
                
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <a href="{{ url('assessment/list/create') }}" class="ms-1 btn btn-md btn-success float-end">
                        <span class="fa fa-plus"></span> Add Assessment</a>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Total Mark</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assessment as $as)
                        <tr>
                            <td>{{ $as->user->name ?? 'N/A' }}</td>
                            <td>{{ $as->comment }}</td>
                            <td>{{ $as->total_mark }}%</td>
                            <td>
                                {{-- <a href="{{ route('assessment.create', $as->assessment_id) }}" class="btn btn-sm btn-success"><span class="fa fa-plus"></i>"></span></a> --}}
                                <a href="{{ route('assessment.show', 'assessment_id') }}" class="btn btn-sm btn-info"><span class="fa fa-eye"></a>
                                <a href="{{ route('assessment.edit', ['assessment_id' => $as->assessment_id]) }}" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span></a>
                                {{-- <a href="{{ route('assessment.destroy', ['assessment_id' => $as->assessment_id]) }}" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a> --}}
                                {{-- <form action="{{ route('assessment.destroy', $as->assessment_id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this assessment?');">
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </form>     --}}
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('{{ route('assessment.destroy', $as->assessment_id) }}')">
                                    <span class="fa fa-trash"></span>
                                </button>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Delete Confirmation Modal -->
            <div id="deleteModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 10;">
                <div style="background: white; padding: 30px; border-radius: 10px; text-align: center; width: 300px;">
                    <h3 style="font-size: 20px; margin-bottom: 20px;">Are you sure?</h3>
                    <p style="font-size: 14px; color: #666; margin-bottom: 30px;">Do you really want to delete this student assessment mark? This process cannot be undone.</p>
                    <div style="display: flex; justify-content: center; gap: 10px;">
                        <button id="cancelDelete" style="background-color: #6c757d; color: white; padding: 10px 20px; border-radius: 5px; border: none; font-size: 14px; cursor: pointer;">Cancel</button>
                        <button id="confirmDelete" style="background-color: #dc3545; color: white; padding: 10px 20px; border-radius: 5px; border: none; font-size: 14px; cursor: pointer;">Delete</button>
                    </div>
                </div>
            </div>
            <script>
                function confirmDelete(url) {
                    const modal = document.getElementById('deleteModal');
                    const confirmButton = document.getElementById('confirmDelete');
                    const cancelButton = document.getElementById('cancelDelete');
        
                    modal.style.display = 'flex';
        
                    confirmButton.onclick = function() {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = url;
        
                        const csrfField = document.createElement('input');
                        csrfField.type = 'hidden';
                        csrfField.name = '_token';
                        csrfField.value = '{{ csrf_token() }}';
        
                        const methodField = document.createElement('input');
                        methodField.type = 'hidden';
                        methodField.name = '_method';
                        methodField.value = 'DELETE';
        
                        form.appendChild(csrfField);
                        form.appendChild(methodField);
                        document.body.appendChild(form);
                        form.submit();
                    };
        
                    cancelButton.onclick = function() {
                        modal.style.display = 'none';
                    };
        
                    window.onclick = function(event) {
                        if (event.target === modal) {
                            modal.style.display = 'none';
                        }
                    };
                }
            </script>
        </div>
    </div>
</x-layout>