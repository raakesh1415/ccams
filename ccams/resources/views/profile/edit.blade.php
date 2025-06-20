<x-layout>
    <!-- Taskbar Section -->
    <div class="taskbar">
    <div class="profile-header">
        <img src="{{ Auth::user()->profile_pic ? asset('storage/profiles/' . Auth::user()->profile_pic) : asset('images/profile.png') }}" class="profile-image" alt="Gambar Profil">
        <h2>{{ Auth::user()->username }}</h2>
        <span class="user-role">{{ Auth::user()->role }}</span>
    </div>  
</div>
    <!-- Edit Profile Container -->
    <div class="edit-profile-container">
        <!-- Edit Profile Form -->
        <form method="POST" action="{{ route('profile.edit') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
             <!-- Photo Upload Section -->
             <div class="form-group">
                <label for="profile_pic">Foto Profil</label>
                <input type="file" id="profile_pic" name="profile_pic" accept="image/*" class="form-control">
            </div>

            <!-- Display current profile photo if exists -->
            @if (Auth::user()->profile_pic)
                <div class="mt-3">
                    <p>Foto Semasa:</p>
                    <img src="{{ asset('storage/profiles/' . Auth::user()->profile_pic) }}" alt="Foto Profil Semasa" class="img-fluid" style="max-width: 200px;">
                </div>
            @else
                <p>Tiada foto dimuat naik lagi.</p>
            @endif

            <!-- User Information Section -->
            <div class="section">
                <h4>Maklumat Pengguna</h4>
                <div class="form-group">
                    <label for="username">Nama Pengguna</label>
                    <input type="text" id="username" name="username" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Alamat E-mel</label>
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                </div>
                <div class="form-group">
                    <label for="ic">No. KP</label>
                    <input type="number" id="ic" name="ic" value="{{ Auth::user()->ic }}" readonly>
                </div>
            </div>
            <!-- Contact Information Section -->
            <div class="section">
                <h4>Maklumat Hubungan</h4>
                <form id="contact-form">
                    <!-- Alamat -->
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" id="address" name="address" value="{{ Auth::user()->address }}" placeholder="Masukkan alamat anda" required>
                    </div>

                    <!-- Bandar -->
                    <div class="form-group">
                        <label for="city">Bandar</label>
                        <select id="city" name="city" class="form-control" required>
                            <option value="">Pilih bandar anda</option>
                            <option value="Kuala Lumpur" {{ Auth::user()->city == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                            <option value="George Town" {{ Auth::user()->city == 'George Town' ? 'selected' : '' }}>George Town</option>
                            <option value="Johor Bahru" {{ Auth::user()->city == 'Johor Bahru' ? 'selected' : '' }}>Johor Bahru</option>
                            <option value="Ipoh" {{ Auth::user()->city == 'Ipoh' ? 'selected' : '' }}>Ipoh</option>
                            <option value="Shah Alam" {{ Auth::user()->city == 'Shah Alam' ? 'selected' : '' }}>Shah Alam</option>
                            <option value="Kota Kinabalu" {{ Auth::user()->city == 'Kota Kinabalu' ? 'selected' : '' }}>Kota Kinabalu</option>
                            <option value="Kuching" {{ Auth::user()->city == 'Kuching' ? 'selected' : '' }}>Kuching</option>
                            <option value="Petaling Jaya" {{ Auth::user()->city == 'Petaling Jaya' ? 'selected' : '' }}>Petaling Jaya</option>
                            <option value="Seremban" {{ Auth::user()->city == 'Seremban' ? 'selected' : '' }}>Seremban</option>
                            <option value="Melaka" {{ Auth::user()->city == 'Melaka' ? 'selected' : '' }}>Melaka</option>
                            <option value="Alor Setar" {{ Auth::user()->city == 'Alor Setar' ? 'selected' : '' }}>Alor Setar</option>
                            <option value="Kuala Terengganu" {{ Auth::user()->city == 'Kuala Terengganu' ? 'selected' : '' }}>Kuala Terengganu</option>
                            <option value="Kuantan" {{ Auth::user()->city == 'Kuantan' ? 'selected' : '' }}>Kuantan</option>
                            <option value="Miri" {{ Auth::user()->city == 'Miri' ? 'selected' : '' }}>Miri</option>
                            <option value="Sandakan" {{ Auth::user()->city == 'Sandakan' ? 'selected' : '' }}>Sandakan</option>
                            <option value="Sibu" {{ Auth::user()->city == 'Sibu' ? 'selected' : '' }}>Sibu</option>
                            <option value="Iskandar Puteri" {{ Auth::user()->city == 'Iskandar Puteri' ? 'selected' : '' }}>Iskandar Puteri</option>
                            <option value="Putrajaya" {{ Auth::user()->city == 'Putrajaya' ? 'selected' : '' }}>Putrajaya</option>
                            <option value="Labuan" {{ Auth::user()->city == 'Labuan' ? 'selected' : '' }}>Labuan</option>
                        </select>
                    </div>

                    <!-- Negara -->
                    <div class="form-group">
                        <label for="country">Negara</label>
                        <input type="text" id="country" name="country" value="Malaysia" placeholder="Masukkan negara anda" readonly>
                    </div>

                    <!-- Poskod -->
                    <div class="form-group">
                        <label for="postal_code">Poskod</label>
                        <input type="text" id="postal_code" name="postal_code" value="{{ Auth::user()->postal_code }}" placeholder="Masukkan poskod anda" required>
                    </div>

                    <!-- Tentang Saya -->
                    <h4>Tentang Saya</h4>
                    <div class="form-group">
                        <textarea name="about_me" id="about_me" rows="4" placeholder="Terangkan tentang diri anda" required>{{ Auth::user()->about_me }}</textarea>
                    </div>

                    <!-- Save Button -->
                    <button type="submit" class="save-button">Simpan</button>
                </form>
            </div>


        <!-- Display success message if any -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <!-- Inline CSS for styling -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .taskbar {
            background-color: white; /* Dark background for the taskbar */
            padding: 15px;
            color: white;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid #b5003c;
        }

        .user-role {
            color: #ccc;
        }

        .edit-profile-container {
            width: 100%;
            padding: 20px;
            background-color: white; /* White background for the profile section */
            border-radius: 0;
            box-shadow: none;
        }

        .section {
            margin-bottom: 30px;
        }

        .section h4 {
            margin-bottom: 15px;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #333;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .save-button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 2px solid #b5003c;
        }

        .save-button:hover {
            background-color: #28a745;
        }

        .alert {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</x-layout>
