<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="icon" href="{{ asset('images/logo-trans.png') }}" type="image/x-icon">
    <title>CCAMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-light">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-4" href="/dashboard">
            <img src="{{ asset('images/logo-name.png') }}" alt="CCAMS Logo" class="logo-img" width="130px">
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars sb-sidenav-light"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw sb-sidenav-light"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Menu</div>
                        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                            <div class="sb-nav-link-icon"><i class="fas fa-th-large"></i></div>
                            Papan Pemuka
                        </a>

                        @if (Auth::user()->role === 'teacher')
                            <a class="nav-link {{ request()->is('club') ? 'active' : '' }}" href="/club">
                                <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                                Kelab
                            </a>
                        @endif

                        <!-- Dropdown for Registration -->
                        @if (Auth::user()->role === 'student' && 'teacher')
                            <a class="nav-link collapsed {{ request()->is('registration') || request()->is('registration/viewRegister') ? 'active' : '' }}"
                                href="#" data-bs-toggle="collapse" data-bs-target="#registrationCollapse"
                                aria-expanded="false" aria-controls="registrationCollapse">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Pendaftaran
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse {{ request()->is('registration') || request()->is('registration/viewRegister') ? 'show' : '' }}"
                                id="registrationCollapse" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link {{ request()->is('registration/register') ? 'active' : '' }}"
                                        href="{{ route('registration.index') }}"><i class="fas fa-edit"></i>
                                        Kelab Pendaftaran</a>
                                    <a class="nav-link {{ request()->is('registration/view') ? 'active' : '' }}"
                                        href="{{ route('registration.viewRegister') }}"><i
                                            class="fas fa-eye"></i>Melihat
                                        Pendaftaran</a>
                                </nav>
                            </div>
                        @endif

                        @if (Auth::user()->role === 'teacher')
                            <a class="nav-link {{ request()->is('activities') ? 'active' : '' }}" href="/activities">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                                Aktiviti
                            </a>
                        @endif

                        @if (Auth::user()->role === 'teacher')
                            <a class="nav-link {{ request()->is('attendance/teacher') ? 'active' : '' }}" href="/attendance/teacher">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-check"></i></div>
                                Kehadiran (Guru)
                            </a>
                        @endif

                        @if (Auth::user()->role === 'student')
                            <a class="nav-link {{ request()->is('attendance/student') ? 'active' : '' }}" href="/attendance/student">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-check"></i></div>
                                Kehadiran (Pelajar)
                            </a>
                        @endif

                        @if (Auth::user()->role === 'teacher')
                            <a class="nav-link {{ request()->is('assessment') ? 'active' : '' }}" href="/assessment">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Penilaian
                            </a>
                        @endif
                        
                        @if (Auth::user()->role === 'student')
                            <a class="nav-link {{ request()->is('assessment') ? 'active' : '' }}" href="/assessment">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Penilaian
                            </a>
                        @endif
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 py-4">
                    {{ $slot }}
                    {{-- </div> --}}
                </div>

            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; CCAMS 2024</div>
                    </div>
                </div>
            </footer>
        </div>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
            crossorigin="anonymous"></script>
        <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
        {{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    </div>
    </div>
</body>

</html>

<style>
    .sb-sidenav-menu .nav .nav-link:hover {
        color: #000;
        background-color: #E5E7EB;
    }

    .sb-sidenav-light .sb-sidenav-menu .nav-link.active {
        background-color: #E5E7EB;
        color: #000;
        font-weight: bold;
    }

    .sb-sidenav-light .sb-sidenav-menu .nav-link.active .sb-nav-link-icon {
        color: #000;
    }
</style>
