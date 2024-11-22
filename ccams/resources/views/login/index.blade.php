<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('/images/Background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            color: #fff;
        }

        .header {
            width: 100%;
            display: flex;
            justify-content: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .header img {
            width: 250px;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            padding-top: 20px;
            flex: 1;
        }

        .login-card {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 60px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 350px;
            width: 100%;
            text-align: center;
            margin-top: 1px;
        }

        .login-card h2 {
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            margin-bottom: 1rem;
            border-radius: 8px;
            padding: 10px;
        }

        .btn-login {
            background-color: #f0b429;
            border: none;
            color: #fff;
            padding: 10px;
            font-size: 1.1rem;
            width: 100%;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: #f0a500;
        }

        .login-links {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #007bff;
        }

        .login-links a {
            color: #007bff;
        }
    </style>
</head>
<body>
    <!-- Header with Logo at the Top -->
    <div class="header">
        <img src="images/logo-name.png" alt="Logo">
    </div>

    <!-- Overlay and Login Form -->
    <div class="overlay">
        <!-- Display Success or Error Messages -->
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Card -->
        <div class="login-card">
            <h2>Login</h2>
            <form action="{{ route('login.submit') }}" method="POST" novalidate>
                @csrf
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                <button type="submit" class="btn btn-login">SIGN IN</button>
            </form>
            <div class="login-links">
                <a href="{{ route('login.reset') }}">Forgot password</a> | 
                <a href="{{ route('login.signin') }}">Create an account</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
