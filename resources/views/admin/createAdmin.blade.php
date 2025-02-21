@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary">Admin and Expert Accounts Creation</h3>
                        </a>
                    </div>

                    <form action="{{ route('createAdminDB') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-4">

                                <input class="form-control @error('image') is-invalid @enderror" name="image"
                                    type="file" id="formFile" onchange="loadFile(event)">
                                <img src="" class="img-thumbnail mt-1" alt="" id="output">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-8">

                                <div class="form-floating mb-3">
                                    <input name="name" value="{{ old('name') }}" type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="floatingText"
                                        placeholder="Full Name">
                                    <label for="floatingText">Full Name</label>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input name="email" value="{{ old('email') }}" type="email"
                                        class="form-control @error('email') is-invalid @enderror" id="floatingEmail"
                                        placeholder="Email">
                                    <label for="floatingEmail">Email</label>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <select name="role" class="form-select @error('role') is-invalid @enderror"
                                        id="floatingSelect">
                                        <option value="" selected>Select Role...</option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="expert" {{ old('role') == 'expert' ? 'selected' : '' }}>Expert
                                        </option>
                                    </select>
                                    <label for="floatingSelect">Role</label>
                                    @error('role')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-floating mb-3">
                                    <input name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" id="floatingPassword"
                                        placeholder="Password">
                                    <label for="floatingPassword">Password</label>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" name="confirmPassword"
                                        class="form-control @error('confirmPassword') is-invalid @enderror"
                                        id="floatingConfirmPassword" placeholder="Confirm Password">
                                    <label for="floatingConfirmPassword">Confirm Password</label>
                                    @error('confirmPassword')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>



                                <div class="form-floating mb-3">
                                    <input name="phone" value="{{ old('phone') }}" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" id="floatingPhone"
                                        placeholder="Phone Number">
                                    <label for="floatingPhone">Phone</label>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter address here"
                                        id="floatingTextarea" style="height: 100px;">{{ old('address') }}</textarea>
                                    <label for="floatingTextarea">Address</label>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
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
@endsection
