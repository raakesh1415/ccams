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
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
        }

        .signup-card h2 {
            margin-bottom: 1.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
        }

        .form-group label {
            color: #000;
        }

        .form-control {
            margin-bottom: 1rem;
            border-radius: 8px;
            padding: 5px;
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

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .form-column {
            flex: 1;
        }

        .separator {
            margin: 20px 0;
            border-top: 2px solid #ccc;
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
            <h2>Sign Up</h2>
            <form id="signupForm" method="POST" action="{{ route('signin.store') }}">
                @csrf
                
                <!-- 分为左右两部分 -->
                <div class="form-row">
                    <!-- 左边部分：个人信息 -->
                    <div class="form-column">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                            <small id="nameFeedback" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                            <small id="emailFeedback" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                            <small id="passwordFeedback" class="form-text text-warning"></small>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password:</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>
                    </div>

                    <!-- 右边部分：额外信息 -->
                    <div class="form-column">
                        <div class="form-group">
                            <label for="ic">IC Number:</label>
                            <input type="text" id="ic" name="ic" class="form-control" required>
                            <small id="icFeedback" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="role">You are:</label>
                            <select id="role" name="role" class="form-control" required>
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="class">Please choose your class:</label>
                            <input list="classes" id="class" name="class" class="form-control" placeholder="Type or select your Class" required>
                            <datalist id="classes">
                            <option value="1 AL ABQARIY"></option>
                            <option value="2 AL ABQARIY"></option>
                            <option value="3 AL ABQARIY"></option>
                            <option value="1 ASTER"></option>
                            <option value="2 ASTER"></option>
                            <option value="3 ASTER"></option>
                            <option value="1 AZALEA"></option>
                            <option value="2 AZALEA"></option>
                            <option value="3 AZALEA"></option>
                            <option value="1 BEGONIA"></option>
                            <option value="2 BEGONIA"></option>
                            <option value="3 BEGONIA"></option>
                            <option value="1 CAMELIA"></option>
                            <option value="2 CAMELIA"></option>
                            <option value="3 CAMELIA"></option>
                            <option value="1 CARNATION"></option>
                            <option value="2 CARNATION"></option>
                            <option value="3 CARNATION"></option>
                            <option value="1 DAISY"></option>
                            <option value="2 DAISY"></option>
                            <option value="3 DAISY"></option>
                            <option value="1 FREESIA"></option>
                            <option value="2 FREESIA"></option>
                            <option value="3 FREESIA"></option>
                            <option value="1 HIBISCUS"></option>
                            <option value="2 HIBISCUS"></option>
                            <option value="3 HIBISCUS"></option>
                            <option value="1 HELICONIA"></option>
                            <option value="2 HELICONIA"></option>
                            <option value="3 HELICONIA"></option>
                            <option value="1 IXORA"></option>
                            <option value="2 IXORA"></option>
                            <option value="3 IXORA"></option>
                            <option value="1 JASMINE"></option>
                            <option value="2 JASMINE"></option>
                            <option value="3 JASMINE"></option>
                            <option value="1 LAVENDER"></option>
                            <option value="2 LAVENDER"></option>
                            <option value="3 LAVENDER"></option>
                            <option value="1 PETUNIA"></option>
                            <option value="2 PETUNIA"></option>
                            <option value="3 PETUNIA"></option>
                            <option value="1 ORCHID"></option>
                            <option value="2 ORCHID"></option>
                            <option value="3 ORCHID"></option>
                            <option value="4 AL FATEH"></option>
                            <option value="5 AL FATEH"></option>
                            <option value="4 ARISTOTLE"></option>
                            <option value="5 ARISTOTLE"></option>
                            <option value="4 IBNU SINA"></option>
                            <option value="5 IBNU SINA"></option>
                            <option value="4 PASCAL"></option>
                            <option value="5 PASCAL"></option>
                            <option value="4 IBNU BATTUTAH"></option>
                            <option value="5 IBNU BATTUTAH"></option>
                            <option value="4 AL KHAWARIZMI"></option>
                            <option value="5 AL KHAWARIZMI"></option>
                            <option value="4 AL BIRUNI"></option>
                            <option value="5 AL BIRUNI"></option>
                            <option value="4 ZAABA"></option>
                            <option value="5 ZAABA"></option>
                            <option value="4 AL AWWAM"></option>
                            <option value="5 AL AWWAM"></option>
                            <option value="4 AL FARABI"></option>
                            <option value="5 AL FARABI"></option>
                            <option value="4 VAN GOGH"></option>
                            <option value="5 VAN GOGH"></option>
                            <option value="4 PICASSO"></option>
                            <option value="5 PICASSO"></option>
                            <option value="4 FARADAY"></option>
                            <option value="5 FARADAY"></option>
                            <option value="4 DA VINCI"></option>
                            <option value="5 DA VINCI"></option>
                            <option value="4 AL FIHRI"></option>
                            <option value="5 AL FIHRI"></option>
                            </datalist>
                        </div>
                    </div>
                </div>

                <div class="separator"></div>

                <button type="submit" class="btn btn-signup">Sign Up</button>
            </form>
            <div class="signup-links">
                <a href="/">Already have an account?</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Check if email exists
            $('#email').on('blur', function () {
                const email = $(this).val();
                if (email) {
                    $.ajax({
                        url: "{{ route('check.email') }}",
                        method: 'POST',
                        data: { _token: '{{ csrf_token() }}', email },
                        success: function (response) {
                            if (response.exists) {
                                $('#emailFeedback').text('Email already exists.');
                            } else {
                                $('#emailFeedback').text('');
                            }
                        }
                    });
                }
            });

            // Check if name exists
            $('#name').on('blur', function () {
                const name = $(this).val();
                if (name) {
                    $.ajax({
                        url: "{{ route('check.name') }}", // The route to handle name validation
                        method: 'POST',
                        data: { _token: '{{ csrf_token() }}', name },
                        success: function (response) {
                            if (response.exists) {
                                $('#nameFeedback').text('Name already exists.');
                            } else {
                                $('#nameFeedback').text('');
                            }
                        }
                    });
                }
            });

            // Validate password length
            $('#password').on('input', function () {
                const password = $(this).val();
                if (password.length < 8) {
                    $('#passwordFeedback').text('Password must be at least 8 characters.');
                } else {
                    $('#passwordFeedback').text('');
                }
            });

            // Check if IC exists
            $('#ic').on('blur', function () {
                const ic = $(this).val();
                if (ic && ic.length !== 12) {
                    $('#icFeedback').text('IC number must be exactly 12 characters.');
                }
                else{
                    if (ic) {
                    $.ajax({
                        url: "{{ route('check.ic') }}", // The route to handle IC validation
                        method: 'POST',
                        data: { _token: '{{ csrf_token() }}', ic },
                        success: function (response) {
                            if (response.exists) {
                                $('#icFeedback').text('IC already exists.');
                            } else {
                                $('#icFeedback').text('');
                            }
                        }
                    });
                }
                }       
            });

            // Validate password confirmation
            $('#signupForm').on('submit', function (e) {
                const password = $('#password').val();
                const passwordConfirmation = $('#password_confirmation').val();

                if (password !== passwordConfirmation) {
                    e.preventDefault(); // Prevent form submission
                    alert('Passwords do not match! Please re-enter.');
                }
            });
        });
    </script>
</body>
</html>
