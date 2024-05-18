@extends('layouts.master')

@section('template_title')
    {{ $prescription->name ?? __('Show') . " " . __('Prescription') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Prescription</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('prescriptions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Patient Id:</strong>
                            {{ $prescription->patient_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Doctor Id:</strong>
                            {{ $prescription->doctor_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Diagnosis:</strong>
                            {{ $prescription->diagnosis }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
