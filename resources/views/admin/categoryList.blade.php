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
                <h6 class="mb-4">Category List</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Features</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php $i = 0; @endphp

                        @foreach ($category as $category_item)
                            @php $i++; @endphp

                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $category_item->id }}</td>
                                <td>{{ $category_item->name }}</td>
                                <td>
                                    <a href="{{ route('updateCategoryPage', $category_item->id) }}"
                                        class="btn btn-primary">Update</a>
                                    <a href="{{ route('categoryDelete', $category_item->id) }}" class="btn btn-danger"><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                {{-- pagination --}}
                <span class=" d-flex justify-content-end">{{ $category->links() }}</span>
            </div>
        </div>
    </div>
@endsection
