<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CCAMS - Sign Up</title>
    <link rel="icon" href="{{ asset('images/logo-trans.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/images/Background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        .signup-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }

        .signup-card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 900px;
        }

        .btn-custom {
            background-color: #f0b429;
            border-color: #f0b429;
            color: white;
        }

        .btn-custom:hover {
            background-color: #f0a500;
            border-color: #f0a500;
        }

        .logo {
            max-width: 250px;
        }
    </style>
</head>

<body>
    <div class="signup-overlay">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-12 text-center">
                    <img src="/images/logo-name.png" alt="Logo" class="img-fluid logo mb-4">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 col-xl-10 d-flex justify-content-center">
                    <div class="signup-card">
                        <h2 class="text-center mb-4">PENDAFTARAN AKAUN</h2>

                        <form id="signupForm" method="POST" action="{{ route('signin.store') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">NAMA:</label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            required>
                                        <small id="nameFeedback" class="form-text text-danger"></small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">E-MEL:</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            required>
                                        <small id="emailFeedback" class="form-text text-danger"></small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">KATA LALUAN</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            required>
                                        <small id="passwordFeedback" class="form-text text-danger"></small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">PENGESAHAN KATA
                                            LALUAN:</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation"
                                            class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="ic" class="form-label">NOMBOR KAD PENGENALAN:</label>
                                        <input type="number" id="ic" name="ic" class="form-control"
                                            required>
                                        <small id="icFeedback" class="form-text text-danger"></small>
                                    </div>

                                    <div class="mb-3">
                                        <label for="role" class="form-label">ANDA ADALAH:</label>
                                        <select id="role" name="role" class="form-select" required>
                                            <option value="student">PELAJAR</option>
                                            <option value="teacher">GURU</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="classroom" class="form-label">PILIH KELAS ANDA:</label>
                                        <input list="classrooms" id="classroom" name="classroom" class="form-control"
                                            placeholder="CARI KELAS ANDA" required>
                                        <datalist id="classrooms">
                                        <option value="1 Al Abqartiy">1 Al Abqartiy</option>
                                        <option value="2 Al Abqariy">2 Al Abqariy</option>
                                        <option value="3 Al Abqariy">3 Al Abqariy</option>
                                        <option value="1 Aster">1 Aster</option>
                                        <option value="2 Aster">2 Aster</option>
                                        <option value="3 Aster">3 Aster</option>
                                        <option value="1 Azalea">1 Azalea</option>
                                        <option value="2 Azalea">2 Azalea</option>
                                        <option value="3 Azalea">3 Azalea</option>
                                        <option value="1 Begonia">1 Begonia</option>
                                        <option value="2 Begonia">2 Begonia</option>
                                        <option value="3 Begonia">3 Begonia</option>
                                        <option value="1 Camelia">1 Camelia</option>
                                        <option value="2 Camelia">2 Camelia</option>
                                        <option value="3 Camelia">3 Camelia</option>
                                        <option value="1 Carnation">1 Carnation</option>
                                        <option value="2 Carnation">2 Carnation</option>
                                        <option value="3 Carnation">3 Carnation</option>
                                        <option value="1 Daisy">1 Daisy</option>
                                        <option value="2 Daisy">2 Daisy</option>
                                        <option value="3 Daisy">3 Daisy</option>
                                        <option value="1 Freesia">1 Freesia</option>
                                        <option value="2 Freesia">2 Freesia</option>
                                        <option value="3 Freesia">3 Freesia</option>
                                        <option value="1 Hibiscus">1 Hibiscus</option>
                                        <option value="2 Hibiscus">2 Hibiscus</option>
                                        <option value="3 Hibiscus">3 Hibiscus</option>
                                        <option value="1 Heliconia">1 Heliconia</option>
                                        <option value="2 Heliconia">2 Heliconia</option>
                                        <option value="3 Heliconia">3 Heliconia</option>
                                        <option value="1 Ixora">1 Ixora</option>
                                        <option value="2 Ixora">2 Ixora</option>
                                        <option value="3 Ixora">3 Ixora</option>
                                        <option value="1 Jasmine">1 Jasmine</option>
                                        <option value="2 Jasmine">2 Jasmine</option>
                                        <option value="3 Jasmine">3 Jasmine</option>
                                        <option value="1 Lavender">1 Lavender</option>
                                        <option value="2 Lavender">2 Lavender</option>
                                        <option value="3 Lavender">3 Lavender</option>
                                        <option value="1 Petunia">1 Petunia</option>
                                        <option value="2 Petunia">2 Petunia</option>
                                        <option value="3 Petunia">3 Petunia</option>
                                        <option value="1 Orchid">1 Orchid</option>
                                        <option value="2 Orchid">2 Orchid</option>
                                        <option value="3 Orchid">3 Orchid</option>
                                        <option value="4 Al Fateh">4 Al Fateh</option>
                                        <option value="5 Al Fateh">5 Al Fateh</option>
                                        <option value="4 Aristotle">4 Aristotle</option>
                                        <option value="5 Aristotle">5 Aristotle</option>
                                        <option value="4 Ibnu Sina">4 Ibnu Sina</option>
                                        <option value="5 Ibnu Sina">5 Ibnu Sina</option>
                                        <option value="4 Pascal">4 Pascal</option>
                                        <option value="5 Pascal">5 Pascal</option>
                                        <option value="4 Ibnu Battutah">4 Ibnu Battutah</option>
                                        <option value="5 Ibnu Battutah">5 Ibnu Battutah</option>
                                        <option value="4 Al Khawarizmi">4 Al Khawarizmi</option>
                                        <option value="5 Al Khawarizmi">5 Al Khawarizmi</option>
                                        <option value="4 Al Biruni">4 Al Biruni</option>
                                        <option value="5 Al Biruni">5 Al Biruni</option>
                                        <option value="4 Zaaba">4 Zaaba</option>
                                        <option value="5 Zaaba">5 Zaaba</option>
                                        <option value="4 Al Awwam">4 Al Awwam</option>
                                        <option value="5 Al Awwam">5 Al Awwam</option>
                                        <option value="4 Al Farabi">4 Al Farabi</option>
                                        <option value="5 Al Farabi">5 Al Farabi</option>
                                        <option value="4 Van Gogh">4 Van Gogh</option>
                                        <option value="5 Van Gogh">5 Van Gogh</option>
                                        <option value="4 Picasso">4 Picasso</option>
                                        <option value="5 Picasso">5 Picasso</option>
                                        <option value="4 Faraday">4 Faraday</option>
                                        <option value="5 Faraday">5 Faraday</option>
                                        <option value="4 Da Vinci">4 Da Vinci</option>
                                        <option value="5 Da Vinci">5 Da Vinci</option>
                                        <option value="4 Al Fihri">4 Al Fihri</option>
                                        <option value="5 Al Fihri">5 Al Fihri</option>
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom btn-lg">MENDAFTAR</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="/" class="text-decoration-none">Sudah mempunyai akaun?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Existing jQuery validation scripts (unchanged from the original)
            $('#email').on('blur', function() {
                const email = $(this).val();
                if (email) {
                    $.ajax({
                        url: "{{ route('check.email') }}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            email
                        },
                        success: function(response) {
                            if (response.exists) {
                                $('#emailFeedback').text('Email already exists.');
                            } else {
                                $('#emailFeedback').text('');
                            }
                        }
                    });
                }
            });

            $('#name').on('blur', function() {
                const name = $(this).val();
                if (name) {
                    $.ajax({
                        url: "{{ route('check.name') }}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            name
                        },
                        success: function(response) {
                            if (response.exists) {
                                $('#nameFeedback').text('Name already exists.');
                            } else {
                                $('#nameFeedback').text('');
                            }
                        }
                    });
                }
            });

            $('#password').on('input', function() {
                const password = $(this).val();
                let feedback = '';

                if (password.length < 8) {
                    feedback = 'Password must be at least 8 characters.';
                } else if (!/[A-Z]/.test(password)) {
                    feedback = 'Password must include at least one uppercase letter.';
                } else if (!/[a-z]/.test(password)) {
                    feedback = 'Password must include at least one lowercase letter.';
                } else if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                    feedback = 'Password must include at least one special character.';
                } else {
                    feedback = '';
                }

                $('#passwordFeedback').text(feedback);
            });


            $('#ic').on('blur', function() {
                const ic = $(this).val();
                if (ic && ic.length !== 12) {
                    $('#icFeedback').text('IC number must be exactly 12 numbers.');
                } else {
                    if (ic) {
                        $.ajax({
                            url: "{{ route('check.ic') }}",
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                ic
                            },
                            success: function(response) {
                                if (response.exists) {
                                    $('#icFeedback').text('IC already exists.');
                                } else {
                                    $('#icFeedback').text('');
                                }
                            }
                        });
                    }
                }
            });

            $('#signupForm').on('submit', function(e) {
                const password = $('#password').val();
                const passwordConfirmation = $('#password_confirmation').val();

                if (password !== passwordConfirmation) {
                    e.preventDefault();
                    alert('Passwords do not match! Please re-enter.');
                }
            });
        });
    </script>
</body>

</html>
