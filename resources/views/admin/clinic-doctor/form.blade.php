@php
    $clinics = \App\Models\Clinic::all();
    $doctors = \App\Models\Doctor::all();
@endphp

<div class="row padding-1 p-1">
    <div class="col-md-12">
       <div class="form-group">
            <select class="form-control" title="Clinic" id="clinic_id" name="clinic_id">
                @foreach ($clinics as $clinic)
                    <option value="{{ $clinic->id }}" @if ($clinic->id == $clinicDoctor?->clinic_id) selected @endif>
                        {{ $clinic->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('clinic_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="doctor_id" class="form-label">{{ __('Doctor Id') }}</label>
            <select class="form-control" title="Doctor" id="doctor_id" name="doctor_id">
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" @if ($doctor->id == $clinicDoctor?->doctor_id) selected @endif>
                        {{ $doctor->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('clinic_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group mb-2 mb20">
            <label for="doctor_id" class="form-label">{{ __('Doctor Id') }}</label>
            <input type="text" name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror" value="{{ old('doctor_id', $clinicDoctor?->doctor_id) }}" id="doctor_id" placeholder="Doctor Id">
            {!! $errors->first('doctor_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}
        {{-- <div class="form-group mb-2 mb20">
            <label for="start_time" class="form-label">{{ __('Start Time') }}</label>
            <input type="text" name="start_time" class="form-control @error('start_time') is-invalid @enderror" value="{{ old('start_time', $clinicDoctor?->start_time) }}" id="start_time" placeholder="Start Time">
            {!! $errors->first('start_time', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}

        <div class="form-group">
            <label for="start_time" class="form-label">{{ __('Start Time') }}</label>
            <input type="time" id="start_time" name="start_time"
                class="form-control @error('start_time') is-invalid @enderror"
                value="{{ old('start_time', $clinicDoctor?->start_time?->format('H:i')) }}"
                id="start_time" placeholder="{{ __('start time') }}">
            {!! $errors->first('start_time', '<div class="invalid-feedback">:message</div>') !!}
        </div>


        <div class="form-group">
            <label for="end_time" class="form-label">{{ __('end Time') }}</label>
            <input type="time" id="end_time" name="end_time"
                class="form-control @error('end_time') is-invalid @enderror"
                value="{{ old('end_time', $clinicDoctor?->end_time?->format('H:i')) }}"
                id="end_time" placeholder="{{ __('end time') }}">
            {!! $errors->first('end_time', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group mb-2 mb20">
            <label for="working_days" class="form-label">{{ __('Working Days') }}</label>
            <input type="text" name="working_days" class="form-control @error('working_days') is-invalid @enderror" value="{{ old('working_days', $clinicDoctor?->working_days) }}" id="working_days" placeholder="Working Days">
            {!! $errors->first('working_days', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div> --}}
        {{-- Working Days Checkboxes --}}
    <div>
        <label>Working Days:</label><br>
        @php
            $daysOfWeek = \App\Constants\DaysOfWeek::ALL_DAYS; // Assuming you have a DaysOfWeek model or array with days of the week
            // Get selected days for an existing record, default to empty array
            $selectedDays = isset($clinicDoctor) ? (array) $clinicDoctor->working_days : [];
        @endphp

        @foreach($daysOfWeek as $day)
            <input
                type="checkbox"
                name="working_days[]" {{-- IMPORTANT: Use [] for array submission --}}
                id="day_{{ strtolower($day) }}"
                value="{{ $day }}"
                {{ in_array($day, $selectedDays) ? 'checked' : '' }}
            >
            <label for="day_{{ strtolower($day) }}">{{ $day }}</label><br>
        @endforeach
    </div>
        <div class="form-group mb-2 mb20">
            <label for="appointment_price" class="form-label">{{ __('Appointment Price') }}</label>
            <input type="text" name="appointment_price" class="form-control @error('appointment_price') is-invalid @enderror" value="{{ old('appointment_price', $clinicDoctor?->appointment_price) }}" id="appointment_price" placeholder="Appointment Price">
            {!! $errors->first('appointment_price', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
