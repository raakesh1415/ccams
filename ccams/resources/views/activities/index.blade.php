<!-- resources/views/activity/index.blade.php -->
<x-layout>
    <x-slot name="header">
        <h2>Activities</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="activity-container">
        <h2>Explore Activities</h2>

        <!-- Check if activities exist -->
        @if ($activities->isEmpty())
            <!-- No Activity View -->
            <div class="no-activity">
                <div class="no-activity-message">
                    <img src="{{ asset('images/empty-icon.JPG') }}" alt="No Activities" style="width:100px; height:auto;">
                    <h3>No activity yet!</h3>
                    <p>Once activities are added, they will display here!</p>
                </div>
                <a href="{{ route('activities.create') }}" class="add-activity-btn">Add Activity</a>
            </div>
        @else
            <!-- Activities List View -->
            <div class="activities">
                <div class="add-activity-header">
                    <a href="{{ route('activities.create') }}" class="add-activity-btn">Add Activity</a>
                </div>
                <div class="activity-list">
                    @foreach ($activities as $activity)
                        <div class="activity-card">
                            <img src="{{ $activity->poster ? asset('storage/' . $activity->poster) : asset('images/sample-activity.png') }}" alt="Activity Image">
                            <h3>{{ $activity->activity_name }}</h3>
                            <p>{{ Str::limit($activity->description, 100) }}</p>
                            <a href="{}" class="edit-btn">Edit</a>
                            <form action="{}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <style>
        .activity-container {
            text-align: center;
        }

        .no-activity {
            padding: 40px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .no-activity-message h3 {
            font-size: 24px;
            color: #555;
        }

        .activities {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .activity-list {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .activity-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .activity-card img {
             width: 100%;
             height: 350px; /* Adjust height as needed */
             object-fit: cover;
             border-radius: 8px;
        }

        .edit-btn,
        .delete-btn {
            margin-top: 10px;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #007bff;
            color: #fff;
        }

        .delete-btn {
            background-color: #dc3545;
            color: #fff;
        }

        @media (max-width: 1024px) {
            .activity-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .activity-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</x-layout>
