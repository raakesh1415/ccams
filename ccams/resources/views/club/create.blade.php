<!-- create.blade.php -->
<x-layout>
    <x-slot name="header">
        <h2>Club Details</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="club-details-container">
        <a href="{{ url()->previous() }}" class="go-back">Go Back</a>

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-section">
                <!-- Left Column -->
                <div class="left-column">
                    <!-- Club Name -->
                    <label for="club_name">Club Name</label>
                    <input type="text" id="club_name" name="club_name" class="form-control" required>

                    <!-- Description -->
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" class="form-control" required></textarea>

                    <!-- Participants -->
                    <label for="participants">Participants</label>
                    <input type="number" id="participants" name="participants" class="form-control" required>
                </div>

                <!-- Right Column -->
                <div class="right-column">
                    <!-- Add Poster -->
                    <label for="poster">Add Poster</label>
                    <input type="file" id="poster" name="poster" accept="image/*" class="form-control-file">
                    <small>*Drag or browse from device</small>

                    <!-- Category -->
                    <label for="category">Category</label>
                    <input type="text" id="category" name="category" class="form-control" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary submit-btn">Add Club</button>
        </form>
    </div>

    <style>
        /* Overall Container Styling */
        .club-details-container { 
            padding: 20px; 
            max-width: 800px; 
            margin: 0 auto; 
            background: #f9f9f9; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }

        /* Header and Back Button */
        .go-back { 
            display: inline-block; 
            margin-bottom: 20px; 
            color: #007bff; 
            text-decoration: none; 
        }

        /* Form Structure */
        .form-section {
            display: flex; 
            gap: 20px;
            justify-content: space-between;
        }
        .left-column, .right-column {
            flex: 1; 
            display: flex; 
            flex-direction: column;
        }

        /* Labels and Inputs */
        label { 
            margin-top: 15px; 
            font-weight: bold; 
            color: #333;
        }
        input[type="text"], input[type="number"], textarea { 
            padding: 8px; 
            margin-top: 5px; 
            border: 1px solid #ccc; 
            border-radius: 4px;
        }

        /* Poster Field */
        .form-control-file {
            border: 1px dashed #ccc;
            padding: 10px;
            text-align: center;
            border-radius: 4px;
            background-color: #fafafa;
        }

        /* Submit Button */
        .submit-btn { 
            margin-top: 20px; 
            padding: 10px 20px; 
            background-color: #5a67d8; 
            color: white; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 1em; 
        }
        .submit-btn:hover { 
            background-color: #4c51bf; 
        }
    </style>
</x-layout>
