@extends('admin.layouts.master')

@section('content')

@if(session('Success Message'))
    <h6 id="sessionMessage" class="alert alert-success">
        {{ session('Success Message') }}
    </h6>
@endif

 <section class="mt-5">
    <div class="container">
        <h2 class="mb-4">Profile Settings</h2>

        {{-- Profile Update Form --}}
        <div class="card mb-4">
            <div class="card-header">Update Profile</div>
            <div class="card-body">
                <form action="{{ route('adminProfileUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    {{-- Profile Image --}}
                    <div class="text-center mb-3">
                        <img src="{{ auth()->user()->image ? asset('admin/adminAndExpertProfileImg/' . auth()->user()->image) : asset('admin/img/user.jpg') }}"
                             id="profileImagePreview"
                             class="rounded-circle"
                             width="120" height="120"
                             style="object-fit: cover; border: 3px solid #ddd;">
                    </div>

                    {{-- Image Upload --}}
                    <div class="mb-3 text-center">
                        <label class="form-label">Update Profile Image</label>
                        <input type="file" name="image" class="form-control" onchange="previewImage(event)">
                        @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ auth()->user()->phone }}">
                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Address --}}
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ auth()->user()->address }}">
                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Update Profile</button>
                </form>
            </div>
        </div>

        {{-- Password Change Section --}}

        <div class="card">
            <div class="card-header">Change Password</div>
            <div class="card-body">
                <form action="{{ route('adminUpdateProfilePassword') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Old Password</label>
                        <input type="password" name="oldPassword" class="form-control">
                        @error('oldPassword') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="newPassword" class="form-control">
                        @error('newPassword') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="newPassword_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-danger w-100">Update Password</button>
                </form>
            </div>
        </div>

    </div>

    {{-- Image Preview Script --}}
    <script>
        function previewImage(event) {
            let reader = new FileReader();
            reader.onload = function () {
                document.getElementById('profileImagePreview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
 </section>
@endsection
