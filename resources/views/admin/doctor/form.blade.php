<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $doctor?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="specialization" class="form-label">{{ __('Specialization') }}</label>
            <input type="text" name="specialization"
                class="form-control @error('specialization') is-invalid @enderror"
                value="{{ old('specialization', $doctor?->specialization) }}" id="specialization"
                placeholder="Specialization">
            {!! $errors->first(
                'specialization',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group">
            <label for="date_of_birth" class="form-label">{{ __('Date Of Birth') }}</label>
            <input type="datetime-local" id="date_of_birth" name="date_of_birth"
                class="form-control @error('date_of_birth') is-invalid @enderror"
                value="{{ old('date_of_birth', \Carbon\Carbon::parse($doctor?->date_of_birth)->format('Y-m-d\TH:i')) }}"
                id="date_of_birth" placeholder="{{ __('Date Of Birth') }}">
            {!! $errors->first('date_of_birth', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                value="{{ old('phone_number', $doctor?->phone_number) }}" id="phone_number" placeholder="Phone Number">
            {!! $errors->first('phone_number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $doctor?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="password" class="form-label">{{ __('password') }}</label>
            <input class="form-control" type="password" id="password" name="password"
                @error('password') is-invalid @enderror value="{{ old('password', $doctor?->password) }}"
                id="phone_number" placeholder="{{ __('password') }}">
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
