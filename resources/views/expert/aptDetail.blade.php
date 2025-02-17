@extends('user.layouts.master')

@section('content')

@if(session('Success Message'))
    <h6 id="sessionMessage" class="alert alert-success">
        {{ session('Success Message') }}
    </h6>
@endif

<Section class="mt-5">
    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade">
          <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Take An Appointment</h1>
            <nav class="breadcrumbs">
              <ol>
                <li><a href="index.html">Home</a></li>
                <li class="current">Service Details</li>
              </ol>
            </nav>
          </div>
        </div><!-- End Page Title -->

        <!-- Service Details Section -->
        <section id="service-details" class="service-details section">

          <div class="container">

            <div class="row gy-5">

              <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

                <div class="service-box">
                  <h4>Get To Know Me</h4>
                  <div class="services-list">
                    <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Facebook Account</span></a>
                    <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Instagram Account</span></a>
                    <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Twitter Account</span></a>
                    <a href="#"><i class="bi bi-arrow-right-circle"></i><span>Linkedin Account</span></a>
                  </div>
                </div><!-- End Services List -->

                <div class="service-box">
                  <h4>Addition</h4>
                  <div class="download-catalog">
                    <a href="#"><i class="bi bi-filetype-pdf"></i><span>Expert's Consultation Preview</span></a>
                  </div>
                </div><!-- End Services List -->

                <div class="help-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-headset help-icon"></i>
                  <h4>Have a Question?</h4>
                  <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+1 5589 55488 55</span></p>
                  <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a href="mailto:contact@example.com">contact@example.com</a></p>
                </div>

              </div>

              <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
                <img src="{{ asset('admin/adminAndExpertProfileImg/'.$expert->image) }}" alt="" class="img-fluid services-img">
                <h3>{{ $expert->name }}</h3>
                <p>
                    {{ $expert->about }}
                </p>
                <ul>
                    <li><i class="bi bi-check-circle"></i> <span>Ratings : </span></li>
                  <li><i class="bi bi-check-circle"></i> <span>Trained Student : {{ $expert->trained_student }}</span></li>
                  <li><div class="btn btn-primary">Rate this Expert</div></li>

                </ul>

                <div class="row mt-5">

                    {{-- Morning Schedule --}}
                    <div class="col-5 m-3 p-3 rounded-3 shadow-lg">
                        <h3><i class="fa fa-user"></i> Morning Schedule</h3>
                        <hr>
                        @foreach ($apt_detail_morning as $apt_detail_morning_item)
                            {{$apt_detail_morning_item->id}}
                            <a href="{{ route('takeApt', $apt_detail_morning_item->id)}}" class="btn btn-success m-1">{{ \Carbon\Carbon::parse($apt_detail_morning_item->aptTime)->format('h:i A - d M Y ( l )') }}</a>
                        @endforeach

                    </div>

                    {{-- Noon Schedule --}}
                    <div class="col-5 offset-1 m-3 p-3 rounded-3 shadow-lg">
                        <h3><i class="fa fa-user"></i> Noon Schedule</h3>
                        <hr>
                        @foreach ($apt_detail_noon as $apt_detail_noon_item)
                        {{$apt_detail_noon_item->id}}
                        <a href="{{ route('takeApt', $apt_detail_noon_item->id)}}" class="btn btn-success m-1">{{ \Carbon\Carbon::parse($apt_detail_noon_item->aptTime)->format('h:i A - d M Y ( l )') }}</a>
                        @endforeach
                    </div>

                </div>

                <div class="row mt-5">
                    {{-- Night Schedule --}}
                    <div class="col-5 m-3 p-3 rounded-3 shadow-lg">
                        <h3><i class="fa fa-user"></i> Night Schedule</h3>
                        <hr>
                        @foreach ($apt_detail_night as $apt_detail_night_item)
                        {{$apt_detail_night_item->id}}
                        <a href="{{ route('takeApt', $apt_detail_night_item->id)}}" class="btn btn-success m-1">{{ \Carbon\Carbon::parse($apt_detail_night_item->aptTime)->format('h:i A - d M Y ( l )') }}</a>

                        @endforeach
                    </div>
                </div>

              </div>

            </div>

          </div>

        </section><!-- /Service Details Section -->

    </main>
</Section>

@endsection

