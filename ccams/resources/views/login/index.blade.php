<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CCAMS - Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-image: url('images/Background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }

        .login-container {
            background-color: rgba(0, 0, 0, 0.5);
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.9);
            max-width: 500px;
            width: 100%;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            background-color: #f0b429;
            border-color: #f0b429;
            color: white;
            padding: 12px;
            font-size: 1.1rem;
        }

        .btn-custom:hover {
            background-color: #f0a500;
            border-color: #f0a500;
        }

        .logo {
            max-width: 300px;
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-4">
                    <img src="images/logo-name.png" alt="Logo" class="img-fluid logo">
                </div>
                <div class="col-12 col-md-6 col-lg-5 d-flex justify-content-center">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title text-center mb-4">LOG MASUK</h2>

                            <!-- Laravel Blade Templating for Messages -->
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('login.submit') }}" method="POST" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <input type="email" id="email" name="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="E-MEL" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        placeholder="KATA LALUAN" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-custom btn-lg">LOGMASUK</button>
                                </div>
                            </form><br>

                            <div class="text-center">
                                <a href="{{ route('login.reset') }}" class="text-decoration-none me-3">Lupa
                                    Kata laluan?</a>
                                <a href="{{ route('login.signin') }}" class="text-decoration-none">Buka akaun?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
