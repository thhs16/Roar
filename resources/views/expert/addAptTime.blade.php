@extends('expert.layouts.master')

@section('content')

@if(session('Success Message'))
    <h6 id="sessionMessage" class="alert alert-success">
        {{ session('Success Message') }}
    </h6>
@endif

    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary">Add Appointment</h3>
                        </a>
                    </div>

                    <form action="{{ route('createApt') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-6">
                                <div class="form-floating mb-3">
                                    <input name="aptTime" value="{{ old('aptTime')}}"  type="datetime-local" class="form-control @error('aptTime') is-invalid @enderror" id="floatingText" placeholder="jhondoe">
                                    <label for="floatingText">Appointment Date</label>
                                        @error('aptTime')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                </div>




                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Submit</button>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
@endsection

{{-- Apt --}}
{{--  Time --}}
{{--  Type --}}
{{--  Apt Tutor --}}


