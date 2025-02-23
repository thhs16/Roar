@extends('user.layouts.master')

@section('content')

    @if (session('Success Message'))
        <h6 id="sessionMessage" class="alert alert-success">
            {{ session('Success Message') }}
        </h6>
    @endif

    @if (session('Alert Message'))
        <h6 id="sessionMessage" class="alert alert-warning">
            {{ session('Alert Message') }}
        </h6>
    @endif

    <Section class="mt-5">
        <main class="main">

            <!-- Page Title -->
            <div class="page-title" data-aos="fade">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">Service Detail</h1>
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

                            <div class="help-box d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-headset help-icon"></i>
                                <h4>Have a Question?</h4>
                                <p class="d-flex align-items-center mt-2 mb-0"><i class="bi bi-telephone me-2"></i> <span>+1
                                        5589 55488 55</span></p>
                                <p class="d-flex align-items-center mt-1 mb-0"><i class="bi bi-envelope me-2"></i> <a
                                        href="mailto:contact@example.com">contact@example.com</a></p>
                            </div>

                        </div>

                        <div class="col-lg-8 ps-lg-5" data-aos="fade-up" data-aos-delay="200">
                            <img src="{{ asset('serviceImages/' . $service_detail->image) }}" alt=""
                                class="img-fluid services-img">
                            <h3>{{ $service_detail->name }}</h3>
                            <p>
                                {{ $service_detail->description }}
                            </p>
                            <p>
                                Service Type : {{ $service_detail->type }}
                            </p>
                            <p>
                                Service Fees : {{ $service_detail->fees }}
                            </p>
                            <ul>
                                {{-- <li><i class="bi bi-check-circle"></i> <span>Trained Student :
                                        {{ $service_detail->trained_student }}</span></li> --}}
                                <li><i class="bi bi-check-circle"></i> <span>Ratings : {{ $overall_rating }}</span></li>
                                <li>
                                    @for ($i = 0; $i < $overall_rating; $i++)
                                        <i class="fa-solid fa-star text-warning"></i>
                                    @endfor

                                    @for ($i = $overall_rating; $i < 5; $i++)
                                        <i class="fa-regular fa-star text-warning"></i>
                                    @endfor
                                </li>

                            </ul>

                            {{-- Rating Start --}}
                            <form action="{{ route('serviceUserRatingComment') }}" method="POST">
                                @csrf
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <div class="text-white">Rate this service</div>
                                </button>

                                <!-- Modal -->

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Rating</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                @if ($user_rating)
                                                    Your Rating
                                                @endif
                                                <br><br>
                                                <div class="card card-body mb-2">
                                                    <div class="rating-css">
                                                        <div class="star-icon">

                                                            @if ($user_rating)
                                                                @php
                                                                    $user_rating = number_format($user_rating->rating);
                                                                @endphp

                                                                @for ($i = 0; $i < $user_rating; $i++)
                                                                    <input type="radio" value="{{ $i + 1 }}"
                                                                        name="serviceRating" id="rating{{ $i + 1 }}"
                                                                        checked>
                                                                    <label for="rating{{ $i + 1 }}"
                                                                        class="fa fa-star"></label>
                                                                @endfor

                                                                @for ($i = $user_rating; $i < 5; $i++)
                                                                    <input type="radio" value="{{ $i + 1 }}"
                                                                        name="serviceRating"
                                                                        id="rating{{ $i + 1 }}">
                                                                    <label for="rating{{ $i + 1 }}"
                                                                        class="fa fa-star"></label>
                                                                @endfor
                                                            @else
                                                                <input type="radio" value="1" name="serviceRating"
                                                                    id="rating1" checked>
                                                                <label for="rating1" class="fa fa-star"></label>
                                                                <input type="radio" value="2" name="serviceRating"
                                                                    id="rating2">
                                                                <label for="rating2" class="fa fa-star"></label>
                                                                <input type="radio" value="3" name="serviceRating"
                                                                    id="rating3">
                                                                <label for="rating3" class="fa fa-star"></label>
                                                                <input type="radio" value="4" name="serviceRating"
                                                                    id="rating4">
                                                                <label for="rating4" class="fa fa-star"></label>
                                                                <input type="radio" value="5" name="serviceRating"
                                                                    id="rating5">
                                                                <label for="rating5" class="fa fa-star"></label>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="serviceId"
                                                    value="{{ $service_detail->id }}">
                                                <input type="hidden" name="userId" value="{{ auth()->user()->id }}">


                                                <textarea name="serviceUserComment" class=" form-control" placeholder="Your Comment" cols="30" rows="10">@if ($user_comment){{ $user_comment->comment }}@endif
                                                </textarea>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    <div class="text-white">Close</div>
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <div class="text-white">Save Changes</div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                        {{-- Rating End --}}

                    </div>

                </div>

                </div>

            </section><!-- /Service Details Section -->

        </main>
    </Section>

@endsection
