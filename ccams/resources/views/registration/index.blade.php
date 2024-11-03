<!-- registration/index.blade.php -->
<!-- http://localhost:8000/clubs  -->

<x-layout>
    <x-slot name="header">
        <h2>Club Registration</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="club-container">
        <h2>Club Type</h2>
        <div class="clubs">
            <!-- Kelab / Persatuan-->
            <div class="club-card">
                <img src="{{ asset('images/persatuan.jpg') }}" alt="Kelab / Persatuan">
                <h3>Kelab / Persatuan</h3>
                <a href="{{ route('registration.kelab') }}" class="club-btn">See more</a>
            </div>
            <!-- Sukan / Permainan -->
            <div class="club-card">
                <img src="{{ asset('images/sukanpermainan.jpg') }}" alt="Sukan / Permainan">
                <h3>Sukan / Permainan</h3>
                <a href="{{ route('registration.sukan') }}" class="club-btn">See more</a>
            </div>
            <!-- Unit Beruniform -->
            <div class="club-card">
                <img src="{{ asset('images/unitberuniform.jpg') }}" alt="Unit Beruniform">
                <h3>Unit Beruniform</h3>
                <a href="{{ route('registration.beruniform') }}" class="club-btn">See more</a>
            </div>
        </div>
    </div>

    <style>
        /* Styling for consistent layout and image sizing */
        .club-container {
            text-align: left;
            margin-top: 20px;
        }

        .clubs {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 columns */
            gap: 20px;
            /* Space between items */
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
            width: 100%;
            /* Ensures the image takes up full width of the card */
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
                grid-template-columns: repeat(2, 1fr);
                /* 2 columns */
            }
        }

        @media (max-width: 768px) {
            .clubs {
                grid-template-columns: 1fr;
                /* 1 column */
            }
        }
    </style>
</x-layout>
