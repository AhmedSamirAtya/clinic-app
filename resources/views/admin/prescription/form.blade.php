<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="patient_id" class="form-label">{{ __('Patient Id') }}</label>
            <input type="text" name="patient_id" class="form-control @error('patient_id') is-invalid @enderror" value="{{ old('patient_id', $prescription?->patient_id) }}" id="patient_id" placeholder="Patient Id">
            {!! $errors->first('patient_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="doctor_id" class="form-label">{{ __('Doctor Id') }}</label>
            <input type="text" name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror" value="{{ old('doctor_id', $prescription?->doctor_id) }}" id="doctor_id" placeholder="Doctor Id">
            {!! $errors->first('doctor_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="diagnosis" class="form-label">{{ __('Diagnosis') }}</label>
            <input type="text" name="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror" value="{{ old('diagnosis', $prescription?->diagnosis) }}" id="diagnosis" placeholder="Diagnosis">
            {!! $errors->first('diagnosis', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>