<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f7fc;
            min-height: 100vh;
        }

        .container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .left-section {
            background-color: #144c42;
            color: white;
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .left-section h1 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .right-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right-section h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .form-group input,
        .dob-section select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-top: 6px;
        }

        .signup-button {
            background-color: #0055ff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .signup-button:hover {
            background-color: #0044cc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <h1>Join Us</h1>
            <p>Start learning and activate your learning journey!</p>
            <p>Log in to get started!</p>
        </div>

        <div class="right-section">
            <h2>Sign Up</h2>
            <form method="POST" action="{{ route('signup.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-group">
                    <label for="ic">IC Number:</label>
                    <input type="text" id="ic" name="ic" required>
                </div>

                <div class="form-group">
                    <label for="year">Year:</label>
                    <input type="text" id="year" name="year" required>
                </div>

                <div class="form-group">
                    <label for="level">Level:</label>
                    <input type="text" id="level" name="level" required>
                </div>

                <label for="dob">What is your date of birth?</label>
                <div class="dob-section">
                    <select name="month" id="month" required>
                        <option value=""></option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                    <select name="day" id="day" required>
                        <option value=""></option>
                        @for ($i = 1; $i <= 31; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    <select name="birth_year" id="birth_year" required>
                        <option value=""></option>
                        @for ($i = date('Y') - 100; $i <= date('Y'); $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <button type="submit" class="signup-button">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>
