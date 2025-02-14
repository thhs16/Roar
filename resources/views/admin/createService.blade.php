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

                    <form action="{{ route('createServiceDB') }}" method="POST">
                        <div class="row">
                            <div class="mb-3 col-4">
                                <input class="form-control" name="serviceImage" type="file" id="formFile" onchange="loadFile(event)">
                                <img src="" class=" img-thumbnail mt-1" alt="" id="output">
                            </div>

                            <div class="col-8">
                                <div class="form-floating mb-3">
                                    <input name="serviceTitle" type="text" class="form-control" id="floatingText" placeholder="jhondoe">
                                    <label for="floatingText">Title</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="serviceCategory" type="text" class="form-control" id="floatingText" placeholder="jhondoe">
                                    <label for="floatingText">Category</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <textarea name="serviceDescription" class="form-control" placeholder="Leave a comment here"
                                        id="floatingTextarea" style="height: 150px;"></textarea>
                                    <label for="floatingTextarea">Description</label>
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
