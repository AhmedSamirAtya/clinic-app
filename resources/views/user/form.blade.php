@php
    $roles = \App\Models\Role::all();
    $clinics = \App\Models\Clinic::all();
@endphp
<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone_number" class="form-label">{{ __('Phone') }}</label>
            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                value="{{ old('phone_number', $user?->phone) }}" id="phone_number" placeholder="phone_number">
            {!! $errors->first('phone_number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $user?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror"
                value="{{ old('password', $user?->password) }}" id="password" placeholder="Password">
            {!! $errors->first('password', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group">
            <label for="role_id" class="form-label">{{ __('Role') }}</label>
            <select class="form-control" title="Role" id="role_id" name="role_id">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @if ($role->id == $user->role_id) selected @endif>
                        {{ $role->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('role_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="clinic_id" class="form-label">{{ __('Clinic') }}</label>
            <select class="form-control" title="Role" id="clinic_id" name="clinic_id">
                @foreach ($clinics as $clinic)
                    <option value="{{ $clinic->id }}">
                        {{ $clinic->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('clinic_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
