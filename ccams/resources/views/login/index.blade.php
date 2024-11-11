<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <style>
        /* Reset styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Basic body styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9; /* Light grey background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
            flex-direction: column;
            padding: 0 20px;
        }

        /* Navigation Bar */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 20px 40px;
            background-color: #fff;
            border-bottom: 1px solid #ddd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            display: flex;
            align-items: center;
            font-weight: bold;
            font-size: 30px;
            color: #0055ff;
        }

        .logo img {
            width: 150px;
            margin-right: 20px;
        }

        /* Navbar links */
        .navbar-right a {
            margin-left: 20px;
            text-decoration: none;
            font-size: 14px;
            color: #0055ff;
            font-weight: 500;
        }

        .navbar-right .signup {
            background-color: #0055ff;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .navbar-right .signup:hover {
            background-color: #003bb3;
        }

        /* Container */
        .container {
            display: flex;
            max-width: 1100px;
            width: 100%;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
            padding: 30px;
        }

        /* Left Section */
        .left-section {
            background-color: #2E4A42; /* Dark green */
            color: white;
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .left-section h1 {
            font-size: 32px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .left-section p {
            font-size: 15px;
            margin-bottom: 15px;
        }

        .left-section a {
            color: #fff;
            text-decoration: underline;
            transition: color 0.3s ease;
        }

        .left-section a:hover {
            color: #ddd;
        }

        /* Right Section */
        .right-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right-section h2 {
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #333;
        }

        /* Social Login Buttons */
        .login-option {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .login-option:hover {
            background-color: #f1f1f1;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 5px;
        }

        .form-group input[type="submit"] {
            background-color: #0055ff;
            color: white;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s ease;
        }

        .form-group input[type="submit"]:disabled {
            background-color: #ddd;
            cursor: not-allowed;
        }

        .form-group input[type="submit"]:hover:not(:disabled) {
            background-color: #0044cc;
        }

        /* Additional Links */
        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            font-size: 14px;
        }

        .links a {
            color: #0055ff;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <div class="navbar">
        <div class="logo">
            <img src="images/logo-name.png" alt="Logo">
        </div>
        <div class="navbar-right">
            <a href="{{ route('assessment.index') }}">Log in</a>
            <a href="{{ route('login.signin') }}" class="signup">Sign up</a>

        </div>
    </div>

    <div class="container">
        <!-- Left Section -->
        <div class="left-section">
            <h1>Join and learn with us</h1>
            <p>Log in to CCAMS to get started!</p>
            <p>By logging in to CCAMS, you agree to our 
                <a href="#">Terms of use</a> and <a href="#">Privacy Policy</a>.<br>
            </p>
        </div>

        <!-- Right Section (Login Form) -->
        <div class="right-section">
            <h2>Log in</h2>

            <!-- Social Login Buttons -->
            <!-- <a href="#" class="login-option">Continue with Google</a> -->

            <!-- Login Form -->
            <form action="{{ route('assessment.index') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email or username *</label>
                    <input type="text" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <input type="submit" id="loginBtn" value="Log in" disabled>
                </div>
            </form>

            <!-- Additional Links -->
            <div class="links">
                <a href="#">Forgot password?</a>
                <a href="#">Create an account</a>
            </div>
        </div>
    </div>

    <script>
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const loginBtn = document.getElementById('loginBtn');

        function toggleLoginButton() {
            loginBtn.disabled = !(emailInput.value.trim() && passwordInput.value.trim());
        }

        emailInput.addEventListener('input', toggleLoginButton);
        passwordInput.addEventListener('input', toggleLoginButton);
    </script>

</body>
</html>