<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo-trans.png') }}" type="image/x-icon">
    <title>CCAMS</title>
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
            background-color: rgba(0, 0, 0, 0.5);
            width: 100%;
            text-align: center;
            padding: 20px 0;
        }

        .header img {
            max-width: 250px;
        }

        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .forgot-password-card {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 400px;
            width: 100%;
            margin-top: -100px;
        }

        .btn-reset {
            background-color: #f0b429;
            color: #fff;
            border: none;
        }

        .btn-reset:hover {
            background-color: #f0a500;
        }

        .text-danger {
            font-size: 0.9rem;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <img src="../images/logo-name.png" alt="Logo">
    </div>

    <!-- Content -->
    <div class="overlay">
        <div class="forgot-password-card">
            <h2 class="mb-4" style="color: black;">Password Reset</h2>
            <form action="{{ route('login.resetp') }}" method="POST" novalidate>
                @csrf
                <!-- Email Input -->
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                    <div id="emailFeedback" class="text-danger"></div>
                </div>

                <!-- IC Input -->
                <div class="form-group">
                    <input type="text" id="ic" name="ic" class="form-control" placeholder="Enter your IC" required>
                    <div id="icFeedback" class="text-danger"></div>
                </div>

                <!-- New Password Input -->
                <div class="form-group">
                    <input type="password" id="Newpassword" name="Newpassword" class="form-control" placeholder="Enter your new password" required>
                </div>

                <!-- New Password Confirmation Input -->
                <div class="form-group">
                    <input type="password" id="Newpassword_confirmation" name="Newpassword_confirmation" class="form-control" placeholder="Confirm your new password" required>
                    <div id="passwordFeedback" class="text-danger"></div>
                </div>

                <button type="submit" class="btn btn-reset btn-block" id="submitBtn" disabled>Reset</button>
            </form>
            <div class="mt-3">
                <a href="{{ route('login.index') }}" class="text-primary">Back to Login</a>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let isEmailValid = false;
        let isICValid = false;
        let isValidUser = false;  // New variable to track if the email and IC belong to the same user

        // Email validation via AJAX
        $('#email').on('blur', function () {
            const email = $(this).val();
            if (email) {
                $.ajax({
                    url: "{{ route('check.email') }}", // Replace with actual route
                    method: 'POST',
                    data: { _token: '{{ csrf_token() }}', email },
                    success: function (response) {
                        if (response.exists) {
                            $('#emailFeedback').text('');
                            isEmailValid = true;
                        } else {
                            $('#emailFeedback').text('Email cannot be found');
                            isEmailValid = false;
                        }
                        validateUser();
                    }
                });
            }
        });

        // IC validation via AJAX
        $('#ic').on('blur', function () {
            const ic = $(this).val();
            if (ic) {
                $.ajax({
                    url: "{{ route('check.ic') }}", // Replace with actual route
                    method: 'POST',
                    data: { _token: '{{ csrf_token() }}', ic },
                    success: function (response) {
                        if (response.exists) {
                            $('#icFeedback').text('');
                            isICValid = true;
                        } else {
                            $('#icFeedback').text('IC cannot be found');
                            isICValid = false;
                        }
                        validateUser();
                    }
                });
            }
        });

        // Validate if email and IC belong to the same user
        function validateUser() {
            if (isEmailValid && isICValid) {
                const email = $('#email').val();
                const ic = $('#ic').val();
                $.ajax({
                    url: "{{ route('check.email.ic.match') }}", // Replace with actual route for matching email and IC
                    method: 'POST',
                    data: { _token: '{{ csrf_token() }}', email, ic },
                    success: function (response) {
                        if (response.match) {
                            $('#emailFeedback, #icFeedback').text('');  // Clear error messages if valid
                            isValidUser = true;
                        } else {
                            $('#emailFeedback').text('Email and IC do not match');
                            $('#icFeedback').text('Email and IC do not match');
                            isValidUser = false;
                        }
                        toggleSubmitButton();
                    }
                });
            } else {
                isValidUser = false;
                toggleSubmitButton();
            }
        }

        // Validate password match
        $('#Newpassword, #Newpassword_confirmation').on('input', function () {
            const password = $('#Newpassword').val();
            const confirmPassword = $('#Newpassword_confirmation').val();
            if (password && confirmPassword && password !== confirmPassword) {
                $('#passwordFeedback').text('Passwords do not match');
            } else {
                $('#passwordFeedback').text('');
            }
            toggleSubmitButton();
        });

        // Toggle submit button based on conditions
        function toggleSubmitButton() {
            const password = $('#Newpassword').val();
            const confirmPassword = $('#Newpassword_confirmation').val();
            if (isEmailValid && isICValid && isValidUser && password === confirmPassword) {
                $('#submitBtn').prop('disabled', false);
            } else {
                $('#submitBtn').prop('disabled', true);
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
