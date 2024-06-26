@extends('layouts.master')

@section('template_title')
    {{ __('Create') }} Assistant
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Assistant</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('assistants.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.assistant.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
