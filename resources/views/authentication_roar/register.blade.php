@extends('user.layouts.master')

@section('content')
    <div class="main">
        <section>
            <div class="container mt-5">

                <div class="row p-0 m-0">
                    <div class="d-flex shadow-lg rounded-5 p-0">
                        <div class="mt-5 col-lg-6 pb-5">

                            <h1 class="my-5 text-center col-8 offset-2">Create An Account</h1>

                            <form action="{{ url('register') }}" method="post" class="col-8 offset-2" data-aos="fade-up"
                                data-aos-delay="400">
                                @csrf

                                <div class="row gy-4">

                                    <div class="col-md-12">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" placeholder="Your Name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 ">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Your Email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" value="{{ old('password') }}" placeholder="Password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 ">
                                        <input type="password"
                                            class="form-control @error('confirmPassword') is-invalid @enderror"
                                            name="confirmPassword" value="{{ old('confirmPassword') }}"
                                            placeholder="Confirm Password">
                                        @error('confirmPassword')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <input type="text" name="phone" class="form-control"
                                            placeholder="Phone (optional)">
                                    </div>

                                    <div class="col-md-12">
                                        <input type="text" name="address" class="form-control"
                                            placeholder="Address (optional)">
                                    </div>


                                    <div class="col-md-12">
                                        <button type="submit" class="col-12 btn btn-primary">Submit</button>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="button" class="col-12 btn btn-close-white border-dark">Register with
                                            Google <i class="fa-brands fa-google"></i></button>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <small class="text-muted">Already Registered? <a
                                                href="{{ route('login') }}">Login</a></small>
                                    </div>


                                </div>
                            </form>
                        </div>
                        <div class=" col-lg-6">
                            <img src="{{ asset('img/authImg/a_girl_sitting.jpg') }}" class=" img-fluid rounded-end-5"
                                alt="">
                        </div>
                    </div>
                </div>

            </div>


        </section>
    </div>
@endsection
