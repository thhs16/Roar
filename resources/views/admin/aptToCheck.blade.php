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
                    <h6 class="mb-4">
                        Pending Appointments
                        <span class="badge badge-primary text-dark">{{ $pending_appointment->count() }}</span>
                    </h6>

                    <!-- Make Table Responsive -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Appointment Time</th>
                                    <th scope="col">Speaking Expert</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Screenshot</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 0; @endphp
                                @foreach ($pending_appointment as $pending_appointment_item)
                                    @php $i++; @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pending_appointment_item->aptTime)->format('h:i A - d M Y ( l )') }}
                                        </td>
                                        <td>{{ $pending_appointment_item->expert_name }}</td>
                                        <td>{{ $pending_appointment_item->status }}</td>
                                        <td>
                                            <img src="{{ asset('user/aptPaymentSS/' . $pending_appointment_item->screenshot) }}"
                                                class="img-fluid rounded" style="max-width: 150px; height: auto;"
                                                alt="Screenshot">
                                        </td>
                                        <td>
                                            <a href="{{ route('approveAptAdmin', $pending_appointment_item->id) }}"
                                                class="btn btn-primary btn-sm">Approve</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- End Table Responsive -->

                    {{-- pagination --}}
                    <span class=" d-flex justify-content-end">{{ $pending_appointment->links() }}</span>
                </div>

            </div>
        </div>
    </section>
@endsection
