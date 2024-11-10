<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
            /* Disable page scrolling */
        }

        .left-panel {
            flex: 1;
            position: relative;
            overflow: hidden;
        }

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
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
            padding: 20px;
        }

        .select-role {
            width: 80%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .input-field {
            width: 80%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .login-btn {
            width: 80%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
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
        }

        .login-btn:hover.enabled {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {

            .input-field,
            .select-role,
            .login-btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="left-panel">
        <div class="carousel">
            <img src="{{ asset('images/unitberuniform.jpg') }}" alt="Image 1" class="carousel-image active">
            <img src="{{ asset('images/unitberuniform.jpg') }}" alt="Image 2" class="carousel-image">
            <img src="{{ asset('images/sukanpermainan.jpg') }}" alt="Image 3" class="carousel-image">
            <!-- You can add more images -->
        </div>
    </div>
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
    </div>

    <script>
        const images = document.querySelectorAll('.carousel-image');
        let currentIndex = 0;

        function showNextImage() {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % images.length; // Loop
            images[currentIndex].classList.add('active');
        }

        // Change images every 3 seconds
        setInterval(showNextImage, 3000);

        // Get input fields and button
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const loginButton = document.getElementById('loginButton');

        // Listen for input events on the fields
        function updateButtonState() {
            if (usernameInput.value && passwordInput.value) {
                loginButton.disabled = false;
                loginButton.classList.add('enabled'); // Add clickable style
            } else {
                loginButton.disabled = true;
                loginButton.classList.remove('enabled'); // Remove clickable style
            }
        }

        usernameInput.addEventListener('input', updateButtonState);
        passwordInput.addEventListener('input', updateButtonState);

        // Handle login button click event
        loginButton.addEventListener('click', function() {
            // Here you can add an AJAX request for login validation, currently redirecting directly
            window.location.href = "{{ route('assessment.index') }}"; // Redirect to assessment/index.blade.php
        });
    </script>
</body>

</html>
