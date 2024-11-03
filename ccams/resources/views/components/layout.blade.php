<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo-trans.png') }}" type="image/x-icon">
    <title>CCAMS - Assessment</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    {{-- @vite(['resources/css/app.css','rescources/js/app.js']) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Main layout */
        .container {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar styling */
        .sidebar {
            width: 16%;
            background-color: #ffffff;
            padding: 15px;
            flex-shrink: 0;
            position: fixed;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            scrollbar-width: none;
            /* Firefox: Hide scrollbar */
        }

        /* Hide scrollbar for Chrome, Safari, and Edge */
        .sidebar::-webkit-scrollbar {
            display: none;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu-item {
            margin: 20px 0;
        }

        .menu-item a {
            text-decoration: none;
            color: #6B7280;
            font-size: 16px;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s;
        }

        .menu-item i {
            margin-right: 12px;
            font-size: 18px;
        }

        .menu-item a:hover {
            background-color: #E5E7EB;
            color: #000;
        }

        .menu-item.active a {
            background-color: #E5E7EB;
            color: #000;
            font-weight: bold;
        }

        /* Main content and header */
        .main-content {
            flex-grow: 1;
            margin-left: 18.5%;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .header {
            position: fixed;
            top: 0;
            left: 18.5%;
            right: 0;
            background: white;
            margin: 0 20px 0 20px;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Content scrollable area */
        .content {
            background-color: #ededed;
            margin-top: 70px;
            /* Adjust for header height */
            padding: 0 20px 20px 20px;
            overflow-y: auto;
            height: calc(100vh - 80px);
            /* Full height minus header */
            scrollbar-width: none;
            /* Firefox: Hide scrollbar */
        }

        /* Hide scrollbar for Chrome, Safari, and Edge */
        .content::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <img src="{{ asset('images/logo-name.png') }}" alt="CCAMS Logo" class="logo-img" width="150px">
            </div>
            <ul class="menu">
                <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard">
                        <i class="fas fa-th-large"></i> Dashboard
                    </a>
                </li>
                <li class="menu-item {{ request()->is('club') ? 'active' : '' }}">
                    <a href="/club">
                        <i class="fas fa-university"></i> Club
                    </a>
                </li>
                <li class="menu-item {{ request()->is('registration') ? 'active' : '' }}">
                    <a href="/registration">
                        <i class="fas fa-clipboard-list"></i> Registration
                    </a>
                </li>
                <li class="menu-item {{ request()->is('activity') ? 'active' : '' }}">
                    <a href="/activity">
                        <i class="fas fa-tasks"></i> Activity
                    </a>
                </li>
                <li class="menu-item {{ request()->is('attendance') ? 'active' : '' }}">
                    <a href="/attendance">
                        <i class="fas fa-user-check"></i> Attendance
                    </a>
                </li>
                <li class="menu-item {{ request()->is('assessment') ? 'active' : '' }}">
                    <a href="/assessment">
                        <i class="fas fa-clipboard-list"></i> Assessment
                    </a>
                </li>
                <li class="menu-item {{ request()->is('settings') ? 'active' : '' }}">
                    <a href="/settings">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                {{ $header }}
            </div>

            <!-- Content Section -->
            <div class="content">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
