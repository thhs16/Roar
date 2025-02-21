@extends('user.layouts.master')

@section('content')

@if(session('Success Message'))
    <h6 id="sessionMessage" class="alert alert-success">
        {{ session('Success Message') }}
    </h6>
@endif

<section class="mt-5">
    <div class="row m-5">
        <div class="">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Admin List<span class="badge badge-warning"></span></h6>
                <table class="table table-hov@extends('admin.layouts.master')

                @section('content')
                    <!-- Sign Up Start -->
                    <div class="container-fluid">
                        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                            <div class="col-12">
                                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3 mx-5">
                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                        <a href="index.html" class="">
                                            <h3 class="text-primary">Appointment Payment</h3>
                                        </a>
                                    </div>
                                    <div class="row ">
                                        <div class="col-5 shadow-sm p-3">
                                            <div>Appointment Date : {{ \Carbon\Carbon::parse($appointment->aptTime)->format('d M Y ( l )') }}</div>
                                            <div>Appointment Time : {{ \Carbon\Carbon::parse($appointment->aptTime)->format('h:i A ') }}</div>
                                            <hr>
                                            <div>Expert Name : {{$appointment->expert_name}}</div>
                                            <div>Service Name : Consultation</div>
                                            <div>Duration : 30mins</div>
                                            <hr>
                                            <div>Consultaion Fees : 10000 mmk</div>
                                            <hr>

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5>Payment Info</h5>
                                                    <p>Name: Sarah Johnson</p>
                                                    <p>Account: PayPal - sarah.johnson@example.com</p>
                                                    <hr>
                                                    <p>Name: Alex Smith</p>
                                                    <p>Account: Venmo - @AlexSmith89</p>
                                                    <hr>
                                                    <p>Name: John Doe</p>
                                                    <p>Account: Chase Bank - 1234 5678 9101</p>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-7" >
                                            <form action="{{ route('aptPaymentComplete') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="aptId" value="{{$appointment->id}}">

                                                <div class="row">
                                                    <div class="col-8">
                                                        <div class="form-floating mb-3">
                                                            <input name="studentName" value="{{ old('studentName')}}"  type="text" class="form-control @error('studentName') is-invalid @enderror" id="floatingText" placeholder="jhondoe">
                                                            <label for="floatingText">Student Name</label>
                                                                @error('studentName')
                                                                    <small class="text-danger">{{$message}}</small>
                                                                @enderror
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input name="studentEmail" value="{{ old('studentEmail')}}"  type="email" class="form-control @error('studentEmail') is-invalid @enderror" id="floatingText" placeholder="jhondoe">
                                                            <label for="floatingText">Student Email</label>
                                                                @error('studentEmail')
                                                                    <small class="text-danger">{{$message}}</small>
                                                                @enderror
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input name="studentPhone" value="{{ old('studentPhone')}}"  type="text" class="form-control @error('studentPhone') is-invalid @enderror" id="floatingText" placeholder="jhondoe">
                                                            <label for="floatingText">Student Phone (optional)</label>
                                                                @error('studentPhone')
                                                                    <small class="text-danger">{{$message}}</small>
                                                                @enderror
                                                        </div>

                                                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Submit</button>
                                                    </div>

                                                    <div class="mb-3 col-4">
                                                        <input class="form-control @error('screenshot') is-invalid @enderror" name="screenshot" value="{{ old('screenshot')}}" type="file" id="formFile" onchange="loadFile(event)" placeholder="Upload Your Screen Shot">
                                                        <img src="" class=" img-thumbnail mt-1" alt="" id="output">
                                                            @error('screenshot')
                                                                <small class="text-danger">{{$message}}</small>
                                                            @enderror
                                                    </div>



                                                </div>
                                            </form>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sign Up End -->
                @endsection
                er">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Features</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php $i = 0; @endphp

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
