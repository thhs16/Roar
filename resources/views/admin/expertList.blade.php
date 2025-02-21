@extends('admin.layouts.master')

@section('content')
    @if (session('Success Message'))
        <h6 id="sessionMessage" class="alert alert-success">
            {{ session('Success Message') }}
        </h6>
    @endif

    <div class="row m-5">
        <div class="">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Expert List<span class="badge badge-warning">{{ $expertList->count() }}</span></h6>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">User Id</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Features</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $i = 0; @endphp

                            @foreach ($expertList as $expertList_item)
                                @php $i++; @endphp

                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $expertList_item->name }}{{ $expertList_item->nickname }}</td>
                                    <td>{{ $expertList_item->id }}</td>
                                    <td>{{ $expertList_item->email }}</td>
                                    <td>{{ $expertList_item->phone }}</td>
                                    <td>
                                        <a href="{{ route('updateExpert', $expertList_item->id) }}"
                                            class="btn btn-primary">Update</a>
                                        <a href="{{ route('deleteExpert', $expertList_item->id) }}"
                                            class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                {{-- pagination --}}
                <span class=" d-flex justify-content-end">{{ $expertList->links() }}</span>
            </div>
        </div>
    </div>
@endsection
