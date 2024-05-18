@extends('layouts.master')

@section('template_title')
    {{ $clinic->name ?? __('Show') . ' ' . __('Clinic') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Clinic</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('clinics.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="form-group mb-2 mb20">
                            <strong>{{ __('main.name') }}:</strong>
                            {{ $clinic->name }}
                        </div>
                        <strong>{{ __('main.employee') }}:</strong>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>{{ __('main.identifier') }}</th>

                                        <th>{{ __('main.name') }}</th>

                                        <th>{{ __('main.phone') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clinic->assistants as $assistant)
                                        <tr>
                                            <td>{{ $assistant->id }}</td>

                                            <td>{{ $assistant->name }}</td>

                                            <td>{{ $assistant->name }}</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
