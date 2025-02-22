<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Roar Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('admin/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>Roar Admin</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">

                        <img class="rounded-circle me-lg-2"
                            src="{{ auth()->user()->image ? asset('admin/adminAndExpertProfileImg/' . auth()->user()->image) : asset('admin/img/user.jpg') }}"
                            alt="" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        <span>{{ auth()->user()->role }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('adminDashboard') }}" class="nav-item nav-link active"><i
                            class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{ route('aptToCheck') }}" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Pending Apt</a>
                    <a href="{{ route('createService') }}" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Create A Service </a>
                    <a href="{{ route('serviceList') }}" class="nav-item nav-link"><i
                            class="fa fa-tachometer-alt me-2"></i>Service's List </a>
                    <a href="{{ route('createCategory') }}" class="nav-item nav-link"><i
                            class="fa fa-th me-2"></i>Create A Category</a>
                    <a href="{{ route('categoryList') }}" class="nav-item nav-link"><i
                            class="fa fa-th me-2"></i>Category's List</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Speaking Experts</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('createExperts') }}" class="dropdown-item">Adding Expert's Info</a>
                            <a href="{{ route('expertList') }}" class="dropdown-item">Experts' List</a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Account Creation </a>
                        <div class="dropdown-menu bg-transparent border-0">
                            @if (auth()->user()->role == 'superAdmin')
                                <a href="{{ route('createAdmin') }}" class="dropdown-item">Create an Admin & Expert
                                    Acc</a>
                            @endif
                            <a href="{{ route('adminList') }}" class="dropdown-item">Admin List</a>
                            <a href="{{ route('userList') }}" class="dropdown-item">User List</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2"
                                src="{{ auth()->user()->image ? asset('admin/adminAndExpertProfileImg/' . auth()->user()->image) : asset('admin/img/user.jpg') }}"
                                alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ auth()->user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('adminProfile') }} " class="dropdown-item">My Profile</a>
                            {{-- <a href="#" class="dropdown-item">Settings</a> --}}
                            <a href="{{ route('logout') }}" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            @yield('content')


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->




        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    {{-- All in one font awesome link --}}
    <script src="https://kit.fontawesome.com/905758c01a.js" crossorigin="anonymous"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('admin/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('admin/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascrpt -->
    <script src="{{ asset('admin/js/main.js') }}"></script>

    {{-- Temporary session message --}}
    <script>
        setTimeout(function() {
            let msg = document.getElementById('sessionMessage');
            if (msg) {
                msg.remove();
            }
        }, 2000);
    </script>

    {{-- Image Preview | product --}}
    <script>
        function loadFile(event) {

            var reader = new FileReader();

            reader.onload = function() {
                var output = document.getElementById('output');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>
