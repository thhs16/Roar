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
                <h6 class="mb-4">Admin List<span class="badge badge-warninga">{{ $adminList->count() }}</span></h6>
                <div class=" table-responsive">
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

                            @foreach ($adminList as $adminList_item)
                                @php $i++; @endphp

                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <td>{{ $adminList_item->name }}{{ $adminList_item->nickname }}</td>
                                    <td>{{ $adminList_item->email }}</td>
                                    <td>{{ $adminList_item->phone }}</td>
                                    <td>
                                        @if ($adminList_item->role != 'superAdmin')
                                            @if ($adminList_item->role != auth()->user()->role)
                                                <a href="{{ route('categoryDelete', $adminList_item->id) }}"
                                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                            @endif
                                        @endif

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                {{-- pagination --}}
                <span class=" d-flex justify-content-end">{{ $adminList->links() }}</span>
            </div>
        </div>
    </div>
@endsection
