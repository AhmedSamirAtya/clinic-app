<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="clinic_id" class="form-label">{{ __('Clinic Id') }}</label>
            <input type="text" name="clinic_id" class="form-control @error('clinic_id') is-invalid @enderror" value="{{ old('clinic_id', $location?->clinic_id) }}" id="clinic_id" placeholder="Clinic Id">
            {!! $errors->first('clinic_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Address') }}</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $location?->address) }}" id="address" placeholder="Address">
            {!! $errors->first('address', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="city" class="form-label">{{ __('City') }}</label>
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $location?->city) }}" id="city" placeholder="City">
            {!! $errors->first('city', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="state" class="form-label">{{ __('State') }}</label>
            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" value="{{ old('state', $location?->state) }}" id="state" placeholder="State">
            {!! $errors->first('state', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="postal_code" class="form-label">{{ __('Postal Code') }}</label>
            <input type="text" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code', $location?->postal_code) }}" id="postal_code" placeholder="Postal Code">
            {!! $errors->first('postal_code', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>