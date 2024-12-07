<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="medicine_id" class="form-label">{{ __('Medicine Id') }}</label>
            <input type="text" name="medicine_id" class="form-control @error('medicine_id') is-invalid @enderror"
                value="{{ old('medicine_id', $medicinePrescription?->medicine_id) }}" id="medicine_id"
                placeholder="Medicine Id">
            {!! $errors->first('medicine_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="prescription_id" class="form-label">{{ __('Prescription Id') }}</label>
            <input type="text" name="prescription_id"
                class="form-control @error('prescription_id') is-invalid @enderror"
                value="{{ old('prescription_id', $medicinePrescription?->prescription_id) }}" id="prescription_id"
                placeholder="Prescription Id">
            {!! $errors->first(
                'prescription_id',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="dose" class="form-label">{{ __('Dose') }}</label>
            <input type="text" name="dose" class="form-control @error('dose') is-invalid @enderror"
                value="{{ old('dose', $medicinePrescription?->dose) }}" id="dose" placeholder="Dose">
            {!! $errors->first('dose', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="duration_in_days" class="form-label">{{ __('Duration In Days') }}</label>
            <input type="text" name="duration_in_days"
                class="form-control @error('duration_in_days') is-invalid @enderror"
                value="{{ old('duration_in_days', $medicinePrescription?->duration_in_days) }}" id="duration_in_days"
                placeholder="Duration In Days">
            {!! $errors->first(
                'duration_in_days',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
