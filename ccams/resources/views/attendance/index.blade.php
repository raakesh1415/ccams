<style>
    .attendance-container {
        text-align: center;
    }

    /* Clubs grid layout */
    .clubs {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 columns */
        gap: 20px; /* Space between items */
        margin-top: 20px;
    }

    /* Club card styling */
    .club-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
    }

    .club-card img {
        width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .attendance-btn {
        margin-top: 10px;
        background-color: #000;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    h1 {
        margin: 0;
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
</style>

<x-layout>
    <x-slot name="header">
        <h2>Attendance</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile"> <!-- Replace with actual profile picture path -->
        </div>
    </x-slot>

    <div class="attendance-container">
        <h2>My Clubs</h2>
        <div class="clubs">
            <!-- Club 1 -->
            <div class="club-card">
                <img src="{{ asset('images/testimg1.png') }}" alt="St John's Ambulance">
                <h3>St John's Ambulance</h3>
                <p>Uniform Body</p>
                <a href="/attendance/stjohns" class="attendance-btn">View Attendance</a>
            </div>
            <!-- Club 2 -->
            <div class="club-card">
                <img src="{{ asset('images/testimg2.png') }}" alt="Coding & Robotics">
                <h3>Coding & Robotics</h3>
                <p>Society</p>
                <a href="/attendance/coding-robotics" class="attendance-btn">View Attendance</a>
            </div>
            <!-- Club 3 -->
            <div class="club-card">
                <img src="{{ asset('images/testimg3.png') }}" alt="Badminton">
                <h3>Badminton</h3>
                <p>Sports & Games</p>
                <a href="/attendance/badminton" class="attendance-btn">View Attendance</a>
            </div>
        </div>
    </div>
</x-layout>

