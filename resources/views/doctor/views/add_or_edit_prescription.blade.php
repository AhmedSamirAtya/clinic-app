@php
    $appointments = \App\Models\Appointment::with('patient')->get();
@endphp

@extends('layouts.doctor.master')

@section('template_title')
    {{ __('Update') }} Prescription
@endsection

@section('content')
    <div class="card-body bg-white">
        <form method="POST"
            action="{{ $prescription != null ? route('doctor.edit_prescreption') : route('doctor.add_prescreption') }}"
            role="form" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="prescription_id" value="{{ $prescription?->id }}">

            <div class="row padding-1 p-1">
                @if ($prescription == null)
                    <div class="col-md-12">

                        <label for="appointment_id" class="form-label">{{ __('appointment') }}</label>
                        {{-- {{ Form::text('activity_factor', $clientProfile->activity_factor, ['class' => 'form-control' . ($errors->has('activity_factor') ? ' is-invalid' : ''), 'placeholder' => 'Activity Factor']) }} --}}
                        <div class="form-group mb-2 mb20">
                            <select id="appointment_id" name="appointment_id" class="form-control select">
                                @foreach ($appointments as $app)
                                    <option value="{{ $app->id }}" @if (old('appointment_id', $prescription?->appointment_id) == $app->id) selected @endif>
                                        {{ $app->patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {!! $errors->first('appointment_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                @else
                    <label for="" class="form-label">{{ $prescription->appointment->patient->name }} - - -
                        {{ $prescription->appointment->appointment_datetime }}</label>
                @endif
                <div class="col-md-12">
                    <div class="form-group mb-2 mb20">
                        <label for="diagnosis" class="form-label">{{ __('Diagnosis') }}</label>
                        <input type="text" name="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror"
                            value="{{ old('diagnosis', $prescription?->diagnosis) }}" id="diagnosis"
                            placeholder="Diagnosis">
                        {!! $errors->first('diagnosis', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                    </div>

                </div>
                <div class="col-md-12 mt20 mt-2">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
