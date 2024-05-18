@extends('layouts.master')

@section('template_title')
    {{ $doctor->name ?? __('Show') . " " . __('Doctor') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Doctor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('doctors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Name:</strong>
                            {{ $doctor->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Specialization:</strong>
                            {{ $doctor->specialization }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Date Of Birth:</strong>
                            {{ $doctor->date_of_birth }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Phone Number:</strong>
                            {{ $doctor->phone_number }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Email:</strong>
                            {{ $doctor->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
