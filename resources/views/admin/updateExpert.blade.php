@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h3 class="text-primary">Update Expert</h3>
                    </div>

                    <form action="{{ route('updateExpertDB') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $expertId }}">
                        <div class="row">
                            <div class="mb-3 col-4">
                                <input class="form-control @error('image') is-invalid @enderror" name="image"
                                    type="file" id="image">
                                <img src="{{ asset('admin/adminAndExpertProfileImg/' . $expert->image) }}"
                                    class="img-thumbnail mt-1" width="100" alt="Expert Image">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-8">
                                <div class="form-floating mb-3">
                                    <input name="name" value="{{ old('name', $expert->name) }}" type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        placeholder="Full Name">
                                    <label for="name">Full Name</label>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input name="displayName" value="{{ old('display_name', $expert->display_name) }}"
                                        type="text" class="form-control @error('display_name') is-invalid @enderror"
                                        id="display_name" placeholder="Display Name">
                                    <label for="display_name">Display Name</label>
                                    @error('display_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea name="about" class="form-control @error('about') is-invalid @enderror" id="about"
                                        placeholder="About Expert" style="height: 100px;">{{ old('about', $expert->about) }}</textarea>
                                    <label for="about">About</label>
                                    @error('about')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input name="trainedStudent"
                                        value="{{ old('trained_student', $expert->trained_student) }}" type="number"
                                        class="form-control @error('trained_student') is-invalid @enderror"
                                        id="trained_student" placeholder="Number of Students Trained">
                                    <label for="trained_student">Trained Students</label>
                                    @error('trained_student')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <h5 class="mt-3">Social Media Accounts</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="facebookAcc" value="{{ old('facebook_acc', $expert->facebook_acc) }}"
                                        type="text" class="form-control" id="facebook_acc"
                                        placeholder="Facebook Profile">
                                    <label for="facebook_acc">Facebook</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="instagramAcc" value="{{ old('instagram_acc', $expert->instagram_acc) }}"
                                        type="text" class="form-control" id="instagram_acc"
                                        placeholder="Instagram Profile">
                                    <label for="instagram_acc">Instagram</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="twitterAcc" value="{{ old('twitter_acc', $expert->twitter_acc) }}"
                                        type="text" class="form-control" id="twitter_acc" placeholder="Twitter Profile">
                                    <label for="twitter_acc">Twitter</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="linkedinAcc" value="{{ old('linkedin_acc', $expert->linkedin_acc) }}"
                                        type="text" class="form-control" id="linkedin_acc"
                                        placeholder="LinkedIn Profile">
                                    <label for="linkedin_acc">LinkedIn</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Update Expert</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
