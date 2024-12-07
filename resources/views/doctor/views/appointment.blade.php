@extends('layouts.doctor.master')

@section('template_title')
    {{ $appointment->name ?? __('Show') . " " . __('Patient') }}
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
                            <a class="btn btn-primary btn-sm" href="{{ route('appointments.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Patient:</strong>
                            {{ $appointment->patient->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>clinic:</strong>
                            {{ $appointment->clinic->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>type:</strong>
                            {{ $appointment->type }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>reason:</strong>
                            {{ $appointment->reason }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Date:</strong>
                            {{ $appointment->appointment_datetime }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
