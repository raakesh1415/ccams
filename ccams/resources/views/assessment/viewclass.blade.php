<x-layout>
    <div class="container">
        <h1 class="text-center mb-4">{{ $student->name }} Assessment Details</h1>
        {{-- <div class="card mb-4">
            <div class="card-header text-center">
                <h4>Student Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $student->name }}</p>
                        <p><strong>IC No:</strong> {{ $student->ic }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Address:</strong> {{ $student->address }}</p>
                        <p><strong>Email:</strong> {{ $student->email }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Year:</strong> 2024</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Class:</strong> {{ $student->classroom }}</p>
                    </div>
                </div>
            </div>
        </div> --}}


        @if ($permainanAssessment)
            {{-- <div class="col-xl-4"> --}}
            <div class="card mb-4">
                <div class="card-header text-center">
                    {{-- <i class="fas fa-chart-bar me-1"></i> --}}
                    <h4>Permainan - {{ $student->permainanClub }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Position:</strong> {{ $permainanAssessment->position }}
                                @switch($permainanAssessment->position)
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
                            <p><strong>Attendance:</strong> {{ $permainanAssessment->attendance }} / 12
                                ({{ round(($permainanAssessment->attendance / 12) * 40) }})</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Level of Engagement:</strong></p>
                            <ul>
                                @foreach ($permainanAssessment->engagement as $engagement)
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
                                @foreach ($permainanAssessment->achievement as $achievement)
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
                                                1st Runner Up - National Level (12)
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
                                @foreach ($permainanAssessment->commitment as $commitment)
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
                                @foreach ($permainanAssessment->contribution as $contribution)
                                    <li>
                                        @switch($contribution)
                                            @case('CS1')
                                                Students who are registered as program / tournament / competition / carnival /
                                                course participants (10)
                                            @break

                                            @case('CS2')
                                                Involves specific skills-judge / umpire, team coach / technical aspects (10)
                                            @break

                                            @case('CS3')
                                                Involvement of students involved in activities such as interlude performances
                                                (8)
                                            @break

                                            @case('CS4')
                                                Helping in terms of making unit activities successful such as participating in
                                                performances, cheerleading and related (5)
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
                            <p><strong>Comment:</strong> {{ $permainanAssessment->comment }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Total Marks:</strong> {{ $permainanAssessment->total_mark }}%</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        @endif

        
        @if ($persatuanAssessment)
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4>Persatuan - {{ $student->persatuanClub }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Position:</strong> {{ $persatuanAssessment->position }}
                                @switch($persatuanAssessment->position)
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
                            <p><strong>Attendance:</strong> {{ $persatuanAssessment->attendance }} / 12
                                ({{ round(($persatuanAssessment->attendance / 12) * 40) }})</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Level of Engagement:</strong></p>
                            <ul>
                                @foreach ($persatuanAssessment->engagement as $engagement)
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
                                @foreach ($persatuanAssessment->achievement as $achievement)
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
                                                1st Runner Up - National Level (12)
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
                                @foreach ($persatuanAssessment->commitment as $commitment)
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
                                @foreach ($persatuanAssessment->contribution as $contribution)
                                    <li>
                                        @switch($contribution)
                                            @case('CS1')
                                                Students who are registered as program / tournament / competition / carnival /
                                                course participants (10)
                                            @break

                                            @case('CS2')
                                                Involves specific skills-judge / umpire, team coach / technical aspects (10)
                                            @break

                                            @case('CS3')
                                                Involvement of students involved in activities such as interlude performances
                                                (8)
                                            @break

                                            @case('CS4')
                                                Helping in terms of making unit activities successful such as participating in
                                                performances, cheerleading and related (5)
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
                            <p><strong>Comment:</strong> {{ $persatuanAssessment->comment }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Total Marks:</strong> {{ $persatuanAssessment->total_mark }}%</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if ($uniformAssessment)
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h4>Unit Beruniform - {{ $student->uniformClub }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Position:</strong> {{ $uniformAssessment->position }}
                                @switch($uniformAssessment->position)
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
                            <p><strong>Attendance:</strong> {{ $uniformAssessment->attendance }} / 12
                                ({{ round(($uniformAssessment->attendance / 12) * 40) }})</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Level of Engagement:</strong></p>
                            <ul>
                                @foreach ($uniformAssessment->engagement as $engagement)
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
                                @foreach ($uniformAssessment->achievement as $achievement)
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
                                                1st Runner Up - National Level (12)
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
                                @foreach ($uniformAssessment->commitment as $commitment)
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
                                @foreach ($uniformAssessment->contribution as $contribution)
                                    <li>
                                        @switch($contribution)
                                            @case('CS1')
                                                Students who are registered as program / tournament / competition / carnival /
                                                course participants (10)
                                            @break

                                            @case('CS2')
                                                Involves specific skills-judge / umpire, team coach / technical aspects (10)
                                            @break

                                            @case('CS3')
                                                Involvement of students involved in activities such as interlude performances
                                                (8)
                                            @break

                                            @case('CS4')
                                                Helping in terms of making unit activities successful such as participating in
                                                performances, cheerleading and related (5)
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
                            <p><strong>Comment:</strong> {{ $uniformAssessment->comment }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Total Marks:</strong> {{ $uniformAssessment->total_mark }}%</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

</x-layout>
