@extends('layouts.master')

@section('template_title')
    {{ __('Update') }} Clinic User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Clinic User</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('clinic-users.update', $clinicUser->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('clinic-user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection