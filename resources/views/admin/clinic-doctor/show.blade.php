@extends('layouts.master')

@section('template_title')
    {{ $clinicDoctor->name ?? __('Show') . " " . __('Clinic Doctor') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Clinic Doctor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('clinic-doctors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Clinic Id:</strong>
                            {{ $clinicDoctor->clinic_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Doctor Id:</strong>
                            {{ $clinicDoctor->doctor_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Start Time:</strong>
                            {{ $clinicDoctor->start_time }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>End Time:</strong>
                            {{ $clinicDoctor->end_time }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Working Days:</strong>
                            {{ $clinicDoctor->working_days }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Appointment Price:</strong>
                            {{ $clinicDoctor->appointment_price }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
