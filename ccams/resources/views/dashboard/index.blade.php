<x-layout>
    <div class="container mt-5">
        <div class="row">
            <!-- Left Section: Registered Clubs -->
            <div class="col-md-8">
                <h1 class="text-left"><b><i>WELCOME, USER!</i></b></h1>
                <div class="row">
                    @forelse ($registrations as $registration)
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-sm h-100">
                                <!-- Club Image -->
                                <img src="{{ asset('storage/' . $registration->club->club_pic) }}" alt="Club Image"
                                    class="card-img-top" style="height: 150px; object-fit: cover;">

                                <div class="card-body">
                                    <!-- Club Name -->
                                    <h4 class="card-title text-center">{{ $registration->club->club_name }}</h4>

                                    <!-- Club Type Badge -->
                                    <div class="text-center mb-3">
                                        <span class="bg-success text-white p-2 rounded">Registered
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- If No Clubs Registered -->
                        <div class="col-12">
                            <div class="alert alert-danger text-center">
                                You have not registered for any clubs yet.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Right Section: Calendar -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-dark text-white">
                        <h5>Calendar</h5>
                    </div>
                    <div class="card-body p-0">
                        <!-- Calendar Placeholder -->
                        <div id="calendar" style="height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include FullCalendar Script -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            // Initialize FullCalendar
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    // Sample Events
                    {
                        title: 'Club Meeting',
                        start: '2024-12-15',
                        end: '2024-12-16'
                    },
                    {
                        title: 'Activity Submission Deadline',
                        start: '2024-12-18'
                    }
                ]
            });

            calendar.render(); // Render the calendar
        });
    </script>
</x-layout>
