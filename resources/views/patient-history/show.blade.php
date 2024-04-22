@extends('layouts.master')

@section('template_title')
    {{ $patientHistory->name ?? __('Show') . " " . __('Patient History') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Patient History</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('patient-histories.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Patient Id:</strong>
                            {{ $patientHistory->patient_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Prescription Id:</strong>
                            {{ $patientHistory->prescription_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
