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
            <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number', $patient?->phone_number) }}" id="phone_number" placeholder="Phone Number">
            {!! $errors->first('phone_number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group">
            <label for="date_of_birth" class="form-label">{{ __('Date Of Birth') }}</label>
            <input type="datetime-local" id="date_of_birth" name="date_of_birth"
                class="form-control @error('date_of_birth') is-invalid @enderror"
                value="{{ old('date_of_birth', \Carbon\Carbon::parse($patient?->date_of_birth)->format('Y-m-d\TH:i')) }}"
                id="date_of_birth" placeholder="{{ __('Date Of Birth') }}">
            {!! $errors->first('date_of_birth', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $patient?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group">
            <label for="password" class="form-label">{{ __('password') }}</label>
            <input class="form-control" type="password" id="password" name="password"
                @error('password') is-invalid @enderror value="{{ old('password', $patient?->password) }}"
                id="phone_number" placeholder="{{ __('password') }}">
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>