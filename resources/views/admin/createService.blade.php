@extends('admin.layouts.master')

@section('content')
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary">Service</h3>
                        </a>
                    </div>

                    <form action="{{ route('createServiceDB') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-4">
                                <input class="form-control @error('serviceImage') is-invalid @enderror" name="serviceImage" value="{{ old('serviceImage')}}" type="file" id="formFile" onchange="loadFile(event)">
                                <img src="" class=" img-thumbnail mt-1" alt="" id="output">
                                    @error('serviceImage')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>

                            <div class="col-8">
                                <div class="form-floating mb-3">
                                    <input name="serviceTitle" value="{{ old('serviceTitle')}}"  type="text" class="form-control @error('serviceTitle') is-invalid @enderror" id="floatingText" placeholder="jhondoe">
                                    <label for="floatingText">Title</label>
                                        @error('serviceTitle')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <select name="serviceType" value="{{ old('serviceType')}}"  class="form-select @error('serviceType') is-invalid @enderror" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="" selected>Select the type...</option>
                                        <option value="free">Free</option>
                                        <option value="paid">Paid</option>
                                    </select>
                                    <label for="floatingSelect">Type</label>
                                        @error('serviceType')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <select name="serviceCategoryId" value="{{ old('serviceCategoryId')}}" class="form-select @error('serviceCategoryId') is-invalid @enderror" id="floatingSelect"
                                        aria-label="Floating label select example">
                                        <option value="" selected>Select the category...</option>
                                        @foreach ($category as $category_item)
                                            <option value="{{$category_item->id}}">{{$category_item->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Category</label>
                                        @error('serviceCategoryId')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                </div>

                                <div class="input-group mb-3">

                                    <input name="serviceFees" value="{{ old('serviceFees')}}" type="text" class="form-control @error('serviceFees') is-invalid @enderror" placeholder="Fees per Course">
                                    <span class="input-group-text">mmk</span>

                                        @error('serviceFees')

                                                <small class="text-danger col-12">{{$message}}</small>
                                        @enderror

                                </div>

                                <div class="form-floating mb-3">
                                    <textarea name="serviceDescription" value="{{ old('serviceDescription')}}" class="form-control @error('serviceDescription') is-invalid @enderror" placeholder="Leave a comment here"
                                        id="floatingTextarea" style="height: 150px;"></textarea>
                                    <label for="floatingTextarea">Description</label>
                                        @error('serviceDescription')
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
