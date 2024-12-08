@extends('layouts.patient.master')

@section('template_title')
    {{ __('appointments') }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Doctor</th>
                                        <th>clinic</th>
                                        <th>Date</th>
                                        <th>type</th>
                                        <th>reason</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment->id }}</td>

                                            <td>{{ $appointment->doctor->name }}</td>
                                            <td>{{ $appointment->clinic->name }}</td>
                                            <td>{{ $appointment->appointment_datetime }}</td>
                                            <td>{{ $appointment->type }}</td>
                                            <td>{{ $appointment->reason }}</td>
                                            <td>
                                                {{-- <a class="btn btn-sm btn-primary "
                                                    href="{{ route('doctor.appointment.show', $appointment->id) }}"><i
                                                        class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a> --}}
                                                {{-- <a class="btn btn-sm btn-success "
                                                    href="{{ route('patient.appointment.edit_prescreiption', $appointment->id) }}"><i
                                                        class="fa fa-fw fa-edit"></i>
                                                    {{ __('add or edit prescription') }}</a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
