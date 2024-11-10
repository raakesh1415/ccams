<x-layout>
    <div class="edit-profile-container">
        <!-- Profile Header with Avatar, Name, and Role -->
        <div class="profile-header">
            <img src="{{ asset('images/profile.png') }}" class="profile-avatar">
            <h2>HANK A22EC1234</h2>
            <span class="user-role">Student at UNIVERSITI TEKNOLOGI MALAYSIA</span>
        </div>  

        <!-- Edit Profile Form -->
        <form>
            <!-- User Information Section -->
            <div class="section">
                <h4>User Information</h4>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="Hank A22EC1234" readonly>
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" value="Hank" required>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" value="A22EC1234" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="hank@example.com" readonly>
                    <small>Email visible to other course participants</small>
                </div>
                <div class="form-group">
                    <label for="timezone">Timezone</label>
                    <input type="text" id="timezone" name="timezone" value="America/New_York" readonly>
                </div>
            </div>

            <!-- Contact Information Section -->
            <div class="section">
                <h4>Contact Information</h4>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Enter your address">
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city" placeholder="Enter your city">
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country" placeholder="Enter your country">
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" id="postal_code" name="postal_code" placeholder="Enter your postal code">
                </div>
            </div>

            <!-- About Me Section -->
            <div class="section">
                <h4>About Me</h4>
                <div class="form-group">
                    <textarea name="about_me" id="about_me" rows="4" placeholder="Briefly describe yourself">Student at Virtual University</textarea>
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
                    <input type="password" id="confirm_password" name="confirm_password">php artisan migrate
                </div>
            </div>

            <!-- Save Button -->
            <button type="button" class="save-button"onclick="window.location.href='/profile'">Save</button>
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
