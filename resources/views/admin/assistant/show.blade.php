@extends('layouts.master')

@section('template_title')
    {{ $assistant->name ?? __('Show') . " " . __('Assistant') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Assistant</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('assistants.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Name:</strong>
                            {{ $assistant->name }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Clinic Id:</strong>
                            {{ $assistant->clinic_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Address:</strong>
                            {{ $assistant->address }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Phone Number:</strong>
                            {{ $assistant->phone_number }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Date Of Birth:</strong>
                            {{ $assistant->date_of_birth }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Email:</strong>
                            {{ $assistant->email }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
