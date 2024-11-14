<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
            width: 100%;
            height: 100vh;
            padding-top: 20px;
        }

        .signup-card {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .signup-card h2 {
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            margin-bottom: 1rem;
            border-radius: 8px;
            padding: 5px;
        }

        .form-group label {
            color: #000; /* Set label color to black */
        }

        .btn-signup {
            background-color: #f0b429;
            border: none;
            color: #fff;
            padding: 10px;
            font-size: 1.1rem;
            width: 100%;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .btn-signup:hover {
            background-color: #f0a500;
        }

        .signup-links {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #007bff;
        }

        .signup-links a {
            color: #007bff;
        }

    </style>
</head>
<body>
    <!-- Header with Logo at the Top -->
    <div class="header">
        <img src="../images/logo-name.png" alt="Logo">
    </div>

    <!-- Overlay and Sign-Up Form -->
    <div class="overlay">
        <div class="signup-card">
            <h2 class="font-weight-bold mb-4">Sign Up</h2>
            <form method="POST" action="{{ route('signin.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="ic">IC Number:</label>
                    <input type="text" id="ic" name="ic" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="role">You are:</label>
                    <select id="role" name="role" class="form-control" required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-signup">Sign Up</button>
            </form>
            <div class="signup-links">
                <a href="/">Already have an account?</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
