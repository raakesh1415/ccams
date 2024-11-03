<!-- registration/kelab.blade.php -->

<x-layout>
    <x-slot name="header">
        <h2>Club Registration</h2>
        <div class="user-profile">
            <img src="{{ asset('path-to-profile-picture.jpg') }}" alt="User Profile">
        </div>
    </x-slot>

    <div class="club-container">
        <h2>Kelab / Persatuan</h2>
        <!-- Club Listings -->
        <div class="club-listings">
            <!-- Repeated Club Item -->
            @for ($i = 0; $i < 3; $i++)
                <div class="club-item">
                    <div class="club-content">
                        <div class="club-image">
                            <img src="{{ asset('https://th.bing.com/th/id/OIP.OvaQCe3uNS_9-nGDXY-D7AHaFy?rs=1&pid=ImgDetMain') }}"
                                alt="Rukun Negara">
                        </div>
                        <div class="club-details">
                            <h3>Rukun Negara</h3>
                            <div class="member-count">
                                <i class="fas fa-users"></i>
                                <span>200 Members</span>
                            </div>
                            <h4>Description</h4>
                            <p>Kelab Rukun Negara (KRN) is a Malaysian club that promotes the principles of the Rukun
                                Negara to encourage unity, patriotism, and national values through educational programs
                                and community activities.</p>
                        </div>
                        <div class="register-button">
                            <button class="register-btn">Register</button>
                        </div>
                    </div>
                </div>
            @endfor
            <div class="return-button">
                <a href="{{ route('registration.index') }}" class="return-btn">Return </a>
            </div>
        </div>
    </div>

    <style>
        .club-container {
            text-align: left;
            margin-top: 20px;
        }

        .club-listings {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .club-item {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .club-content {
            display: flex;
            gap: 20px;
        }

        .club-image {
            width: 120px;
            height: 120px;
            flex-shrink: 0;
        }

        .club-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .club-details {
            flex-grow: 1;
        }

        .member-count {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #666;
            margin: 10px 0;
        }

        .register-button {
            display: flex;
            align-items: flex-start;
        }

        .register-btn {
            background: #000;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .return-button {
            display: flex;
            flex-direction: row;
        }

        .return-btn {
            background: #000;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration-line: none;
        }

        h3 {
            margin: 0;
            font-size: 1.25rem;
        }

        h4 {
            margin: 10px 0 5px;
            font-size: 1rem;
        }

        p {
            margin: 0;
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
            text-align: justify;
        }

        @media (max-width: 768px) {
            .club-content {
                flex-direction: column;
            }

            .club-image {
                width: 100%;
                height: 200px;
            }

            .register-button {
                margin-top: 20px;
            }
        }
    </style>
</x-layout>
