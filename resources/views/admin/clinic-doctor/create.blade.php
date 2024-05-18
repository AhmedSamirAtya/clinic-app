@extends('layouts.master')

@section('template_title')
    {{ __('Create') }} Clinic Doctor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Clinic Doctor</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('clinic-doctors.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('clinic-doctor.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
