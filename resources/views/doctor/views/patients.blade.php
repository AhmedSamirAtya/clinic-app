@extends('layouts.doctor.master')

@section('template_title')
    {{ __('patients') }}
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

                                        <th>Name</th>
                                        <th>Job</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>Date Of Birth</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ $patient->id }}</td>

                                            <td>{{ $patient->name }}</td>
                                            <td>{{ $patient->job }}</td>
                                            <td>{{ $patient->address }}</td>
                                            <td>{{ $patient->phone_number }}</td>
                                            <td>{{ $patient->date_of_birth }}</td>
                                            <td>{{ $patient->email }}</td>

                                            <td>
                                                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                                                    @csrf
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('doctor.patient', $patient->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                </form>
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
