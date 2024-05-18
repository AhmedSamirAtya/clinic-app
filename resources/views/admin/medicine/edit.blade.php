@extends('layouts.master')

@section('template_title')
    {{ __('Update') }} Medicine
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Medicine</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('medicines.update', $medicine->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.medicine.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
