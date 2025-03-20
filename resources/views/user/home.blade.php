@extends('user.layouts.master')

@section('content')
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="hero-bg">
                <img src="{{ asset('user/img/hero-bg-light.webp') }}" alt="">
            </div>
            <div class="container text-center">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <h1 data-aos="fade-up">Welcome to <span>Roar</span></h1>
                    <p class="mt-3" data-aos="fade-up" data-aos-delay="100"><i class="fst-italic esteban-regular">You do not need to be silent. You just have to
                        roar.</i><br></p>

                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ route('userProfile') }}" class="btn-get-started">My Profile</a>
                        <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                            class="glightbox btn-watch-video d-flex align-items-center"><i
                                class="bi bi-play-circle"></i><span>What is Roar ?</span></a>
                    </div>

                    <img src="{{ asset('user/img/main_photo.png') }}" class="img-fluid hero-img" alt=""
                        data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Statistics -->
        <section id="featured-services" class="featured-services section light-background">

            <div class="container">

                <div class="row gy-4">

                    <!-- End Service Item -->
                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                            <div>
                                <h2>{{ $expert_count }}</h2>
                                <h4 class="title"><a href="#" class="stretched-link">Speaking Experts</a></h4>

                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    {{-- Sta --}}
                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                            <div>
                                <h2>{{ $student_count }}</h2>
                                <h4 class="title">Satisfied Students</h4>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item d-flex">
                            <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
                            <div>
                                <h2>{{ $service_count }}</h2>
                                <h4 class="title"><a href="#" class="stretched-link">Provided Services</a></h4>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Featured Services Section -->

        <!-- Our offer | Preview of services -->
        <section id="ourOffer" class="pricing section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>What we offer</h2>
                {{-- <p>Let us provide you with the best English Speaking Practice Experience.</p> --}}
            </div><!-- End Section Title -->

            <div class="container">


                <div class="row gy-4">
                    @foreach ($service as $service_item)
                        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="pricing-item featured">
                                <p class="popular">{{ $service_item->name }}</p>
                                <h3 class="mt-3">{{ $service_item->title }}</h3>
                                <div class="text-center"><img src="{{ asset('serviceImages/' . $service_item->image) }}"
                                    class="mt-3 mb-4 img-fluid rounded"
                                    style="width: 200px; height: 200px; object-fit: cover;"
                                    alt=""></div>
                                <p class="description">
                                    {{ $truncated = Str::limit($service_item->description, 100, ' ...') }}</p>
                                <ul>
                                    <li class="row"><label class="col-4 ">Duration </label><span class="col">: 15
                                            mins</span></li>
                                    <li class="row"><label class="col-4 ">Tutor </label><span class="col">
                                            @if ($service_item->type == 'free')
                                            : Random Speaking Expert @else: Preferred Speaking Expert
                                            @endif
                                        </span></li>
                                    <li class="row"><label class="col-4 ">Type </label><span class="col">:
                                            {{ $service_item->type }}</span></li>
                                </ul>
                                <h4><sup>mmk</sup>{{ $service_item->fees }}<span> / session</span></h4>
                                <a href="{{ route('serviceUserDetail', $service_item->id) }}" class="cta-btn">See More</a>

                            </div>
                        </div><!-- End Pricing Item -->
                    @endforeach




                </div>
                {{--  All services Button --}}
                <a href="{{ route('allServicesPg') }}" class=" d-flex justify-content-center m-2 ">
                    <div class="btn btn-outline-warning">View All Services</div>
                </a>
            </div>
        </section><!-- /Pricing Section -->

        {{-- Meet with our experts - session --}}
        <section id="ourTutors">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Meet with our Experts</h2>
            </div><!-- End Section Title -->
            @include('user.layouts.caroselMeetWithExperts')
        </section>

        <!-- About Section -->
        <section id="about" class="about section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <p class="who-we-are">Who We Are</p>
                        <h3>Unleashing Potential with Creative Strategy</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Duis aute irure dolor in reprehenderit in voluptate
                                    velit.</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda
                                    mastiro dolore eu fugiat nulla pariatur.</span></li>
                        </ul>

                    </div>

                    <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                <img src="{{ asset('user/img/about-company-1.jpg') }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="row gy-4">
                                    <div class="col-lg-12">
                                        <img src="{{ asset('user/img/about-company-2.jpg') }}" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="col-lg-12">
                                        <img src="{{ asset('user/img/about-company-3.jpg') }}" class="img-fluid"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- /About Section -->


        <!-- Services Section -->
        <section id="services" class="services section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Services</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row g-5">

                    @foreach ($category as $category_item)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item item-cyan position-relative">
                                <i class="bi bi-activity icon"></i>
                                <div>
                                    <h3>{{ $category_item->name }}</h3>
                                    <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus
                                        dolores iure perferendis tempore et consequatur.</p>
                                    <a href="{{ route('serviceCategory', $category_item->id) }}"
                                        class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                                    {{-- Display courses under the category --}}
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach



                </div>

            </div>

        </section>
        <!-- /Services Section -->


        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section light-background">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
                    <div class="swiper-wrapper">

                        @foreach ($ratingComment as $ratingComment_item)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    {{-- star --}}
                                    <div class="stars">

                                        @for ($i = 0; $i < $ratingComment_item->rating; $i++)
                                            <i class="bi bi-star-fill"></i>
                                        @endfor

                                        @for ($i = $ratingComment_item->rating; $i < 5; $i++)
                                            <i class="bi bi-star"></i>
                                        @endfor
                                    </div>
                                    <p>
                                        {{ $ratingComment_item->comment }}
                                    </p>
                                    <div class="profile mt-auto">
                                        {{-- img --}}
                                        <img src="{{ $ratingComment_item->user_image ? asset('user/accImages/' . $ratingComment_item->user_image) : asset('admin/img/user.jpg') }}"
                                            class="testimonial-img img-fluid rounded-circle"
                                            style="width: 100px; height: 100px; object-fit: cover;" alt="User Image">

                                        <h3>{{ $ratingComment_item->user_name }}</h3>
                                        <h4>In {{ $ratingComment_item->service_title }}</h4>
                                    </div>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <p>A108 Adam Street, New York, NY 535022</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-lg-3 col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center"
                            data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@example.com</p>
                        </div>
                    </div><!-- End Info Item -->

                </div>

                <div class="row gy-4 mt-1">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                            frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div><!-- End Google Maps -->

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="400">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>
@endsection
