@extends('layouts.master')

@section('template_title')
    {{ $specializationsDoctor->name ?? __('Show') . " " . __('Specializations Doctor') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Specializations Doctor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('specializations-doctors.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                        <div class="form-group mb-2 mb20">
                            <strong>Docotr Id:</strong>
                            {{ $specializationsDoctor->docotr_id }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Specialization Id:</strong>
                            {{ $specializationsDoctor->specialization_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
