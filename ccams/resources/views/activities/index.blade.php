<x-layout>
    <x-slot name="header">
        <h2>Activities</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="activity-container">
        <h2 style="text-align: center; font-size: 28px; margin-bottom: 20px;">Explore Activities</h2>

        @if ($activities->isEmpty())
            <!-- No Activities View -->
            <div class="no-activity" style="text-align: center; margin-top: 50px;">
                <img src="{{ asset('images/empty-icon.JPG') }}" alt="No Activities" style="width: 150px; height: auto; margin-bottom: 20px;">
                <h3 style="font-size: 22px; color: #555;">No activity yet!</h3>
                <p style="font-size: 16px; color: #888;">Once activities are added, they will display here.</p>
                <a href="{{ route('activities.create') }}" 
                   style="background-color: #007bff; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-size: 16px;">Add Activity</a>
            </div>
        @else
            <!-- Add Activity Button -->
            <div style="text-align: center; margin-bottom: 20px;">
                <a href="{{ route('activities.create') }}" 
                   style="background-color: #007bff; color: white; padding: 12px 24px; border-radius: 5px; text-decoration: none; font-size: 18px;">Add Activity</a>
            </div>

            <!-- Activities List -->
            <div class="activity-list-container" style="display: flex; justify-content: center; margin-top: 20px;">
                <div class="activity-list" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 30px; width: 80%;">
                    @foreach ($activities as $activity)
                        <div class="activity-card" style="background-color: #fff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 20px; text-align: center;">
                            <img src="{{ $activity->poster ? asset('storage/' . $activity->poster) : asset('images/sample-activity.png') }}" 
                                 alt="Activity Poster" 
                                 style="width: 100%; height: 450px; object-fit: cover; border-radius: 10px; margin-bottom: 15px;">
                            <h3 style="font-size: 22px; font-weight: bold; color: #333; margin-bottom: 10px;">{{ $activity->activity_name }}</h3>
                            <p style="font-size: 16px; color: #666; margin-bottom: 20px;">{{ Str::limit($activity->description, 100) }}</p>
                            <div style="display: flex; justify-content: center; gap: 15px;">
                                <a href="{{ route('activities.edit', $activity->activity_id) }}" 
                                   style="background-color: #17a2b8; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; font-size: 16px;">Edit</a>
                                <button type="button" 
                                        onclick="confirmDelete('{{ route('activities.destroy', $activity->activity_id) }}')" 
                                        style="background-color: #dc3545; color: white; padding: 10px 20px; border-radius: 5px; border: none; font-size: 16px; cursor: pointer;">Delete</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index: 10;">
        <div style="background: white; padding: 30px; border-radius: 10px; text-align: center; width: 300px;">
            <h3 style="font-size: 20px; margin-bottom: 20px;">Are you sure?</h3>
            <p style="font-size: 14px; color: #666; margin-bottom: 30px;">Do you really want to delete this activity? This process cannot be undone.</p>
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
</x-layout>
