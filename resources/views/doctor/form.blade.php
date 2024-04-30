@php
    $clinics = \App\Models\Clinic::all();
@endphp

<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <input type="hidden" name="user_id" value="{{ $doctor->user?->id }}" id="user_id">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $doctor->user?->name) }}" id="name" placeholder="Name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="specialization" class="form-label">{{ __('Specialization') }}</label>
            <input type="text" name="specialization"
                class="form-control @error('specialization') is-invalid @enderror"
                value="{{ old('specialization', $doctor->specialization) }}" id="specialization"
                placeholder="Specialization">
            @error('specialization')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone_number" class="form-label">{{ __('Phone') }}</label>
            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                value="{{ old('phone_number', $doctor->user?->phone_number) }}" id="phone_number"
                placeholder="phone_number">
            @error('phone_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $doctor->user?->email) }}" id="email" placeholder="Email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                value="{{ old('password', $doctor->user?->password) }}" id="password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_of_birth" class="form-label">{{ __('Date Of Birth') }}</label>
            <input type="date" id="date_of_birth" name="date_of_birth"
                value="{{ old('date_of_birth', $doctor->date_of_birth) }}">
            @error('date_of_birth')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="clinic_id" class="form-label">{{ __('Clinic') }}</label>
            <select class="form-control" title="Clinic" id="clinic_id" name="clinic_id">
                @foreach ($clinics as $clinic)
                    <option value="{{ $clinic->id }}">
                        {{ $clinic->name }}</option>
                @endforeach
            </select>
            @error('clinic_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
