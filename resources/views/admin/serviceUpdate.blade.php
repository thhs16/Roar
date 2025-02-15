@extends('admin.layouts.master')

@section('content')

@if(session('Success Message'))
    <h6 id="sessionMessage" class="alert alert-success">
        {{ session('Success Message') }}
    </h6>
@endif

    <!-- Service Edit Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary">Edit Service</h3>
                        </a>
                    </div>

                    <form action="{{ route('serviceUpdateDB') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- service id --}}
                        <input type="hidden" name="serviceId" value="{{$service->id}}">

                        <div class="row">
                            <div class="mb-3 col-4">
                                <input name="serviceImage"  type="file" value="{{ old('serviceImage', $service->image) }}" class="form-control @error('serviceImage') is-invalid @enderror" id="formFile" onchange="loadFile(event)">
                                <img src="{{ asset('serviceImages/' . $service->image) }}" class="img-thumbnail mt-1" alt="Service Image" id="output">
                                @error('serviceImage')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="col-8">
                                <div class="form-floating mb-3">
                                    <input name="serviceTitle" value="{{ old('serviceTitle', $service->title) }}" type="text" class="form-control @error('serviceTitle') is-invalid @enderror" id="floatingText">
                                    <label for="floatingText">Title</label>
                                    @error('serviceTitle')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <select name="serviceType" class="form-select @error('serviceType') is-invalid @enderror">
                                        <option value="" disabled>Select the type...</option>
                                        <option value="free" {{ old('serviceType', $service->type) == 'free' ? 'selected' : '' }}>Free</option>
                                        <option value="paid" {{ old('serviceType', $service->type) == 'paid' ? 'selected' : '' }}>Paid</option>
                                    </select>
                                    <label for="floatingSelect">Type</label>
                                    @error('serviceType')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <select name="serviceCategoryId" class="form-select @error('serviceCategoryId') is-invalid @enderror">
                                        <option value="" disabled>Select the category...</option>
                                        @foreach ($category as $category_item)
                                            <option value="{{ $category_item->id }}" {{ old('serviceCategoryId', $service->category_id) == $category_item->id ? 'selected' : '' }}>
                                                {{ $category_item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Category</label>
                                    @error('serviceCategoryId')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <input name="serviceFees" value="{{ old('serviceFees', $service->fees) }}" type="text" class="form-control @error('serviceFees') is-invalid @enderror" placeholder="Fees per Course">
                                    <span class="input-group-text">mmk</span>
                                    @error('serviceFees')
                                        <small class="text-danger col-12">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea name="serviceDescription" class="form-control @error('serviceDescription') is-invalid @enderror" style="height: 150px;">{{ old('serviceDescription', $service->description) }}</textarea>
                                    <label for="floatingTextarea">Description</label>
                                    @error('serviceDescription')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Service Edit End -->
@endsection
