<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="clinic_id" class="form-label">{{ __('Clinic Id') }}</label>
            <input type="text" name="clinic_id" class="form-control @error('clinic_id') is-invalid @enderror" value="{{ old('clinic_id', $clinicDoctor?->clinic_id) }}" id="clinic_id" placeholder="Clinic Id">
            {!! $errors->first('clinic_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="doctor_id" class="form-label">{{ __('Doctor Id') }}</label>
            <input type="text" name="doctor_id" class="form-control @error('doctor_id') is-invalid @enderror" value="{{ old('doctor_id', $clinicDoctor?->doctor_id) }}" id="doctor_id" placeholder="Doctor Id">
            {!! $errors->first('doctor_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>