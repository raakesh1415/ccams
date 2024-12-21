<x-layout>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h3>Summary Assessment Mark - {{ $assessment->club->club_name }}</h3>
            </div>
            <div class="card-body">
                <h4 class="card-title pb-3">Student Details</h4>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>IC No:</strong> {{ $user->ic }}</p> 
                        <p><strong>Year:</strong> 2024</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Address:</strong> {{ $user->address }}</p> 
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Class:</strong> {{ $user->classroom }}</p> 
                    </div>
                </div>

                <hr>

                <h4 class="card-title pb-3">Assessment Category</h4>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Position:</strong> {{ $assessment->position }} 
                                @switch($assessment->position)
                                        @case('President')
                                            (10)
                                            @break
                                        @case('Vice President')
                                            (8)
                                            @break
                                        @case('Secretary')
                                            (8)
                                            @break
                                        @case('Treasurer')
                                            (8)
                                            @break
                                        @case('Vice Secretary')
                                            (6)
                                            @break
                                        @case('Vice Treasurer')
                                            (6)
                                            @break
                                        @case('AJK')
                                            (6)
                                            @break
                                        @case('Active Member')
                                            (4)
                                            @break
                                        @case('Ordinary Member')
                                            (2)
                                            @break
                                        @default
                                            Unknown
                                    @endswitch
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Attendance:</strong> {{ $assessment->attendance }} / 12 ({{ round(($assessment->attendance / 12) * 40) }})</p>
                    </div>                    
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Level of Engagement:</strong></p>
                        <ul>
                            @foreach ($assessment->engagement as $engagement)
                                <li>
                                    @switch($engagement)
                                        @case('I1')
                                            International Level (20)
                                            @break
                                        @case('N1')
                                            National Level (17)
                                            @break
                                        @case('C1')
                                            Country Level (14)
                                            @break
                                        @case('D1')
                                            District/Zone Level (11)
                                            @break
                                        @case('S1')
                                            School/None Level (0)
                                            @break
                                        @case('I2')
                                            International Level (15)
                                            @break
                                        @case('N2')
                                            National Level (12)
                                            @break
                                        @case('C2')
                                            Country Level (10)
                                            @break
                                        @case('D2')
                                            District/Zone Level (8)
                                            @break
                                        @case('S2')
                                            School/None Level (0)
                                            @break
                                        @case('I3')
                                            International Level (10)
                                            @break
                                        @case('N3')
                                            National Level (8)
                                            @break
                                        @case('C3')
                                            Country Level (6)
                                            @break
                                        @case('D3')
                                            District/Zone Level (4)
                                            @break
                                        @case('S3')
                                            School/None Level (0)
                                            @break
                                        @default
                                            Unknown
                                    @endswitch
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Level of Achievement:</strong></p>
                        <ul>
                            @foreach ($assessment->achievement as $achievement)
                                <li>
                                    @switch($achievement)
                                        @case('IC')
                                            Champion - International Level (20)
                                            @break
                                        @case('NC')
                                            Champion - National Level (17)
                                            @break
                                        @case('CC')
                                            Champion - Country Level (14)
                                            @break
                                        @case('DC')
                                            Champion - District/Zone Level (11)
                                            @break
                                        @case('SC')
                                            Champion - School/None Level (0)
                                            @break
                                        @case('I1')
                                            1st Runner Up - International Level (15)
                                            @break
                                        @case('N1')
                                            1st Runner Up - National Level  (12)
                                            @break
                                        @case('C1')
                                            1st Runner Up - Country Level (10)
                                            @break
                                        @case('D1')
                                            1st Runner Up - District/Zone Level (8)
                                            @break
                                        @case('S1')
                                            1st Runner Up - School/None Level (0)
                                            @break
                                        @case('I2')
                                            2nd Runner Up - International Level (10)
                                            @break
                                        @case('N2')
                                            2nd Runner Up - National Level (8)
                                            @break
                                        @case('C2')
                                            2nd Runner Up - Country Level (6)
                                            @break
                                        @case('D2')
                                            2nd Runner Up - District/Zone Level (4)
                                            @break
                                        @case('S2')
                                            2nd Runner Up - School/None Level (0)
                                            @break
                                        @default
                                            Unknown
                                    @endswitch
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Commitment:</strong></p>
                        <ul class="row">
                            @foreach ($assessment->commitment as $commitment)
                                <div class="col-md-6">
                                    <li>
                                        @switch($commitment)
                                            @case('C1')
                                                Demonstrate leadership (3)
                                                @break
                                            @case('C2')
                                                Manage activities (3)
                                                @break
                                            @case('C3')
                                                Helping teachers/friends (2)
                                                @break
                                            @case('C4')
                                                Provide equipment (2)
                                                @break
                                            @case('C5')
                                                Clean the area (2)
                                                @break
                                            @case('C6')
                                                Punctual (2)
                                                @break
                                            @case('C7')
                                                Show interest (2)
                                                @break
                                            @case('C8')
                                                Show seriousness (2)
                                                @break
                                            @case('C9')
                                                Follow Instructions (2)
                                                @break
                                            @case('C10')
                                                Trying (2)
                                                @break
                                            @case('C11')
                                                Give cooperation (2)
                                                @break
                                            @case('C12')
                                                Any observable pure value (2)
                                                @break
                                            @default
                                                Unknown
                                        @endswitch
                                    </li>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Contribution Service (School Level):</strong></p>
                        <ul>
                            @foreach ($assessment->contribution as $contribution)
                                
                                    <li>
                                        @switch($contribution)
                                            @case('CS1')
                                                Students who are registered as program / tournament / competition / carnival / course participants (10)
                                                @break
                                            @case('CS2')
                                                Involves specific skills-judge / umpire, team coach / technical aspects (10)
                                                @break
                                            @case('CS3')
                                                Involvement of students involved in activities such as interlude performances (8)
                                                @break
                                            @case('CS4')
                                                Helping in terms of making unit activities successful such as participating in performances, cheerleading and related (5)
                                                @break
                                            @default
                                                Unknown
                                        @endswitch
                                    </li>
                                
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Comment:</strong> {{ $assessment->comment }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Total Marks:</strong> {{ $assessment->total_mark }}%</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
 