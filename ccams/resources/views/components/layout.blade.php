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
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-light">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-4" href="/dashboard">
                <img src="{{ asset('images/logo-name.png') }}" alt="CCAMS Logo" class="logo-img" width="130px">
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars sb-sidenav-light"></i></button>
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
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw sb-sidenav-light .sb-sidenav-menu .nav-link "></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Profile</a></li>
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
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
                            <a class="nav-link" href="/dashbaord">
                                <div class="sb-nav-link-icon"><i class="fas fa-th-large"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="/club">
                                <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                                Club
                            </a>
                            <a class="nav-link" href="/registration">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Registration
                            </a>
                            <a class="nav-link" href="/activity">
                                <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                                Activity
                            </a>
                            <a class="nav-link" href="/attendance">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-check"></i></div>
                                Attendance
                            </a>
                            <a class="nav-link" href="/assessment">
                                <div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                                Assessment
                            </a>
                        </div>
                    </div>
                    {{-- <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div> --}}
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-3">
                        {{-- <div class="header">
                            {{ $header }}
                        </div> --}}
            
                        <!-- Content Section -->
                        <div class="content">
                            {{ $slot }}
                        </div>
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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="{{ asset('js/scripts.js') }}"></script>
        </div>
    </body>
</html>



