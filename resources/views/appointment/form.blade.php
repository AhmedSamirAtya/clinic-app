@php
    $clinics = \App\Models\Clinic::all();
    $doctors = \App\Models\Doctor::all();
    $patients = \App\Models\Patient::all();
    $types = ['urgent', 'normal', 'repeated'];
@endphp
<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group">
            <label for="patient_id" class="form-label">{{ __('Patient') }}</label>
            <select class="form-control" title="Patient" id="patient_id" name="patient_id">
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}" @if ($patient->id == $appointment->patient_id) selected @endif>
                        {{ $patient->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('patient_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="doctor_id" class="form-label">{{ __('Doctor') }}</label>
            <select class="form-control" title="Doctor" id="doctor_id" name="doctor_id">
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" @if ($doctor->id == $appointment->doctor_id) selected @endif>
                        {{ $doctor->user->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('doctor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="clinic_id" class="form-label">{{ __('Clinic') }}</label>
            <select class="form-control" title="Clinic" id="clinic_id" name="clinic_id">
                @foreach ($clinics as $clinic)
                    <option value="{{ $clinic->id }}" @if ($clinic->id == $appointment->clinic_id) selected @endif>
                        {{ $clinic->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('clinic_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="appointment_datetime" class="form-label">{{ __('Appointment Datetime') }}</label>
            <input type="datetime-local" name="appointment_datetime"
                class="form-control @error('appointment_datetime') is-invalid @enderror"
                value="{{ old('appointment_datetime', $appointment?->appointment_datetime) }}"
                id="appointment_datetime" placeholder="Appointment Datetime">
            {!! $errors->first(
                'appointment_datetime',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <div class="form-group">
                <label for="type" class="form-label">{{ __('Type') }}</label>
                <select class="form-control" title="Type" id="type" name="type">
                    @foreach ($types as $type)
                        <option value="{{ $type }}" @if ($type == $appointment->type) selected @endif>
                            {{ $type }}</option>
                    @endforeach
                </select>
                {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="form-group mb-2 mb20">
            <label for="reason" class="form-label">{{ __('Reason') }}</label>
            <input type="text" name="reason" class="form-control @error('reason') is-invalid @enderror"
                value="{{ old('reason', $appointment->reason) }}" id="reason" placeholder="reason">
            {!! $errors->first('reason', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="col-md-12 mt20 mt-2">
            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </div>
