<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f7fc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .left-section {
            background-color: #144c42;
            color: white;
            padding: 40px;
            text-align: center;
        }
        .left-section a {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row no-gutters shadow-lg">
            <!-- Left Section -->
            <div class="col-md-6 left-section d-flex flex-column justify-content-center align-items-center">
                <h1 class="font-weight-bold">Join Us</h1>
                <p>Start learning and activate your learning journey!</p>
                <p>Log in to get started!</p>
            </div>

            <!-- Right Section (Sign-Up Form) -->
            <div class="col-md-6 bg-white p-5">
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
                        <label for="role">Role:</label>
                        <select id="role" name="role" class="form-control" required>
                            <option value="teacher">Teacher</option>
                            <option value="student">Student</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
