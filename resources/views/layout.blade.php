<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>

    {{-- Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    {{-- Top Navbar --}}
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="{{ url('/') }}">ERMS</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
    <!-- Logout Form -->
    <!-- Logout Form -->
<form action="{{ route('admin.logout') }}" method="GET" style="display: inline;">
    <button type="submit" class="dropdown-item" style="border: none; background: none; padding: 0;">
        Logout
    </button>
</form>
</li>
                </ul>
            </li>
        </ul>
    </nav>

    {{-- Sidebar and Page Content --}}
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="{{ url('/') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <!-- Department -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Department
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ url('depart') }}">View All</a>
                                <a class="nav-link" href="{{ url('depart/create') }}">Add New</a>
                            </nav>
                        </div>
                        <!-- End Department -->
                         <!-- Employee -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#empMenu" aria-expanded="false">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Employee
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="empMenu" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ url('employee') }}">View All</a>
                                <a class="nav-link" href="{{ url('employee/create') }}">Add New</a>
                            </nav>
                        </div>
                        <!-- End Employee -->
                    </div>
                </div>

                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Employee Record Management System
                </div>
            </nav>
        </div>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('content')  <!-- This section will render dynamic content based on the current page -->
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>

    <!-- Initialize the Bootstrap collapse functionality -->
    <script>
        var myCollapsePages = document.getElementById('collapsePages')
        var bsCollapsePages = new bootstrap.Collapse(myCollapsePages, {
            toggle: false
        })

        var myCollapseLayouts = document.getElementById('collapseLayouts')
        var bsCollapseLayouts = new bootstrap.Collapse(myCollapseLayouts, {
            toggle: false
        })
    </script>
</body>
</html>
