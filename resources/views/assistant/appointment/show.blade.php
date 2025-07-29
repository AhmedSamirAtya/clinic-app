@extends('layouts.assistant.master')

@section('template_title')
    {{ $appointment->name ?? __('Show') . " " . __('Appointment') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Appointment</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('assistants.appointments.get-appointments') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                         <div class="form-group mb-2 mb20">
                            <strong>Prescription:</strong>
                            {{ $appointment->prescription->diagnosis ?? 'N/A' }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Patient:</strong>
                            {{ $appointment->patient->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Doctor:</strong>
                            {{ $appointment->doctor->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Appointment Datetime:</strong>
                            {{ $appointment->appointment_datetime }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Type:</strong>
                            {{ $appointment->type }}
                        </div>
                         <div class="form-group mb-2 mb20">
                            <strong>Status:</strong>
                            {{ $appointment->status }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
