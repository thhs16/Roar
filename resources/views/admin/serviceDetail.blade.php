@extends('admin.layouts.master')

@section('content')
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary">Service Detail</h3>
                        </a>
                    </div>

                    <form action="{{ route('createServiceDB') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-4">
                                <img src="{{ asset('serviceImages/'.$service->image) }}" class=" img-thumbnail" alt="">

                            </div>

                            <div class="col-8">
                                <div class="form-floating mb-3">
                                    <h2>{{$service->title}}</h2>
                                </div>

                                <div class="form-floating mb-3">
                                    <p>Type : {{$service->type}}</p>
                                </div>

                                <div class="form-floating mb-3">
                                    <p>Category : {{$service->category_name}}</p>
                                </div>

                                <div class="input-group mb-3">
                                    <p>Fees : {{$service->fees}}</p>
                                </div>

                                <div class="form-floating mb-3">
                                    <p>{{$service->description}}</p>
                                </div>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
@endsection
