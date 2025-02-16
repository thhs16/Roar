@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-primary">Experts</h3>
                    </div>

                    <form action="{{ route('expertInfo') }}" method="POST">
                        @csrf

                        <div class="row">
                            <small class=" text-danger">*Create a User account first to continue this form.</small>
                            <small class=" text-danger">*See the User's Id in the expert List.</small>
                            <div class="col-md-6">

                                <!-- User ID -->
                                <div class="form-floating mb-3">
                                    <input name="userId" value="{{ old('user_id') }}" type="number" class="form-control @error('user_id') is-invalid @enderror" placeholder="User ID">
                                    <label>User ID</label>
                                    @error('user_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Display Name -->
                                <div class="form-floating mb-3">
                                    <input name="displayName" value="{{ old('displayName') }}" type="text" class="form-control @error('displayName') is-invalid @enderror" placeholder="Display Name">
                                    <label>Display Name</label>
                                    @error('displayName')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- About -->
                                <div class="form-floating mb-3">
                                    <textarea name="about" class="form-control @error('about') is-invalid @enderror" placeholder="About" style="height: 100px;">{{ old('about') }}</textarea>
                                    <label>About</label>
                                    @error('about')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Trained Students -->
                                <div class="form-floating mb-3">
                                    <input name="trainedStudent" value="{{ old('trainedStudent') }}" type="number" class="form-control @error('trainedStudent') is-invalid @enderror" placeholder="Trained Students">
                                    <label>Trained Students</label>
                                    @error('trainedStudent')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Facebook -->
                                <div class="form-floating mb-3">
                                    <input name="facebookAcc" value="{{ old('facebookAcc') }}" type="url" class="form-control @error('facebookAcc') is-invalid @enderror" placeholder="Facebook URL">
                                    <label>Facebook</label>
                                    @error('facebookAcc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Instagram -->
                                <div class="form-floating mb-3">
                                    <input name="instagramAcc" value="{{ old('instagramAcc') }}" type="url" class="form-control @error('instagramAcc') is-invalid @enderror" placeholder="Instagram URL">
                                    <label>Instagram</label>
                                    @error('instagramAcc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Twitter -->
                                <div class="form-floating mb-3">
                                    <input name="twitterAcc" value="{{ old('twitterAcc') }}" type="url" class="form-control @error('twitterAcc') is-invalid @enderror" placeholder="Twitter URL">
                                    <label>Twitter</label>
                                    @error('twitterAcc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- LinkedIn -->
                                <div class="form-floating mb-3">
                                    <input name="linkedinAcc" value="{{ old('linkedinAcc') }}" type="url" class="form-control @error('linkedinAcc') is-invalid @enderror" placeholder="LinkedIn URL">
                                    <label>LinkedIn</label>
                                    @error('linkedinAcc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
