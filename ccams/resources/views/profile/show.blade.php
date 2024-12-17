<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/x-layout@latest/dist/x-layout.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <x-layout>
        <x-slot name="header">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">User Management</a>
            </nav>
        </x-slot>

        <x-slot name="content">
            <div class="container">
                <h1 class="mt-4">User Profile</h1>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Name: {{ $user->name }}</h5>
                        <p class="card-text">Email: {{ $user->email }}</p>
                        <p class="card-text">Role: {{ $user->role }}</p>
                        <p class="card-text">Last Login: {{ $user->last_login_at }}</p>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <footer class="bg-light text-center py-3">
                <p>&copy; 2024 User Management System</p>
            </footer>
        </x-slot>
    </x-layout>
</body>
</html>
