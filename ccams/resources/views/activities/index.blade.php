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

        @if ($activities->isEmpty())
            <div class="no-activity">
                <div class="no-activity-message">
                    <img src="{{ asset('images/empty-icon.JPG') }}" alt="No Activities" style="width:100px; height:auto;">
                    <h3>No activity yet!</h3>
                    <p>Once activities are added, they will display here!</p>
                </div>
                <a href="{{ route('activities.create') }}" class="add-activity-btn">Add Activity</a>
            </div>
        @else
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
                            <a href="{}" class="edit-btn">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
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
            margin: 20px;
        }

        h2 {
            font-family: Arial, sans-serif;
            font-size: 2em;
            color: #333;
            margin-bottom: 10px;
        }

        .no-activity {
            padding: 40px;
            background-color: #f1f3f5;
            border-radius: 8px;
            border: 1px solid #e2e6ea;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .no-activity-message h3 {
            font-size: 24px;
            color: #555;
        }

        .add-activity-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        .add-activity-btn:hover {
            background-color: #218838;
        }

        .activities {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .activity-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
            width: 100%;
            max-width: 1200px;
        }

        .activity-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.2s;
            border: 1px solid #e2e6ea;
        }

        .activity-card:hover {
            transform: translateY(-5px);
        }

        .activity-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
        }

        .activity-card h3 {
            font-size: 1.5em;
            color: #333;
            margin: 10px 0;
        }

        .activity-card p {
            font-size: 0.9em;
            color: #666;
            margin-bottom: 20px;
        }

        .edit-btn,
        .delete-btn {
            margin-top: 10px;
            padding: 8px 16px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-flex;
            align-items: center;
            font-size: 0.9em;
        }

        .edit-btn {
            background-color: #17a2b8;
            color: #fff;
            margin-right: 5px;
        }

        .edit-btn:hover {
            background-color: #138496;
        }

        .delete-btn {
            background-color: #dc3545;
            color: #fff;
        }

        .delete-btn:hover {
            background-color: #c82333;
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

    <!-- Font Awesome CDN for icons (Add this in your layout file head) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</x-layout>
