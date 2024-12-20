@extends('layouts.master')

@section('template_title')
    Prescription
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Prescription') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('prescriptions.create') }}" class="btn btn-primary btn-sm float-right"
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
                                        <th>Appointment Identifier</th>
                                        <th>Patient</th>
                                        <th>Doctor</th>
                                        <th>Diagnosis</th>
                                        <th>Medicines</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prescriptions as $prescription)
                                        <tr>
                                            <td>{{ $prescription->id }}</td>
                                            <td>{{ $prescription->appointment_id }}</td>
                                            <td>{{ $prescription->appointment->patient->name }}</td>
                                            <td>{{ $prescription->appointment->doctor->name }}</td>
                                            <td>{{ $prescription->diagnosis }}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($prescription->medicines as $medicine)
                                                        <li>{{ $medicine->name }} - {{ $medicine->concentration }} -
                                                            {{ $medicine->unit }}</li>
                                                    @endforeach
                                                </ul>
                                            </td>

                                            <td>
                                                <form action="{{ route('prescriptions.destroy', $prescription->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('prescriptions.show', $prescription->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('prescriptions.edit', $prescription->id) }}"><i
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
                {!! $prescriptions->links() !!}
            </div>
        </div>
    </div>
@endsection
