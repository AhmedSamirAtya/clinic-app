@extends('layouts.master')

@section('template_title')
    {{ $patient->name ?? __('Show') . " " . __('Patient') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Patient</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('patients.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Name:</strong>
                            {{ $patient->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Job:</strong>
                            {{ $patient->job }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Address:</strong>
                            {{ $patient->address }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Age In Month:</strong>
                            {{ $patient->age_in_month }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Phone Number:</strong>
                            {{ $patient->phone_number }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
