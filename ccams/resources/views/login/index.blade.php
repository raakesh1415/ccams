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
<<<<<<< HEAD
            padding: 0;
=======
            font-family: Arial, sans-serif;
            overflow: hidden;
            /* Disable page scrolling */
>>>>>>> 43a9ef6c955154f8d17c237c023a71577c61ef82
        }

        /* Basic body styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
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

<<<<<<< HEAD
        /* Left Section */
        .left-section {
            background-color: #2E4A42;
            color: white;
            padding: 40px;
=======
        .carousel {
            position: relative;
            width: 100%;
            height: 100%;
        }

        .carousel-image {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            /* Default to invisible */
            transition: opacity 0.5s ease-in-out;
        }

        .carousel-image.active {
            opacity: 1;
            /* Visible when active */
            z-index: 1;
            /* Ensure it is on top */
        }

        .right-panel {
>>>>>>> 43a9ef6c955154f8d17c237c023a71577c61ef82
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
<<<<<<< HEAD
            border: none;
            transition: background-color 0.3s ease;
        }

        .form-group input[type="submit"]:disabled {
            background-color: #ddd;
            cursor: not-allowed;
=======
            transition: background-color 0.3s;
            opacity: 0.6;
            /* Default to not clickable */
            cursor: not-allowed;
            /* Cursor style */
        }

        .login-btn.enabled {
            opacity: 1;
            /* Set to clickable */
            cursor: pointer;
            /* Change cursor style */
>>>>>>> 43a9ef6c955154f8d17c237c023a71577c61ef82
        }

        .form-group input[type="submit"]:hover:not(:disabled) {
            background-color: #0044cc;
        }

<<<<<<< HEAD
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
=======
        @media (max-width: 768px) {

            .input-field,
            .select-role,
            .login-btn {
                width: 100%;
            }
>>>>>>> 43a9ef6c955154f8d17c237c023a71577c61ef82
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
            <a href="{{ route('login.index') }}">Log in</a>
            <a href="{{ route('login.signin') }}" class="signup">Sign up</a>
        </div>
    </div>
<<<<<<< HEAD

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

            <!-- Login Form -->
            <form action="{{ route('login.submit') }}" method="POST">
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
=======
    <div class="right-panel">
        <select class="select-role" id="roleSelect">
            <option value="" disabled selected>Select Role</option>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select>
        <input type="text" class="input-field" id="username" placeholder="Username" required>
        <input type="password" class="input-field" id="password" placeholder="Password" required>
        <button class="login-btn" id="loginButton" disabled>Log In</button>
        <!-- <button class="Signin-btn" id="SigninButton" onclick="window.location.href='/login/signin'" >Sign In</button> -->
>>>>>>> 43a9ef6c955154f8d17c237c023a71577c61ef82
    </div>

    <script>
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        const loginBtn = document.getElementById('loginBtn');

        // Function to enable/disable the submit button based on input values
        function toggleSubmitButton() {
            loginBtn.disabled = !(emailInput.value && passwordInput.value);
        }

<<<<<<< HEAD
        // Attach event listeners to input fields to monitor changes
        emailInput.addEventListener('input', toggleSubmitButton);
        passwordInput.addEventListener('input', toggleSubmitButton);
=======
        usernameInput.addEventListener('input', updateButtonState);
        passwordInput.addEventListener('input', updateButtonState);

        // Handle login button click event
        loginButton.addEventListener('click', function() {
            // Here you can add an AJAX request for login validation, currently redirecting directly
            window.location.href = "{{ route('assessment.index') }}"; // Redirect to assessment/index.blade.php
        });
>>>>>>> 43a9ef6c955154f8d17c237c023a71577c61ef82
    </script>

</body>

</html>
