@extends('layouts.app')

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
                            <strong>User Id:</strong>
                            {{ $doctor->user_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Specialization:</strong>
                            {{ $doctor->specialization }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
