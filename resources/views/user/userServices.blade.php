@extends('user.layouts.master')

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
                    <h6 class="mb-4">Your Consultation Sessions<span class="badge badge-warninga"></span></h6>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Appointment Time</th>
                                <th scope="col">Speaking Expert</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php $i = 0; @endphp

                            @foreach ($userAppointment as $userAppointment_item)
                                @php $i ++; @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ \Carbon\Carbon::parse($userAppointment_item->aptTime)->format('h:i A - d M Y ( l )') }}
                                    </td>
                                    <td>{{ $userAppointment_item->expert_name }}</td>
                                    <td>
                                        <div
                                            class=" @if ($userAppointment_item->status == 'booked') btn btn-success
                            @else ($userAppointment_item->status == 'pending')
                                btn btn-danger @endif">
                                            {{ $userAppointment_item->status }}</div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- pagination --}}
                    <span class=" d-flex justify-content-center">{{ $userAppointment->links() }}</span>
                </div>

            </div>
        </div>
    </section>
@endsection
