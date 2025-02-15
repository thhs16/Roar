@extends('admin.layouts.master')

@section('content')

@if(session('Success Message'))
    <h6 id="sessionMessage" class="alert alert-success">
        {{ session('Success Message') }}
    </h6>
@endif

<div class="row m-5">
    <div class="">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Service List</h6>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">Category Id</th>
                        <th scope="col">Image</th>
                        <th scope="col">Type</th>
                        <th scope="col">Fees</th>
                        <th scope="col">Description</th>
                        <th scope="col">Features</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{ $truncated = Str::limit($item->description, 100, ' ...'); }} --}}

                    @php $i = 0; @endphp

                    @foreach ($service as $service_item)

                        @php $i++; @endphp

                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td scope="col">{{$service_item->title}}</td>
                            <td scope="col">{{$service_item->category_id}}</td>
                            <td scope="col">
                                <img src="{{ asset('serviceImages/'.$service_item->image) }}" class="w-100" alt="">
                            </td>
                            <td scope="col">{{$service_item->type}}</td>
                            <td scope="col">{{$service_item->fees}}</td>
                            <td scope="col">{{ $truncated = Str::limit($service_item->description, 100, ' ...'); }}</td>
                            <td scope="col">
                                <a href="{{ route('serviceDetail',$service_item->id) }}">Detail</a>
                                <a href="{{ route('serviceUpdate',$service_item->id) }}">Update</a>
                                <a href="{{ route('serviceDelete',$service_item->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
