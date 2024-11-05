<!-- resources/views/profile/index.blade.php -->
<x-layout>
    <x-slot name="header">
        <h2>User Profile</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile" style="width:100px; height:100px; border-radius:50%;">
        </div>
    </x-slot>

    <div class="profile-container">
        <h2>User Details</h2>

        <!-- User Information Section -->
        <div class="profile-info">
            <h3>Name: John Doe</h3>
            <p>Email: johndoe@example.com</p>
            <p>Bio: A brief description about the user goes here.</p>
        </div>

        <!-- Profile Action Buttons -->
        <div class="actions">
            <button class="edit-btn">Edit Profile</button>
            <button class="delete-btn">Delete Profile</button>
        </div>
    </div>

    <!-- Inline CSS for styling -->
    <style>
        .profile-container {
            text-align: center;
            margin: 0 auto;
            padding: 40px;
            background-color: #f8f9fa;
            border-radius: 8px;
            max-width: 600px;
        }

        .profile-info h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 8px;
        }

        .profile-info p {
            font-size: 16px;
            color: #555;
            margin: 4px 0;
        }

        .actions {
            margin-top: 20px;
        }

        .edit-btn,
        .delete-btn {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        .edit-btn {
            background-color: #007bff;
        }

        .delete-btn {
            background-color: #dc3545;
        }
    </style>
</x-layout>
