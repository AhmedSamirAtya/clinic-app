@extends('layouts.assistant.master')

@section('template_title')
    {{ __('Create') }} Appointment
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Appointment</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('assistants.appointments.store-appointment') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('assistant.appointment.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
