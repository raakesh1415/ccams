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
                {{-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> --}}
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
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('login.index') }}">Logout</a></li>
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
                            Dashboard
                        </a>
                        <a class="nav-link {{ request()->is('club') ? 'active' : '' }}" href="/club">
                            <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                            Club
                        </a>
                        <!-- Dropdown for Registration -->
                        <!-- request()->is() checks are testing if the current URL matches any of url listed -->
                        <a class="nav-link collapsed {{ request()->is('registration') || request()->is('registration/viewRegister') ? 'active' : '' }}"
                            href="#" data-bs-toggle="collapse" data-bs-target="#registrationCollapse"
                            aria-expanded="false" aria-controls="registrationCollapse">
                            <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                            Registration
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse {{ request()->is('registration') || request()->is('registration/viewRegister') ? 'show' : '' }}"
                            id="registrationCollapse" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link {{ request()->is('registration/register') ? 'active' : '' }}"
                                    href="{{ route('registration.index') }}"><i class="fas fa-edit"></i>
                                    Club Registration</a>
                                <a class="nav-link {{ request()->is('registration/view') ? 'active' : '' }}"
                                    href="{{ route('registration.viewRegister') }}"><i class="fas fa-eye"></i>View
                                    Registration</a>
                            </nav>
                        </div>
                        <a class="nav-link {{ request()->is('activities') ? 'active' : '' }}" href="/activities">
                            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                            Activity
                        </a>
                        <a class="nav-link {{ request()->is('attendance') ? 'active' : '' }}" href="/attendance">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-check"></i></div>
                            Attendance
                        </a>
                        <a class="nav-link {{ request()->is('assessment') ? 'active' : '' }}" href="/assessment">
                            <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                            Assessment
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    {{-- <div class="header">
                            {{ $header }}
                        </div> --}}

                    <!-- Content Section -->
                    {{-- <div class="content"> --}}
                    {{ $slot }}
                    {{-- </div> --}}
                </div>

            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; CCAMS 2024</div>
                        {{-- <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div> --}}
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

    /* .sb-sidenav-menu .nav-link:hover {
    background-color: #E5E7EB;
    color: #000;
} */

    /* .sb-sidenav-menu .nav-link.active {
    background-color: #E5E7EB;
    color: #000;
    font-weight: bold;
} */

    /* .sb-sidenav-menu .nav-link.active .sb-nav-link-icon {
    background-color: #E5E7EB;
    color: #000;
    font-weight: bold;
} */
</style>
