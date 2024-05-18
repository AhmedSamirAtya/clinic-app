@extends('layouts.master')

@section('template_title')
    {{ __('Update') }} Medicine Prescription
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Medicine Prescription</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('medicine-prescriptions.update', $medicinePrescription->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('medicine-prescription.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
