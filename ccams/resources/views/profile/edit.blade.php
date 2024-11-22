<x-layout>
    <div class="edit-profile-container">
        <!-- Profile Header with Avatar, Name, and Role -->
        <div class="profile-header">
            <img src="{{ asset('images/profile.png') }}" class="profile-avatar" alt="Profile Avatar">
            <h2>{{ Auth::user()->username }}</h2>
            <span class="user-role">{{ Auth::user()->role }}</span>
        </div>  

        <!-- Edit Profile Form -->
        <form method="POST" action="{{ route('profile.edit') }}">
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

            <!-- Change Password Section -->
            <div class="section">
                <h4>Change Password</h4>
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password">
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password">
                </div>
            </div>

            <!-- Save Button -->
            <button type="submit" class="save-button">Save</button>
        </form>
    </div>

    <!-- Inline CSS for styling -->
    <style>
        .edit-profile-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid #b5003c;
        }

        .user-role {
            color: #888;
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

        .save-button:hover {
            background-color: #a00035;
        }
    </style>
</x-layout>
