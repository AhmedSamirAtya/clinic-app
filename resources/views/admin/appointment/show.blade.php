@extends('layouts.master')

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
                            <a class="btn btn-primary btn-sm" href="{{ route('appointments.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Patient Id:</strong>
                            {{ $appointment->patient_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Doctor Id:</strong>
                            {{ $appointment->doctor_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Appointment Datetime:</strong>
                            {{ $appointment->appointment_datetime }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Type:</strong>
                            {{ $appointment->type }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
