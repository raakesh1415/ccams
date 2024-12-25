<x-layout>
    <h1 class="text-center"> User List </h1>
    
    <!-- Check if users exist -->
    @if($users->isEmpty())
        <div class="alert alert-warning text-center" role="alert">
            No users found. 😢
        </div>
    @else
        <div class="user-list-container">
            @foreach($users as $user)
                <div class="user-card">
                    <div class="user-header">
                        <h2 class="user-name">{{ $user->name }} ({{ $user->role }})</h2>
                    </div>

                    <div class="user-details">
                        <h3>About Me</h3>
                        <p>{{ $user->about_me ?? 'No information provided' }}</p>

                        <h3>User Details</h3>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>IC:</strong> {{ $user->ic }}</p>
                        <p><strong>Timezone:</strong> {{ $user->timezone ?? 'Not set' }}</p>

                        <h3>Address Details</h3>
                        <ul>
                            <li><strong>Country:</strong> {{ $user->country ?? 'Not provided' }}</li>
                            <li><strong>City:</strong> {{ $user->city ?? 'Not provided' }}</li>
                            <li><strong>Address:</strong> {{ $user->address ?? 'Not provided' }}</li>
                            <li><strong>Postal Code:</strong> {{ $user->postal_code ?? 'Not provided' }}</li>
                        </ul>

                        <h3>Activities</h3>
                        @if($activities->isEmpty())
                            <p>No activities available.</p>
                        @else
                            <ul>
                                @foreach($activities as $activity)
                                    <li>
                                        <strong>{{ $activity->activity_name ?? 'Not provided' }}</strong>
                                        <ul>
                                            <li>Location: {{ $activity->location ?? 'Not provided' }}</li>
                                            <li>Date/Time: {{ $activity->date_time ?? 'Not provided' }}</li>
                                            <li>Category: {{ $activity->category ?? 'Not provided' }}</li>
                                            <li>Participants: {{ $activity->participants ?? 'Not provided' }}</li>
                                            <li>Duration: {{ $activity->duration ?? 'Not provided' }}</li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        <h3>Clubs</h3>
                        @if($clubs->isEmpty())
                            <p>No clubs available.</p>
                        @else
                            <ul>
                                @foreach($clubs as $club)
                                    <li>{{ $club->club_name ?? 'Not provided' }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <h3>Last Login</h3>
                        <p>{{ $user->last_login_at ? \Carbon\Carbon::parse($user->last_login_at)->format('Y-m-d H:i:s') : 'Not available' }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Add CSS for horizontal layout -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #333;
        }

        .user-list-container {
            display: flex;
            overflow-x: auto;
            padding: 20px;
            gap: 20px;
        }

        .user-card {
            flex: 0 0 300px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            transition: transform 0.2s ease-in-out;
        }

        .user-card:hover {
            transform: scale(1.02);
        }

        .user-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            margin-bottom: 15px;
            padding-bottom: 10px;
        }

        .user-name {
            font-size: 1.5rem;
            color: #007bff;
            margin: 0;
        }

        .user-details h3 {
            color: #333;
            margin-top: 15px;
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            margin: 5px 0;
        }
    </style>
</x-layout>
