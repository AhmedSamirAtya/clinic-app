@extends('layouts.master')

@section('template_title')
    {{ __('Update') }} Specializations Doctor
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Specializations Doctor</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('specializations-doctors.update', $specializationsDoctor->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.specializations-doctor.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
