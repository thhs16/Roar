@extends('user.layouts.master')

@section('content')
    <section class="pricing section mt-5">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $category_name }}</h2>
        </div><!-- End Section Title -->


        <div class="container">
            <div class="d-flex justify-content-end">

                <form action="{{ route('serviceCategory', $categoryId) }}" method="get" class="d-none d-md-flex ms-4">
                    <input name="searchKey" class="form-control border-1" type="search" placeholder="Search">
                </form>
            </div>

            <div class="row gy-4">

                @foreach ($service_category as $service_item)
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pricing-item featured">
                            {{-- <p class="popular">{{$service_item->category_id}}</p> --}}
                            <h3 class="">{{ $service_item->title }}</h3>
                            <div class="text-center"><img src="{{ asset('serviceImages/' . $service_item->image) }}"
                                class="mt-3 mb-4 img-fluid rounded"
                                style="width: 200px; height: 200px; object-fit: cover;"
                                alt=""></div>
                            <p class="description">{{ $truncated = Str::limit($service_item->description, 100, ' ...') }}
                            </p>
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
                            {{-- <p class="text-center small">No credit card required</p> --}}

                        </div>
                    </div><!-- End Pricing Item -->
                @endforeach




            </div>


        </div>
        {{-- pagination --}}
        <span class=" d-flex justify-content-center">{{ $service_category->links() }}</span>
    </section><!-- /Pricing Section -->
@endsection
