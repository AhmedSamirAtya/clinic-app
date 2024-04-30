@extends('layouts.master')

@section('template_title')
    {{ $medicinePrescription->name ?? __('Show') . " " . __('Medicine Prescription') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Medicine Prescription</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('medicine-prescriptions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Medicine Id:</strong>
                            {{ $medicinePrescription->medicine_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Prescription Id:</strong>
                            {{ $medicinePrescription->prescription_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Dose:</strong>
                            {{ $medicinePrescription->dose }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Duration In Days:</strong>
                            {{ $medicinePrescription->duration_in_days }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
