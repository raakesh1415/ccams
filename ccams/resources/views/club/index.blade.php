<<<<<<< Updated upstream
<x-layout>
    <x-slot name="header">
        <h2>Explore Club</h2>
=======
<!-- index.blade.php -->
<x-layout>
    <x-slot name="header">
        <h2>Clubs</h2>
>>>>>>> Stashed changes
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="club-container">
<<<<<<< Updated upstream
        <h2>Club Type</h2>
        <div class="clubs">
            <!-- Club Type 1 -->
            <div class="club-card">
                <img src="{{ asset('images/persatuan.jpg') }}" alt="Kelab / Persatuan">
                <h3>Kelab / Persatuan</h3>
                <a href="{{ route('club.kelab') }}" class="club-btn">See more</a>
            </div>
            <!-- Club Type 2 -->
            <div class="club-card">
                <img src="{{ asset('images/sukanpermainan.jpg') }}" alt="Sukan / Permainan">
                <h3>Sukan / Permainan</h3>
                <a href="{{ route('club.sukan') }}" class="club-btn">See more</a>
            </div>
            <!-- Club Type 3 -->
            <div class="club-card">
                <img src="{{ asset('images/unitberuniform.jpg') }}" alt="Unit Beruniform">
                <h3>Unit Beruniform</h3>
                <a href="{{ route('club.unitberuniform') }}" class="club-btn">See more</a>
            </div>
        </div>
    </div>

    <style>
        /* Styling for consistent layout and image sizing */
        .club-container {
            text-align: center;
            margin-top: 20px;
        }

        .clubs {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 columns */
            gap: 20px; /* Space between items */
            margin-top: 20px;
        }

        .club-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .club-card img {
            width: 100%; /* Ensures the image takes up full width of the card */
            height: auto;
            border-radius: 8px;
        }

        .club-btn {
            margin-top: 10px;
            background-color: #000;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        /* Responsive styling: for smaller screens, adjust column count */
        @media (max-width: 1024px) {
            .clubs {
                grid-template-columns: repeat(2, 1fr); /* 2 columns */
            }
        }

        @media (max-width: 768px) {
            .clubs {
                grid-template-columns: 1fr; /* 1 column */
            }
        }
=======
        <h2>Explore Clubs</h2>
        
        <!-- Check if clubs exist (simulate with a Blade directive) -->
        @if(false) <!-- Change to true to see the populated view -->
            <!-- Clubs List View -->
            <div class="clubs">
                <div class="add-club-header">
                    <button class="add-club-btn">Add Club</button>
                </div>
                <div class="club-list">
                    @for ($i = 0; $i < 6; $i++) <!-- Simulate 6 club cards -->
                        <div class="club-card">
                            <img src="{{ asset('images/sample-club.png') }}" alt="Club Image">
                            <h3>Club Name {{ $i+1 }}</h3>
                            <p>Category: Kelab/Persatuan</p>
                            <div class="club-actions">
                                <button class="edit-btn">Edit</button>
                                <button class="delete-btn">Delete</button>
                                <button class="view-btn">View</button>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        @else
            <!-- No Club View -->
            <div class="no-club">
                <div class="no-club-message">
                    <img src="{{ asset('images/empty-icon.JPG') }}" alt="No Clubs" style="width:100px; height:auto;">
                    <h3>No clubs yet!</h3>
                    <p>Once clubs are added, they will display here!</p>
                </div>
                <button class="add-club-btn">Add Club</button>
            </div>
        @endif
    </div>

    <style>
        .club-container { text-align: center; }
        .no-club { padding: 40px; background-color: #f8f9fa; border-radius: 8px; }
        .no-club-message h3 { font-size: 24px; color: #555; }
        .clubs { display: flex; flex-direction: column; align-items: center; }
        .club-list { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-top: 20px; }
        .club-card { background: #fff; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px; text-align: center; }
        .club-card img { width: 100%; height: auto; border-radius: 8px; }
        .club-actions { display: flex; justify-content: space-around; margin-top: 10px; }
        .edit-btn, .delete-btn, .view-btn { padding: 8px 16px; border: none; border-radius: 5px; cursor: pointer; }
        .edit-btn { background-color: #007bff; color: #fff; }
        .delete-btn { background-color: #dc3545; color: #fff; }
        .view-btn { background-color: #28a745; color: #fff; }
        @media (max-width: 1024px) { .club-list { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 768px) { .club-list { grid-template-columns: 1fr; } }
>>>>>>> Stashed changes
    </style>
</x-layout>
