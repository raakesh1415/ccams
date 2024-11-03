<!-- clubs/category.blade.php -->
<x-layout>
    <x-slot name="header">
        <h2>Club Registration</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="container">
        <h1>{{ $category->name }}</h1>

        @foreach ($category->subcategories as $subcategory)
            <div class="mb-5">
                <h2 class="mb-4">{{ $subcategory->name }}</h2>
                <div class="row">
                    @foreach ($subcategory->clubs as $club)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @if ($club->image_path)
                                    <img src="{{ asset($club->image_path) }}" class="card-img-top"
                                        alt="{{ $club->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $club->name }}</h5>
                                    <p class="text-muted">{{ $club->registrations->count() }}/{{ $club->member_limit }}
                                        Members</p>
                                    <p class="card-text">{{ $club->description }}</p>

                                    <form action="{{ route('clubs.register', $club) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary"
                                            {{ $club->registrations->count() >= $club->member_limit ? 'disabled' : '' }}>
                                            Register
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
