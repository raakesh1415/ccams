<x-layout>
    <x-slot name="header">
        <h2>{{ $activity->activity_name }}</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile" class="rounded-circle" style="width: 50px; height: 50px;">
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="row">
            <!-- Left: Poster -->
            <div class="col-md-6">
                <img src="{{ $activity->poster ? asset('storage/' . $activity->poster) : asset('images/default-poster.jpg') }}" 
                     class="img-fluid rounded shadow-sm" 
                     alt="Activity Poster">
            </div>

            <!-- Right: Details -->
            <div class="col-md-6">
                <h3 class="mb-3">{{ $activity->activity_name }}</h3>
                <p><strong>Location:</strong> {{ $activity->location }}</p>
                <p><strong>Date and Time:</strong> {{ \Carbon\Carbon::parse($activity->date_time)->format('d M Y, h:i A') }}</p>
                <p><strong>Category:</strong> {{ $activity->category }}</p>
                <p><strong>Duration:</strong> {{ $activity->duration }}</p>
                <p><strong>Participants:</strong> {{ $activity->participants ?? 'Open to all' }}</p>
                <p><strong>Description:</strong></p>
                <p>{{ $activity->description }}</p>
                
                <!-- Go Back Button -->
                <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Go Back</a>
            </div>
        </div>
    </div>
</x-layout>
