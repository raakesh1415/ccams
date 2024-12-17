<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CCAMS - Sign Up</title>
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
                                        <small id="passwordFeedback" class="form-text text-warning"></small>
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
                                        <input type="text" id="ic" name="ic" class="form-control"
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
                                            <option value="1 AL ABQARIY"></option>
                                            <option value="2 AL ABQARIY"></option>
                                            <option value="3 AL ABQARIY"></option>
                                            <option value="1 ASTER"></option>
                                            <option value="2 ASTER"></option>
                                            <option value="3 ASTER"></option>
                                            <option value="1 AZALEA"></option>
                                            <option value="2 AZALEA"></option>
                                            <option value="3 AZALEA"></option>
                                            <option value="1 BEGONIA"></option>
                                            <option value="2 BEGONIA"></option>
                                            <option value="3 BEGONIA"></option>
                                            <option value="1 CAMELIA"></option>
                                            <option value="2 CAMELIA"></option>
                                            <option value="3 CAMELIA"></option>
                                            <option value="1 CARNATION"></option>
                                            <option value="2 CARNATION"></option>
                                            <option value="3 CARNATION"></option>
                                            <option value="1 DAISY"></option>
                                            <option value="2 DAISY"></option>
                                            <option value="3 DAISY"></option>
                                            <option value="1 FREESIA"></option>
                                            <option value="2 FREESIA"></option>
                                            <option value="3 FREESIA"></option>
                                            <option value="1 HIBISCUS"></option>
                                            <option value="2 HIBISCUS"></option>
                                            <option value="3 HIBISCUS"></option>
                                            <option value="1 HELICONIA"></option>
                                            <option value="2 HELICONIA"></option>
                                            <option value="3 HELICONIA"></option>
                                            <option value="1 IXORA"></option>
                                            <option value="2 IXORA"></option>
                                            <option value="3 IXORA"></option>
                                            <option value="1 JASMINE"></option>
                                            <option value="2 JASMINE"></option>
                                            <option value="3 JASMINE"></option>
                                            <option value="1 LAVENDER"></option>
                                            <option value="2 LAVENDER"></option>
                                            <option value="3 LAVENDER"></option>
                                            <option value="1 PETUNIA"></option>
                                            <option value="2 PETUNIA"></option>
                                            <option value="3 PETUNIA"></option>
                                            <option value="1 ORCHID"></option>
                                            <option value="2 ORCHID"></option>
                                            <option value="3 ORCHID"></option>
                                            <option value="4 AL FATEH"></option>
                                            <option value="5 AL FATEH"></option>
                                            <option value="4 ARISTOTLE"></option>
                                            <option value="5 ARISTOTLE"></option>
                                            <option value="4 IBNU SINA"></option>
                                            <option value="5 IBNU SINA"></option>
                                            <option value="4 PASCAL"></option>
                                            <option value="5 PASCAL"></option>
                                            <option value="4 IBNU BATTUTAH"></option>
                                            <option value="5 IBNU BATTUTAH"></option>
                                            <option value="4 AL KHAWARIZMI"></option>
                                            <option value="5 AL KHAWARIZMI"></option>
                                            <option value="4 AL BIRUNI"></option>
                                            <option value="5 AL BIRUNI"></option>
                                            <option value="4 ZAABA"></option>
                                            <option value="5 ZAABA"></option>
                                            <option value="4 AL AWWAM"></option>
                                            <option value="5 AL AWWAM"></option>
                                            <option value="4 AL FARABI"></option>
                                            <option value="5 AL FARABI"></option>
                                            <option value="4 VAN GOGH"></option>
                                            <option value="5 VAN GOGH"></option>
                                            <option value="4 PICASSO"></option>
                                            <option value="5 PICASSO"></option>
                                            <option value="4 FARADAY"></option>
                                            <option value="5 FARADAY"></option>
                                            <option value="4 DA VINCI"></option>
                                            <option value="5 DA VINCI"></option>
                                            <option value="4 AL FIHRI"></option>
                                            <option value="5 AL FIHRI"></option>
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
                if (password.length < 8) {
                    $('#passwordFeedback').text('Password must be at least 8 characters.');
                } else {
                    $('#passwordFeedback').text('');
                }
            });

            $('#ic').on('blur', function() {
                const ic = $(this).val();
                if (ic && ic.length !== 12) {
                    $('#icFeedback').text('IC number must be exactly 12 characters.');
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
