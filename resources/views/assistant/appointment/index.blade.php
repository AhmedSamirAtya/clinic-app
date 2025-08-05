@extends('layouts.assistant.master')

@section('template_title')
    Appointment
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Appointment') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('assistants.appointments.create-appointment') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
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
                                        <th>Patient Id</th>
                                        <th>Doctor Id</th>
                                        <th>Date</th>
                                        <th>Order</th>
                                        <th>Type</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $appointment->patient?->name }}</td>
                                            <td>{{ $appointment->doctor?->name }}</td>
                                            <td>{{ $appointment->date?->format('Y-m-d') }}</td>
                                            <td>{{ $appointment->order }}</td>
                                            <td>{{ $appointment->type }}</td>
                                            <td>
                                                <form action="{{ route('assistants.appointments.destroy-appointment', $appointment->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('assistants.appointments.view-appointment', $appointment->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('assistants.appointments.edit-appointment', $appointment->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $appointments->links() !!}
            </div>
        </div>
    </div>
@endsection
