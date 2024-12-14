<x-layout>
    <!-- Taskbar Section -->
    <div class="taskbar">
    <div class="profile-header">
        <!-- 动态显示用户的头像 -->
        <img src="{{ Auth::user()->profile_pic ? asset('storage/profiles/' . Auth::user()->profile_pic) : asset('images/profile.png') }}" class="profile-image" alt="Profile Image">

             class="profile-avatar" 
             alt="Profile Avatar">
        <h2>{{ Auth::user()->username }}</h2>
        <span class="user-role">{{ Auth::user()->role }}</span>
    </div>  
</div>

    <!-- Edit Profile Container -->
    <div class="edit-profile-container">
        <!-- Edit Profile Form -->
        <form method="POST" action="{{ route('profile.edit') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <!-- User Information Section -->
            <div class="section">
                <h4>User Information</h4>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                    <small>Email visible to other course participants</small>
                </div>
            </div>

            <!-- Photo Upload Section -->
            <div class="form-group">
                <label for="profile_pic">Profile Photo</label>
                <input type="file" id="profile_pic" name="profile_pic" accept="image/*" class="form-control">
            </div>

            <!-- Display current profile photo if exists -->
            @if (Auth::user()->profile_pic)
                <div class="mt-3">
                    <p>Current Photo:</p>
                    <img src="{{ asset('storage/profiles/' . Auth::user()->profile_pic) }}" alt="Current Profile Photo" class="img-fluid" style="max-width: 200px;">
                </div>
            @else
                <p>No photo uploaded yet.</p>
            @endif

            <!-- Contact Information Section -->
            <div class="section">
                <h4>Contact Information</h4>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" value="{{ Auth::user()->address }}" placeholder="Enter your address">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" value="{{ Auth::user()->city }}" placeholder="Enter your city">
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" value="{{ Auth::user()->country }}" placeholder="Enter your country">
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" id="postal_code" name="postal_code" value="{{ Auth::user()->postal_code }}" placeholder="Enter your postal code">
                </div>
            </div>
            <!-- About Me Section -->
            <div class="section">
                <h4>About Me</h4>
                <div class="form-group">
                    <textarea name="about_me" id="about_me" rows="4" placeholder="Briefly describe yourself">{{ Auth::user()->about_me }}</textarea>
                </div>
            </div>

            <!-- Save Button -->
            <button type="submit" class="save-button">Save</button>
        </form>

        <!-- Display success message if any -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- Inline CSS for styling -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .taskbar {
            background-color: white; /* Dark background for the taskbar */
            padding: 15px;
            color: white;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid #b5003c;
        }

        .user-role {
            color: #ccc;
        }

        .edit-profile-container {
            width: 100%;
            padding: 20px;
            background-color: white; /* White background for the profile section */
            border-radius: 0;
            box-shadow: none;
        }

        .section {
            margin-bottom: 30px;
        }

        .section h4 {
            margin-bottom: 15px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .save-button {
            background-color: #b5003c;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 2px solid #b5003c;
        }

        .save-button:hover {
            background-color: #a00035;
        }

        .alert {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</x-layout>
