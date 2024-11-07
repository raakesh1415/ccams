<!-- resources/views/profile/index.blade.php -->
<x-layout>
    <div class="profile-container">
        <!-- Left Column: User Info and Profile Photo -->
        <div class="left-column">
            <div class="profile-card">
                <img src="{{ asset('images/profile.png') }}" class="profile-image">
                <h3>HANK A22EC1234</h3>
                <button class="edit-profile-btn" onclick="window.location.href='/profile/edit'">Edit profile</button>
                <div class="about-me">
                    <h4>About Me</h4>
                    <p>STUDENT AT VIRTUAL UNIVERSITY</p>
                </div>
            </div>
        </div>

        <!-- Right Column: Additional User Details and Information -->
        <div class="right-column">
            <!-- User Details Section -->
            <div class="card">
                <h4>User details <a href="{{ route('profile.edit') }}" class="edit-link">Edit profile</a></h4>
                <p>Email address: hank@example.com (Visible to other course participants)</p>
                <p>Timezone: America/New_York</p>
            </div>

            <!-- Privacy and Policies Section -->
            <div class="card">
                <h4>Privacy and policies</h4>
                <p>Data retention summary</p>
            </div>

            <!-- Course Details Section -->
            <div class="card">
                <h4>Activity details</h4>
                <p>Activity profiles</p>
                <ul>
                    <li>.................</li>
                    <li>.................</li>
                    <li>.................</li>
                    <li>.................</li>
                    <li>.................</li>
                    <li>.................</li>
                    <li>.................</li>
                </ul>
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
                <p>First access to site: Monday, 10 October 2024, 9:30 AM (31 days 11 hours)</p>
                <p>Last access to site: Thursday, 7 November 2024, 3:45 PM (2 mins ago)</p>
            </div>

            <!-- Club Details Section -->
            <div class="card">
                <h4>Club details</h4>
                <p>Club profiles</p>
                <p>Sukan / Permainan club</p>
                <p>Kelab / Persatuan club</p>
                <p>Unit Beruniform club</p>
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
