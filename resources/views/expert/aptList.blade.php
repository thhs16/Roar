@extends('expert.layouts.master')

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
                    <h6 class="mb-4">Your Appointment List<span
                            class="badge badge-warninga">{{ $appointment->count() }}</span></h6>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Appointment Time</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Student Name</th>
                                    <th scope="col">Student Email</th>
                                    <th scope="col">Student Phone</th>
                                    {{-- <th scope="col">Features</th> --}}


                                </tr>
                            </thead>
                            <tbody>

                                @php $i = 0; @endphp

                                @foreach ($appointment as $appointment_item)
                                    @php $i++; @endphp

                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $appointment_item->aptTime }}</td>
                                        <td>
                                            <div
                                                class=" @if ($appointment_item->status == 'booked') btn btn-success
                                    @elseif ($appointment_item->status == 'pending')
                                        btn btn-danger
                                    @else
                                        btn btn-warning @endif">
                                                {{ $appointment_item->status }}</div>
                                        </td>
                                        <td>{{ $appointment_item->student_name }}</td>
                                        <td>{{ $appointment_item->student_email }}</td>
                                        <td>{{ $appointment_item->student_phone }}</td>
                                        {{-- <td>
                                            <a href="{{ route('categoryDelete', $appointment_item->id) }}"
                                                class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                        </td> --}}
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    {{-- pagination --}}
                    <span class=" d-flex justify-content-end">{{ $appointment->links() }}</span>

                </div>
            </div>
        </div>
    </section>
@endsection
