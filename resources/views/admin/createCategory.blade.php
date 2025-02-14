@extends('admin.layouts.master')

@section('content')
    <!-- Sign Up Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary">Category</h3>
                        </a>

                    </div>

                    <form action=" {{ route('createCategoryDB') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" name="categoryName" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Category Name</label>
                        </div>

                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up End -->
@endsection
