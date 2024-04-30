<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $patient?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="job" class="form-label">{{ __('Job') }}</label>
            <input type="text" name="job" class="form-control @error('job') is-invalid @enderror" value="{{ old('job', $patient?->job) }}" id="job" placeholder="Job">
            {!! $errors->first('job', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Address') }}</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $patient?->address) }}" id="address" placeholder="Address">
            {!! $errors->first('address', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="age_in_month" class="form-label">{{ __('Age In Month') }}</label>
            <input type="text" name="age_in_month" class="form-control @error('age_in_month') is-invalid @enderror" value="{{ old('age_in_month', $patient?->age_in_month) }}" id="age_in_month" placeholder="Age In Month">
            {!! $errors->first('age_in_month', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number', $patient?->phone_number) }}" id="phone_number" placeholder="Phone Number">
            {!! $errors->first('phone_number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>