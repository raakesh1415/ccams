<x-layout>
    <x-slot name="header">
        <h2>Assessment</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="assessment-container">
        {{-- <form action="{{ route('assessment.submit') }}" method="POST"> --}}
        <form action="" method="POST">
            @csrf
            <h2>Assessment Form</h2>

            <!-- Student Section -->
            <h3>Student Details <span class="score-info"></span></h3>
            <div class="text-section">
                <div class="attendance-section">
                    <label>Name:  <input type="text" name="name" value="Ali Bin Abu"></label><br>
                    <label>Year:&nbsp;&nbsp; <input type="text" name="year" value="2024"></label><br>
                </div>
                <div class="attendance-section">
                    <label>IC No: <input type="text" name="ic" value="070925101909"></label><br>
                    <label>ID No: <input type="text" name="id" value="B22AE007"></label><br>
                </div>
                <div class="attendance-section">
                    <label>Level: <input type="text" name="level" value="Form 5"></label><br>
                    <label>Email: <input type="text" name="email" value="aliabu@gmail.com"></label>
                </div>
            </div>

            <hr>

            <!-- Position Section -->
            <h3>Position <span class="score-info">/ 10</span></h3>
            <div class="form-group">
                <!-- Left Column Positions -->
                <div class="position-column">
                    <label><input type="radio" name="position" value="President"> President (10)</label><br>
                    <label><input type="radio" name="position" value="Vice President"> Vice President (8)</label><br>
                    <label><input type="radio" name="position" value="Secretary"> Secretary (8)</label><br>
                </div>
                <!-- Center Column Positions -->
                <div class="position-column">
                    <label><input type="radio" name="position" value="Treasurer"> Treasurer (8)</label><br>
                    <label><input type="radio" name="position" value="Vice Secretary"> Vice Secretary (6)</label><br>
                    <label><input type="radio" name="position" value="Vice Treasurer"> Vice Treasurer (6)</label><br>
                </div>
                <!-- Right Column Positions -->
                <div class="position-column">
                    <label><input type="radio" name="position" value="AJK"> AJK (6)</label><br>
                    <label><input type="radio" name="position" value="Active Member"> Active Member (4)</label><br>
                    <label><input type="radio" name="position" value="Ordinary Member"> Ordinary Member(2)</label><br>
                </div>
            </div>

            <!-- Engagement Level Section -->
            <h3>Engagement Level <span class="score-info">/ 20</span></h3>
            <div class="form-group">
                <!-- Engagement 1 -->
                <div class="position-column">
                    <h4>Engagement 1</h4>
                    <label><input type="radio" name="engagement_1" value="International"> International (20)</label><br>
                    <label><input type="radio" name="engagement_1" value="National"> National (17)</label><br>
                    <label><input type="radio" name="engagement_1" value="Country"> Country (14)</label><br>
                    <label><input type="radio" name="engagement_1" value="District/Zone"> District/Zone (11)</label><br>
                    <label><input type="radio" name="engagement_1" value="School/None"> School/None (0)</label><br>
                </div>
                <!-- Engagement 2 -->
                <div class="position-column">
                    <h4>Engagement 2</h4>
                    <label><input type="radio" name="engagement_2" value="International"> International (15)</label><br>
                    <label><input type="radio" name="engagement_2" value="National"> National (12)</label><br>
                    <label><input type="radio" name="engagement_2" value="Country"> Country (10)</label><br>
                    <label><input type="radio" name="engagement_2" value="District/Zone"> District/Zone (8)</label><br>
                    <label><input type="radio" name="engagement_2" value="School/None"> School/None (0)</label><br>
                </div>
                <!-- Engagement 3 -->
                <div class="position-column">
                    <h4>Engagement 3</h4>
                    <label><input type="radio" name="engagement_3" value="International"> International (10)</label><br>
                    <label><input type="radio" name="engagement_3" value="National"> National (8)</label><br>
                    <label><input type="radio" name="engagement_3" value="Country"> Country (6)</label><br>
                    <label><input type="radio" name="engagement_3" value="District/Zone"> District/Zone (4)</label><br>
                    <label><input type="radio" name="engagement_3" value="School/None"> School/None (0)</label><br>
                </div>
            </div>

            <!-- Achievement Level Section -->
            <h3>Achievement Level <span class="score-info">/ 20</span></h3>
            <div class="form-group">
                <div class="position-column-achieve">
                    <h4>Engagement</h4>
                    <label> International </label><br>
                    <label> National </label><br>
                    <label> Country </label><br>
                    {{-- <label> Division* </label><br> --}}
                    <label> District/Zone </label><br>
                    <label> School </label><br>
                </div>
                <!-- Champion -->
                <div class="position-column-achieve">
                    <h4>Champion</h4>
                    <label><input type="checkbox" name="achievement" value="C-I"> 20</label><br>
                    <label><input type="checkbox" name="achievement" value="C-N"> 17</label><br>
                    <label><input type="checkbox" name="achievement" value="C-C"> 14</label><br>
                    <label><input type="checkbox" name="achievement" value="C-D"> 11</label><br>
                    <label><input type="checkbox" name="achievement" value="C-S"> 8</label><br>
                </div>
                <!-- 1st Runner Up -->
                <div class="position-column-achieve">
                    <h4>1st Runner Up</h4>
                    <label><input type="checkbox" name="achievement" value="1-I"> 19</label><br>
                    <label><input type="checkbox" name="achievement" value="1-N"> 16</label><br>
                    <label><input type="checkbox" name="achievement" value="1-C"> 13</label><br>
                    <label><input type="checkbox" name="achievement" value="1-D"> 10</label><br>
                    <label><input type="checkbox" name="achievement" value="1-S"> 7</label><br>
                </div>
                <!-- 2nd Runner Up -->
                <div class="position-column-achieve">
                    <h4>2nd Runner Up</h4>
                    <label><input type="checkbox" name="achievement" value="2-I"> 18</label><br>
                    <label><input type="checkbox" name="achievement" value="2-N"> 15</label><br>
                    <label><input type="checkbox" name="achievement" value="2-C"> 12</label><br>
                    <label><input type="checkbox" name="achievement" value="2-D"> 9</label><br>
                    <label><input type="checkbox" name="achievement" value="2-S"> 6</label><br>
                </div>
            </div>

            <!-- Commitment Section -->
            <h3>Commitment <span class="score-info">/ 10</span></h3>
            <div class="form-group commitment-grid">
                <div class="position-column">
                    <label><input type="checkbox" name="commitment" value="Demonstrate leadership"> Demonstrate leadership (3)</label><br>
                    <label><input type="checkbox" name="commitment" value="Manage activities"> Manage activities (3)</label><br>
                    <label><input type="checkbox" name="commitment" value="Helping teachers/friends"> Helping teachers/friends (2)</label><br>
                    <label><input type="checkbox" name="commitment" value="Provide equipment"> Provide equipment (2)</label><br>
                </div>
                <div class="position-column">
                    <label><input type="checkbox" name="commitment" value="Clean the area"> Clean the area (2)</label><br>
                    <label><input type="checkbox" name="commitment" value="Punctual"> Punctual (2)</label><br>
                    <label><input type="checkbox" name="commitment" value="Show interest"> Show interest (2)</label><br>
                    <label><input type="checkbox" name="commitment" value="Show seriousness"> Show seriousness (2)</label><br>
                </div>
                <div class="position-column">
                    <label><input type="checkbox" name="commitment" value="Follow Instructions"> Follow Instructions (2)</label><br>
                    <label><input type="checkbox" name="commitment" value="Trying"> Trying (2)</label><br>
                    <label><input type="checkbox" name="commitment" value="Give cooperation"> Give cooperation (2)</label><br>
                    <label><input type="checkbox" name="commitment" value="Any observable pure value"> Any observable pure value (2)</label><br>
                </div>
            </div>

            <h3>Contribution Service (School Level) <span class="score-info">/ 10</span></h3>
            <div class="form-group">
                <div class="position-column-contribution">
                    <label><input type="radio" name="contribution" value="CS1"> Students who are registered as program/tournament/competition/carnival/course participants (10)</label><br>
                    <label><input type="radio" name="contribution" value="CS2"> Involves specific skills-judge/umpire, team coach/technical aspects (10)</label><br>
                    <label><input type="radio" name="contribution" value="CS3"> Involvement of students involved in activities such as interlude performances (8)</label><br>
                    <label><input type="radio" name="contribution" value="CS4"> Helping in terms of making unit activities successful such as participating in performances, cheerleading and related (5)</label><br>
                </div>
            </div>

            <!-- Attendance and Comment Section -->
            <h3>Attendance & Comment <span class="score-info">/ 40</span></h3>
            <div class="text-section">
                <div class="attendance-section">
                    <label>Attendance:</label>
                    <input type="text" name="attendance" value="12">
                </div>
                <div class="comment-section">
                    <label>Comment:</label>
                    <textarea name="comment" placeholder="Enter your comment here" rows="1"></textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Submit Assessment</button>

        </form>
    </div>

    <style>
        .assessment-container {
            text-align: center;
            min-width: 500px;
            margin: auto;
            padding: 10px 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .position-column {
            display: inline-block;
            width: 30%;
            vertical-align: top;
            padding: 10px;
        }

        .position-column-achieve {
            display: inline-block;
            width: 20%;
            vertical-align: top;
            padding: 10px;
        }

        .position-column-contribution {
            display: inline-block;
            width: 100%;
            vertical-align: top;
            padding: 10px;
        }

        h2 {
            text-align: center;
        }

        h3 {
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: left;
        }

        h4 {
            margin: 8px 0px 8px 0px;
            font-weight: normal;
            color: #555;
            text-align: left;
        }

        .score-info {
            font-size: 0.9em;
            color: #777;
        }

        .submit-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px 0 20px 0;
            transition: background-color 0.3s;
        }

        .commitment-grid {
            display: flex;
            justify-content: space-between;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .text-section {
            display: flex;
            gap: 20px;
            text-align: left;
            justify-content: space-between;
            padding: 10px;
        }

        .attendance-section, .comment-section {
            display: flex;
            flex-direction: column;
            width: 48%;
        }

        .attendance-section input[type="text"] {
            padding: 8px;
            font-size: 1em;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .comment-section textarea {
            padding: 8px;
            font-size: 1em;
            border: 1px solid #ced4da;
            border-radius: 4px;
            /* height: 60px; */
            /* resize: vertical; */
        }
    </style>
</x-layout>
