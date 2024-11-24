<x-layout>
    <div class="profile-container">
        <!-- Left Column: User Info and Profile Photo -->
        <div class="left-column">
            <div class="profile-card">
                <!-- Display Profile Image and User Info -->
                <img src="{{ asset('images/profile.png') }}" class="profile-image" alt="Profile Image">
                
                <!-- Student's Name (with larger font size) -->
                <h2 class="student-name">{{ $user->name }}</h2>

                <button class="edit-profile-btn" onclick="window.location.href='/profile/edit'">Edit profile</button>
                
                <div class="about-me">
                    <h4>About Me</h4>
                    <p>{{ $user->about_me ?? 'No information provided' }}</p>
                </div>  
            </div>
        </div>

        <!-- Right Column: Additional User Details and Information -->
        <div class="right-column">
            <!-- User Details Section -->
            <div class="card">
                <h4>User details <a href="{{ route('profile.edit') }}" class="edit-link">Edit profile</a></h4>
                <p>Email address: {{ $user->email }} (Visible to other course participants)</p>
                <p>Timezone: {{ $user->timezone ?? 'Not set' }}</p>
            </div>

            <!-- Address Section -->
            <div class="card">
                <h4>Address Details</h4>
                <p>Country: {{ $user->country ?? 'Not provided' }}</p>
                <p>City: {{ $user->city ?? 'Not provided' }}</p>
                <p>Address: {{ $user->address ?? 'Not provided' }}</p>
                <p>Postal Code: {{ $user->postal_code ?? 'Not provided' }}</p>
            </div>

            <!-- Privacy and Policies Section -->
            <div class="card">
                <h4>Privacy and policies</h4>
                <p>Data retention summary</p>
            </div>

            <!-- Course Details Section -->
            <div class="card">
                <h4>Activity details</h4>
                @if($activities->isEmpty())
                    <p>No activities available.</p>
                @else
                    @foreach ($activities as $activity)
                        <p>Activity: {{ $activity->activity_name ?? 'Not provided' }}</p>
                        <p>Location: {{ $activity->location ?? 'Not provided' }}</p>
                        <p>Date/Time: {{ $activity->date_time ?? 'Not provided' }}</p>
                        <p>Category: {{ $activity->category ?? 'Not provided' }}</p>
                        <p>Participants: {{ $activity->participants ?? 'Not provided' }}</p>
                        <p>Duration: {{ $activity->duration ?? 'Not provided' }}</p>
                    @endforeach
                @endif

            </div>

            <!-- Miscellaneous Section -->
            <div class="card">
                <h4>Miscellaneous</h4>
                <p>Blog entries</p>
                <p>Forum posts</p>
                <p>Forum discussions</p>
                <p>Learning plans</p>
            </div>

            <!-- Reports Section -->
            <div class="card">
                <h4>Reports</h4>
                <p>Browser sessions</p>
                <p>Grades overview</p>
            </div>

            <!-- Login Activity Section -->
            <div class="card">
                <h4>Login activity</h4>
                <p>Last login: {{ \Carbon\Carbon::parse($user->last_login_at)->format('Y-m-d H:i:s') ?? 'Not available' }}</p>
                <!-- <p>First access to site: {{ $user->first_access_at }}</p>
                <p>Last access to site: {{ $user->last_access_at }}</p> -->
            </div>

            <!-- Club Details Section -->
            <div class="card">
            <h4>Club details</h4>
                @if($clubs->isEmpty())
                    <p>No clubs available.</p>
                @else
                    @foreach ($clubs as $club)
                        <p>Club Name: {{ !empty($club->club_name) ? $club->club_name : 'Not provided' }}</p>
                    @endforeach
                @endif
        </div>
        </div>
    </div>

    <!-- Inline CSS for styling -->
    <style>
        .profile-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #f8f9fa;
        }

        .left-column {
            flex: 1;
            max-width: 300px;
        }

        .right-column {
            flex: 2;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .profile-card {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 2px solid #b5003c;
        }

        /* Styling for Student's Name */
        .student-name {
            font-size: 34px; /* Adjust the font size as needed */
            font-weight: normal;
            color: #333;
            margin-bottom: 15px;
        }

        .edit-profile-btn {
            background-color: #b5003c;
            color: #fff;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .about-me {
            margin-top: 20px;
            text-align: left;
        }

        .card {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .card h4 {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        .card p,
        .card ul {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }

        .edit-link {
            font-size: 12px;
            color: #b5003c;
            float: right;
            text-decoration: none;
        }

        .qr-code {
            width: 100px;
            height: 100px;
            margin: 10px 0;
        }

        .download-link {
            color: #b5003c;
            text-decoration: none;
        }
    </style>
</x-layout>
