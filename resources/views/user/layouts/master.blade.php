<!DOCTYPE html>
<pre>{{ json_encode(Vite::manifest(), JSON_PRETTY_PRINT) }}</pre>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Roar - Your English Speaking Buddy</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    {{-- Template for rating section --}}
    @vite('resources/user/css/custom.css')
    {{-- <link href="{{ asset('user/css/custom.css') }}" rel="stylesheet"> --}}

    {{-- Meet with Expert/Profile Card --}}
    <link href="{{ asset('user/css/expertsProfileCard.css') }}" rel="stylesheet">

    {{-- Carousel - Meet with Expert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="{{ asset('css/carouselMeetWithExperts.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Esteban&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    {{-- <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet"> --}}

    <!-- Main CSS File -->
    @vite('resources/user/css/main.css')
    {{-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> --}}

    <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('img/logo.png') }}" alt="">
                <h1 class="sitename">Roar</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('dashboard') }}#hero" class="active">Home</a></li>
                    <li><a href="{{ route('dashboard') }}#ourOffer">Our Offer</a></li>
                    <li><a href="{{ route('dashboard') }}#ourTutors">Our Tutors</a></li>
                    <li><a href="{{ route('dashboard') }}#about">About</a></li>
                    <li class="dropdown"><a href="{{ route('dashboard') }}#services"><span>Services</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            @foreach ($category as $category_item)
                                <li><a
                                        href="{{ route('serviceCategory', $category_item->id) }}">{{ $category_item->name }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </li>
                    <li><a href="{{ route('dashboard') }}#contact">Contact</a></li>
                    {{-- User Profile --}}
                    @if (auth()->user())
                        <li class="dropdown btn-getstarted">
                            <a href="#services">
                                <span><img class="rounded-circle"
                                        src="{{ auth()->user()->image ? asset('user/accImages/' . auth()->user()->image) : asset('admin/img/user.jpg') }}"
                                        alt="" style="width: 40px; height: 40px;"></span>
                                <i class="bi bi-chevron-down toggle-dropdown"></i>
                            </a>

                            <ul>
                                <li><a href="{{ route('userProfile') }}">My Profile</a></li>
                                <li class="dropdown"><a href="{{ route('userServices') }}"><span>My Services</span> <i
                                            class="bi bi-chevron-down toggle-dropdown text-dark"></i></a>
                                </li>
                                <li><a href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    @yield('content')

    <footer id="footer" class="footer position-relative light-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Roar</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ route('dashboard') }}#hero">Home</a></li>
                        <li><a href="{{ route('dashboard') }}#about">About us</a></li>
                        <li><a href="{{ route('dashboard') }}#services">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>

                        @foreach ($category as $category_item)
                            <li><a
                                    href="{{ route('serviceCategory', $category_item->id) }}">{{ $category_item->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                    <form action="forms/newsletter.php" method="post" class="php-email-form">
                        <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                                value="Subscribe"></div>
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                    </form>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Roar</strong><span>All Rights Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    {{-- Carousel JS/ Meet with the experts --}}
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/carouselMeetWithExperts.js') }}"></script>

    {{-- font-awesome all in one kit --}}
    <script src="https://kit.fontawesome.com/905758c01a.js" crossorigin="anonymous"></script>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    {{-- <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script> --}}

    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>

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
