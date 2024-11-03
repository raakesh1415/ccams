<!-- clubs/index.blade.php -->
<x-layout>
    <x-slot name="header">
        <h2>Club Registration</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($category->image_path)
                        <img src="{{ asset($category->image_path) }}" class="card-img-top" alt="{{ $category->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        <a href="{{ route('clubs.category', $category) }}" class="btn btn-primary">See More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
