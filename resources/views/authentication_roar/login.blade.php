@extends('user.layouts.master')

@section('content')
<div class="main">
    <section >
            <div class="container mt-5">

                <div class="row p-0 m-0">
                    <div class="d-flex shadow-lg rounded-5 p-0">
                        <div class="mt-5 col-lg-6" >
                            <h1 class="my-5 text-center col-8 offset-2">Welcome Back</h1>

                            <form action="{{ url('loginRoar') }}" method="post" class="col-8 offset-2" data-aos="fade-up" data-aos-delay="400">
                            @csrf
                            <div class="row gy-4">

                              <div class="col-md-12 ">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email">
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                              </div>

                              <div class="col-md-12 ">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                                @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                              </div>

                              <div class=" d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label text-muted" for="flexCheckDefault">
                                      Remember me
                                    </label>
                                  </div>
                                <a href="">Forgot Password?</a>
                              </div>

                             <div class="col-md-12">
                                <button type="submit" class="col-12 btn btn-primary">Submit</button>
                             </div>

                             <div class="col-md-12">
                                <button type="button" class="col-12 btn btn-close-white border-dark">Login with Google <i class="fa-brands fa-google"></i></button>
                             </div>

                             <div class="col-md-12 text-center">
                                <small class="text-muted">Don't have an account? <a href="{{ route('register')}}">Register</a></small>
                             </div>


                            </div>
                          </form>
                        </div>
                        <div class=" col-lg-6" >
                            <img src="{{asset('img/authImg/loginImg.jpg')}}" class=" img-fluid rounded-end-5" alt="">
                        </div>
                    </div>
                </div>

            </div>


    </section>
</div>
@endsection
