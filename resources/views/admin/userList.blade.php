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
                <h6 class="mb-4">User List<span class="badge badge-warning">{{ $userList->count() }}</span></h6>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Features</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $i = 0; @endphp

                            @foreach ($userList as $userList_item)
                                @php $i++; @endphp

                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $userList_item->name }}{{ $userList_item->nickname }}</td>
                                    <td>{{ $userList_item->email }}</td>
                                    <td>{{ $userList_item->phone }}</td>
                                    <td>

                                        <a href="{{ route('categoryDelete', $userList_item->id) }}"
                                            class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{-- pagination --}}
                <span class=" d-flex justify-content-end">{{ $userList->links() }}</span>
            </div>
        </div>
    </div>
@endsection
