@extends('layouts.app')

@section('template_title')
    {{ $location->name ?? __('Show') . " " . __('Location') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Location</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('locations.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Clinic Id:</strong>
                            {{ $location->clinic_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Address:</strong>
                            {{ $location->address }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>City:</strong>
                            {{ $location->city }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>State:</strong>
                            {{ $location->state }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Postal Code:</strong>
                            {{ $location->postal_code }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
