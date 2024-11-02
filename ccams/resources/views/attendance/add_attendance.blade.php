<x-layout>
<x-slot name="header">
        <h2>Attendance</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile"> <!-- Replace with actual profile picture path -->
        </div>
    </x-slot>
    <div class="attendance-container">
        <h3>Attendance</h3>
        <h4>Coding & Robotics</h4>
        <p class="member-list">👥 20 members found</p>

        <!-- Search Bar and Filters -->
        <div class="search-container">
            <input type="text" class="search-bar" placeholder="Search Member">
            <div class="filter-buttons">
                <button class="filter-btn">Open To All</button>
                <button class="filter-btn">Sort By: Date</button>
            </div>
        </div>

        <!-- Attendance Table -->
        <table class="attendance-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>IC No</th>
                    <th>W1</th>
                    <th>W2</th>
                    <th>W3</th>
                    <th>W4</th>
                    <th>W5</th>
                    <th>W6</th>
                    <th>W7</th>
                    <th>W8</th>
                    <th>W9</th>
                    <th>W10</th>
                    <th>W11</th>
                    <th>W12</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 10; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>Ali bin Abu</td>
                    <td>010230-10-1567</td>
                    <td><span class="status-check">✔️</span></td>
                    <td><span class="status-cross">❌</span></td>
                    <td><span class="status-info">ℹ️</span></td>
                    <td><span class="status-check">✔️</span></td>
                    <td><span class="status-cross">❌</span></td>
                    <td><span class="status-check">✔️</span></td>
                    <td><span class="status-check">✔️</span></td>
                    <td><span class="status-check">✔️</span></td>
                    <td><span class="status-info">ℹ️</span></td>
                    <td><span class="status-check">✔️</span></td>
                    <td><span class="status-cross">❌</span></td>
                    <td><span class="status-check">✔️</span></td>
                    <td><button class="edit-btn">✏️</button></td>
                </tr>
                @endfor
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <a href="#" class="page-link">1</a>
            <a href="#" class="page-link">2</a>
            <a href="#" class="page-link">3</a>
        </div>
    </div>

    <!-- CSS Styling -->
    <style>
        .attendance-container {
            padding: 20px;
            max-width: 1000px;
            margin: auto;
        }

        h3, h4 {
            margin-bottom: 10px;
        }

        .member-list {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .search-bar {
            padding: 8px 12px;
            width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .filter-buttons {
            display: flex;
            gap: 10px;
        }

        .filter-btn {
            padding: 6px 12px;
            background-color: #eee;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .attendance-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .attendance-table th, .attendance-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .attendance-table th {
            background-color: #f5f5f5;
            font-weight: 600;
        }

        .status-check {
            color: green;
        }

        .status-cross {
            color: red;
        }

        .status-info {
            color: orange;
        }

        .edit-btn {
            background: #ffc107;
            border: none;
            color: #333;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .pagination {
            display: flex;
            justify-content: center;
            padding: 15px 0;
        }

        .page-link {
            margin: 0 5px;
            padding: 8px 12px;
            text-decoration: none;
            color: #333;
            background-color: #eee;
            border-radius: 5px;
            font-size: 14px;
        }

        .page-link:hover {
            background-color: #ddd;
        }
    </style>
</x-layout>
