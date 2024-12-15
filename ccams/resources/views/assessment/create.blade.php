<x-layout>
    <div class="container-fluid px-4 py-4">
        <div class="card">
            <div class="card-header text-center">
                <h3>Assessment Form</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('assessment.store') }}" method="POST">
                    @csrf
                    {{-- @method('post') --}}
                    {{-- <h2 class="text-center mb-4">Assessment Form</h2> --}}

                    <!-- Student Section -->
                    <h3 class="mb-3">Student Details <small class="text-muted"></small></h3>
                    <div class="row mb-3">
                        <div class="col-md-4 mb-2">
                            <label for="user_id" class="form-label">Select Student:</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="">-- Select Student --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <h3 class="mb-3">Student Details <small class="text-muted"></small></h3>
                    <div class="row mb-3">
                        <div class="col-md-4 mb-2">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="Ali Bin Abu">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="year" class="form-label">Year:</label>
                            <input type="text" class="form-control" id="year" name="year" value="2024">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="ic" class="form-label">IC No:</label>
                            <input type="text" class="form-control" id="ic" name="ic" value="070925101909">
                        </div>
                    </div> --}}
                    {{-- <div class="row mb-3">
                        <div class="col-md-4 mb-2">
                            <label for="id" class="form-label">ID No:</label>
                            <input type="text" class="form-control" id="id" name="id" value="B22AE007">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="level" class="form-label">Level:</label>
                            <input type="text" class="form-control" id="level" name="level" value="Form 5">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="aliabu@gmail.com">
                        </div>
                    </div> --}}

                    <hr>

                    <!-- Position Section -->
                    <h3 class="mb-3">Position <small class="text-muted">/ 10</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="president" value="President">
                                <label class="form-check-label" for="president">President (10)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="vicePresident" value="Vice President">
                                <label class="form-check-label" for="vicePresident">Vice President (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="secretary" value="Secretary">
                                <label class="form-check-label" for="secretary">Secretary (8)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="treasurer" value="Treasurer">
                                <label class="form-check-label" for="treasurer">Treasurer (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="viceSecretary" value="Vice Secretary">
                                <label class="form-check-label" for="viceSecretary">Vice Secretary (6)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="viceTreasurer" value="Vice Treasurer">
                                <label class="form-check-label" for="viceTreasurer">Vice Treasurer (6)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="ajk" value="AJK">
                                <label class="form-check-label" for="ajk">AJK (6)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="activeMember" value="Active Member">
                                <label class="form-check-label" for="activeMember">Active Member (4)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="position" id="ordinaryMember" value="Ordinary Member">
                                <label class="form-check-label" for="ordinaryMember">Ordinary Member (2)</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Engagement Level Section -->
                    <h3 class="mb-3">Engagement Level <small class="text-muted">/ 20</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <h4 class="h5">Engagement 1</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1International" value="I1">
                                <label class="form-check-label" for="eng1International">International (20)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1National" value="N1">
                                <label class="form-check-label" for="eng1National">National (17)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1Country" value="C1">
                                <label class="form-check-label" for="eng1Country">Country (14)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1District" value="D1">
                                <label class="form-check-label" for="eng1District">District/Zone (11)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng1School" value="S1">
                                <label class="form-check-label" for="eng1School">School/None (0)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="h5">Engagement 2</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2International" value="I2">
                                <label class="form-check-label" for="eng2International">International (15)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2National" value="N2">
                                <label class="form-check-label" for="eng2National">National (12)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2Country" value="C2">
                                <label class="form-check-label" for="eng2Country">Country (10)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2District" value="D2">
                                <label class="form-check-label" for="eng2District">District/Zone (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng2School" value="S2">
                                <label class="form-check-label" for="eng2School">School/None (0)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4 class="h5">Engagement 3</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3International" value="I3">
                                <label class="form-check-label" for="eng3International">International (10)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3National" value="N3">
                                <label class="form-check-label" for="eng3National">National (8)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3Country" value="C3">
                                <label class="form-check-label" for="eng3Country">Country (6)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3District" value="D3">
                                <label class="form-check-label" for="eng3District">District/Zone (4)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="engagement[]" id="eng3School" value="S3">
                                <label class="form-check-label" for="eng3School">School/None (0)</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Achievement Level Section -->
                    <h3 class="mb-3">Achievement Level <small class="text-muted">/ 20</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <h4 class="h5">Engagement</h4>
                            <p class="mb-0">International</p>
                            <p class="mb-0">National</p>
                            <p class="mb-0">Country</p>
                            <p class="mb-0">District / Zone</p>
                            <p class="mb-0">School</p>
                        </div>
                        <div class="col-md-3">
                            <h4 class="h5">Champion</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champInt" value="IC">
                                <label class="form-check-label" for="champInt">20</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champNat" value="NC">
                                <label class="form-check-label" for="champNat">17</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champCountry" value="CC">
                                <label class="form-check-label" for="champCountry">14</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champDist" value="DC">
                                <label class="form-check-label" for="champDist">11</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="champSchool" value="SC">
                                <label class="form-check-label" for="champSchool">8</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="h5">1st Runner Up</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp1Int" value="I1">
                                <label class="form-check-label" for="runnerUp1Int">19</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp1Nat" value="N1">
                                <label class="form-check-label" for="runnerUp1Nat">16</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp1Country" value="C1">
                                <label class="form-check-label" for="runnerUp1Country">13</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp1Dist" value="D1">
                                <label class="form-check-label" for="runnerUp1Dist">10</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp1School" value="S1">
                                <label class="form-check-label" for="runnerUp1School">7</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h4 class="h5">2nd Runner Up</h4>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp2Int" value="I2">
                                <label class="form-check-label" for="runnerUp2Int">18</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp2Nat" value="N2">
                                <label class="form-check-label" for="runnerUp2Nat">15</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp2Country" value="C2">
                                <label class="form-check-label" for="runnerUp2Country">12</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp2Dist" value="D2">
                                <label class="form-check-label" for="runnerUp2Dist">9</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="achievement[]" id="runnerUp2School" value="S2">
                                <label class="form-check-label" for="runnerUp2School">6</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Commitment Section -->
                    <h3 class="mb-3">Commitment <small class="text-muted">/ 10</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="leadership" value="C1">
                                <label class="form-check-label" for="leadership">Demonstrate leadership (3)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="manageActivities" value="C2">
                                <label class="form-check-label" for="manageActivities">Manage activities (3)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="helpTeachers" value="C3">
                                <label class="form-check-label" for="helpTeachers">Helping teachers/friends (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="provideEquipment" value="C4">
                                <label class="form-check-label" for="provideEquipment">Provide equipment (2)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="cleanArea" value="C5">
                                <label class="form-check-label" for="cleanArea">Clean the area (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="punctual" value="C6">
                                <label class="form-check-label" for="punctual">Punctual (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="showInterest" value="C7">
                                <label class="form-check-label" for="showInterest">Show interest (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="showSeriousness" value="C8">
                                <label class="form-check-label" for="showSeriousness">Show seriousness (2)</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="followInstructions" value="C9">
                                <label class="form-check-label" for="followInstructions">Follow Instructions (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="trying" value="C10">
                                <label class="form-check-label" for="trying">Trying (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="giveCooperation" value="C11">
                                <label class="form-check-label" for="giveCooperation">Give cooperation (2)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="commitment[]" id="observableValue" value="C12">
                                <label class="form-check-label" for="observableValue">Any observable pure value (2)</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- Contribution Service Section -->
                    <h3 class="mb-3">Contribution Service (School Level) <small class="text-muted">/ 10</small></h3>
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs1" value="CS1">
                            <label class="form-check-label" for="cs1">Students who are registered as program / tournament / competition / carnival / course participants (10)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs2" value="CS2">
                            <label class="form-check-label" for="cs2">Involves specific skills-judge/umpire, team coach/technical aspects (10)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs3" value="CS3">
                            <label class="form-check-label" for="cs3">Involvement of students involved in activities such as interlude performances (8)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="contribution[]" id="cs4" value="CS4">
                            <label class="form-check-label" for="cs4">Helping in terms of making unit activities successful such as participating in performances, cheerleading and related (5)</label>
                        </div>
                    </div>
                    <hr>
                    <!-- Attendance and Comment Section -->
                    <h3 class="mb-3">Attendance & Comment <small class="text-muted">/ 40</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-2">
                            <label for="attendance" class="form-label">Attendance:</label>
                            <input type="text" class="form-control" id="attendance" name="attendance" value="12">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="comment" class="form-label">Comment:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="1" placeholder="Enter your comment here"></textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-dark">Submit Assessment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <style>
        .form-check-input:checked {
            background-color: #343a40; /* Dark background color */
            border-color: #343a40; /* Dark border color */
        }
        
        .form-check-input:checked:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 0, 0, 0.25); /* Optional: focus shadow */
        }
    </style>
</x-layout>