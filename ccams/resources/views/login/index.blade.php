<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f9f9f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #333;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .left-section {
            background-color: #2E4A42;
            color: white;
            text-align: center;
            padding: 40px;
        }
        .left-section a {
            color: #fff;
        }
        .login-option {
            border: 1px solid #ddd;
            border-radius: 4px;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .login-option:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white w-100">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="images/logo-name.png" alt="Logo" style="width: 150px; margin-right: 20px;">
        </a>
        <div class="ml-auto">
            <a href="#" class="text-primary mr-3">Log in</a>
            <a href="{{ route('login.signin') }}" class="btn btn-primary">Sign up</a>
        </div>
    </nav>

    <!-- Container -->
    <div class="container mt-5">
        <div class="row no-gutters shadow-lg">
            <!-- Left Section -->
            <div class="col-md-6 left-section d-flex flex-column justify-content-center">
                <h1 class="font-weight-bold">Join and learn with us</h1>
                <p>Log in to CCAMS to get started!</p>
                <p>By logging in to CCAMS, you agree to our 
                    <a href="#">Terms of use</a> and <a href="#">Privacy Policy</a>.
                </p>
            </div>

            <!-- Right Section (Login Form) -->
            <div class="col-md-6 bg-white p-5">
                <h2 class="font-weight-bold mb-4">Log in</h2>

                <!-- Social Login Button (Optional) -->
                <!-- <a href="#" class="login-option btn btn-light w-100 mb-3">Continue with Google</a> -->

                <!-- Login Form -->
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email or username *</label>
                        <input type="text" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password *</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" id="loginBtn" class="btn btn-primary w-100" disabled>Log in</button>
                </form>

                <!-- Additional Links -->
                <div class="d-flex justify-content-between mt-3">
                    <a href="#" class="text-primary">Forgot password?</a>
                    <a href="#" class="text-primary">Create an account</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
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
