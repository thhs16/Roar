@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-primary">Experts</h3>
                    </div>

                    <form action="" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <!-- User ID -->
                                <div class="form-floating mb-3">
                                    <input name="user_id" value="{{ old('user_id') }}" type="number" class="form-control @error('user_id') is-invalid @enderror" placeholder="User ID">
                                    <label>User ID</label>
                                    @error('user_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Display Name -->
                                <div class="form-floating mb-3">
                                    <input name="display_name" value="{{ old('display_name') }}" type="text" class="form-control @error('display_name') is-invalid @enderror" placeholder="Display Name">
                                    <label>Display Name</label>
                                    @error('display_name')
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
                                    <input name="trained_student" value="{{ old('trained_student') }}" type="number" class="form-control @error('trained_student') is-invalid @enderror" placeholder="Trained Students">
                                    <label>Trained Students</label>
                                    @error('trained_student')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Facebook -->
                                <div class="form-floating mb-3">
                                    <input name="facebook_acc" value="{{ old('facebook_acc') }}" type="url" class="form-control @error('facebook_acc') is-invalid @enderror" placeholder="Facebook URL">
                                    <label>Facebook</label>
                                    @error('facebook_acc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Instagram -->
                                <div class="form-floating mb-3">
                                    <input name="instagram_acc" value="{{ old('instagram_acc') }}" type="url" class="form-control @error('instagram_acc') is-invalid @enderror" placeholder="Instagram URL">
                                    <label>Instagram</label>
                                    @error('instagram_acc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Twitter -->
                                <div class="form-floating mb-3">
                                    <input name="twitter_acc" value="{{ old('twitter_acc') }}" type="url" class="form-control @error('twitter_acc') is-invalid @enderror" placeholder="Twitter URL">
                                    <label>Twitter</label>
                                    @error('twitter_acc')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- LinkedIn -->
                                <div class="form-floating mb-3">
                                    <input name="linkedin_acc" value="{{ old('linkedin_acc') }}" type="url" class="form-control @error('linkedin_acc') is-invalid @enderror" placeholder="LinkedIn URL">
                                    <label>LinkedIn</label>
                                    @error('linkedin_acc')
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
