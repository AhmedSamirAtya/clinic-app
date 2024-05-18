<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="patient_id" class="form-label">{{ __('Patient Id') }}</label>
            <input type="text" name="patient_id" class="form-control @error('patient_id') is-invalid @enderror" value="{{ old('patient_id', $patientHistory?->patient_id) }}" id="patient_id" placeholder="Patient Id">
            {!! $errors->first('patient_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="prescription_id" class="form-label">{{ __('Prescription Id') }}</label>
            <input type="text" name="prescription_id" class="form-control @error('prescription_id') is-invalid @enderror" value="{{ old('prescription_id', $patientHistory?->prescription_id) }}" id="prescription_id" placeholder="Prescription Id">
            {!! $errors->first('prescription_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>