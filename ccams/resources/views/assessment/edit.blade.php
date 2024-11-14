<x-layout>
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('assessment.update', $assessment->assessment_id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->
                    <h2 class="text-center mb-4">Edit Assessment</h2>

                    <!-- Student Section -->
                    <div class="row mb-3">
                        <div class="col-md-4 mb-2">
                            <label for="user_id" class="form-label">Select Student:</label>
                            <select class="form-select" id="user_id" name="user_id" required>
                                <option value="">-- Select Student --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $assessment->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr>

                    <!-- Position Section -->
                    <h3 class="mb-3">Position <small class="text-muted">/ 10</small></h3>
                    <div class="row mb-4">
                        @foreach([10 => 'President', 8 => 'Vice President', 8 => 'Secretary', 8 => 'Treasurer', 6 => 'Vice Secretary', 6 => 'Vice Treasurer', 6 => 'AJK',  4 => 'Active Member', 2 => 'Ordinary Member'] as $value => $label)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="position" id="{{ strtolower(str_replace(' ', '', $label)) }}" value="{{ $value }}" {{ $assessment->position == $value ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ strtolower(str_replace(' ', '', $label)) }}">{{ $label }} ({{ $value }})</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>

                    <!-- Engagement Level Section -->
                    <h3 class="mb-3">Engagement Level <small class="text-muted">/ 20</small></h3>
                    <div class="row mb-4">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="col-md-4">
                                <h4 class="h5">Engagement {{ $i }}</h4>
                                @foreach([20 => 'International', 17 => 'National', 14 => 'Country', 11 => 'District/Zone', 0 => 'School/None'] as $value => $label)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="engagement[]" id="eng{{ $i }}{{ strtolower(str_replace(' ', '', $label)) }}" value="{{ $value }}" {{ is_array($assessment->engagement) && in_array($value, $assessment->engagement) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="eng{{ $i }}{{ strtolower(str_replace(' ', '', $label)) }}">{{ $label }} ({{ $value }})</label>
                                    </div>
                                @endforeach
                            </div>
                        @endfor
                    </div>

                    {{-- <!-- Achievement Level Section -->
                    <h3 class="mb-3">Achievement Level <small class="text-muted">/ 20</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <h4 class="h5">Engagement</h4>
                            @foreach(['International' => 20, 'National' => 17, 'Country' => 14, 'District/Zone' => 11, 'School' => 8] as $label => $value)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="achievement[]" id="champ{{ strtolower($label) }}" value="{{ $value }}" {{ is_array($assessment->achievement) && in_array($value, $assessment->achievement) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="champ{{ strtolower($label) }}">{{ $value }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <hr> --}}

                    {{-- <!-- Commitment Section -->
                    <h3 class="mb-3">Commitment <small class="text-muted">/ 10</small></h3>
                    <div class="row mb-4">
                        @foreach(['Demonstrate leadership' => 3, 'Manage activities' => 3, 'Helping teachers/friends' => 2, 'Provide equipment' => 2] as $label => $value)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="commitment[]" id="{{ strtolower(str_replace(' ', '', $label)) }}" value="{{ $value }}" {{ is_array($assessment->commitment) && in_array($value, $assessment->commitment) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="{{ strtolower(str_replace(' ', '', $label)) }}">{{ $label }} ({{ $value }})</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr> --}}

                    {{-- <!-- Contribution Service Section -->
                    <h3 class="mb-3">Contribution Service (School Level) <small class="text-muted">/ 10</small></h3>
                    <div class="mb-4">
                        @foreach(['Students who are registered as program participants' => 10, 'Involves specific skills' => 10, 'Involvement of students in activities' => 8, 'Helping in unit activities' => 5] as $label => $value)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="contribution[]" id="{{ strtolower(str_replace(' ', '', $label)) }}" value="{{ $value }}" {{ is_array($assessment->contribution) && in_array($value, $assessment->contribution) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ strtolower(str_replace(' ', '', $label)) }}">{{ $label }} ({{ $value }})</label>
                            </div>
                        @endforeach
                    </div>
                    <hr> --}}

                    <!-- Attendance and Comment Section -->
                    <h3 class="mb-3">Attendance & Comment <small class="text-muted">/ 40</small></h3>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-2">
                            <label for="attendance" class="form-label">Attendance:</label>
                            <input type="text" class="form-control" id="attendance" name="attendance" value="{{ $assessment->attendance }}">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="comment" class="form-label">Comment:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="1" placeholder="Enter your comment here">{{ $assessment->comment }}</textarea>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Update Assessment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>