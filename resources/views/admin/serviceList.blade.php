@extends('admin.layouts.master')

@section('content')
    @if (session('Success Message'))
        <h6 id="sessionMessage" class="alert alert-success">
            {{ session('Success Message') }}
        </h6>
    @endif

    <section>
        <div class="row m-5">
            <div class="">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Service List</h6>

                    <!-- Responsive Table -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Category ID</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Fees</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Features</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp

                                @foreach ($service as $service_item)
                                    @php $i++; @endphp

                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $service_item->title }}</td>
                                        <td>{{ $service_item->category_id }}</td>
                                        <td>
                                            <img src="{{ asset('serviceImages/' . $service_item->image) }}"
                                                class="img-fluid rounded" style="max-width: 100px; height: auto;"
                                                alt="Service Image">
                                        </td>
                                        <td>{{ $service_item->type }}</td>
                                        <td>{{ $service_item->fees }}</td>
                                        <td>{{ Str::limit($service_item->description, 100, ' ...') }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('serviceDetail', $service_item->id) }}"
                                                    class="btn btn-info btn-sm">Detail</a>
                                                <a href="{{ route('serviceUpdate', $service_item->id) }}"
                                                    class="btn btn-warning btn-sm">Update</a>
                                                <a href="{{ route('serviceDelete', $service_item->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- End of Table Responsive -->

                    {{-- pagination --}}
                    <span class=" d-flex justify-content-end">{{ $service->links() }}</span>
                </div>
            </div>
        </div>
    </section>
@endsection
