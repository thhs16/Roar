 @extends('expert.layouts.master')

 @section('content')


        <section>
            <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Booked Consultations</p>
                            <h6 class="mb-0">{{$booked_apt_count}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Pending Consultations</p>
                            <h6 class="mb-0">{{$pending_apt_count}}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-pie fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Available Consultations</p>
                            <h6 class="mb-0">{{$avl_apt_count}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->
        </section>


@endsection
