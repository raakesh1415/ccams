<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Example Interface</title>
    <style>
        /* General reset for padding, margin, and box-sizing */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Basic styles */
        body {
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #144c42; /* Dark green background */
            min-height: 100vh;
        }

        .container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Left Section */
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

        .left-section p {
            font-size: 16px;
            margin-bottom: 10px;
            text-align: center;
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
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .right-section p {
            font-size: 14px;
            margin-bottom: 20px;
            color: #555;
        }

        .role-selection {
            display: flex;
            margin-bottom: 20px;
        }

        .role-selection button {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f7f7f7;
            color: #333;
            cursor: pointer;
        }

        .role-selection button.active {
            background-color: #0055ff;
            color: white;
        }

        /* Date of birth section */
        .dob-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .dob-section select {
            width: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Sign up button */
        .signup-button {
            background-color: #0055ff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .signup-button:hover {
            background-color: #0044cc;
        }

        /* Additional links */
        .additional-links {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            font-size: 14px;
        }

        .additional-links a {
            color: #0055ff;
            text-decoration: none;
        }

        .additional-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Left Section -->
        <div class="left-section">
            <h1>Join Our Platform</h1>
            <p>Activate your learning</p>
            <p>Log in to get started!</p>
        </div>

        <!-- Right Section (Sign Up Form) -->
        <div class="right-section">
            <h2>Sign up</h2>
            <p>Join our platform for free as a</p>
            
            <!-- Role Selection -->
            <!-- Role Selection -->
    <div class="role-selection">
        <button onclick="selectRole(this)">Admin</button>
        <button onclick="selectRole(this)">Teacher</button>
        <button onclick="selectRole(this)">Student</button>
    </div>

    <style>
        .role-selection button {
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
        }
        .role-selection button.selected {
            background-color: #007bff;
            color: white;
        }
    </style>

    <script>
        function selectRole(button) {
            // 获取所有按钮，移除 selected 样式
            const buttons = document.querySelectorAll('.role-selection button');
            buttons.forEach(btn => btn.classList.remove('selected'));
            
            // 为点击的按钮添加 selected 样式
            button.classList.add('selected');
        }
</script>


        <!-- Date of Birth Section -->
        <label for="dob">What is your date of birth?</label>
        <div class="dob-section">
            <select name="month" id="month">
                <option value="null"></option>
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
            <select name="day" id="day">
                <option value="null"></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <!-- Add more days as needed -->
            </select>
            <select name="year" id="year">
                <option value="null"></option>
                <option value="2009">2003</option>
                <option value="2009">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2009">2010</option>
                <!-- Add more years as needed -->
            </select>
        </div>

        <!-- Sign Up Button -->
        <button class="signup-button">Sign up by choosing a username</button>

        <!-- Additional Links -->
        <div class="additional-links">
            <a href="#">Enter class code</a>
            <a href="#">Already have an account?</a>
        </div>
    </div>
</div>

</body>
</html>
