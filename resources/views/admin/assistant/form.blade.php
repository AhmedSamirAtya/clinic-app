@php
    $clinics = \App\Models\Clinic::all();
@endphp


<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $assistant?->name) }}" id="name" placeholder="Name">
            {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group">
            <label for="clinic_id" class="form-label">{{ __('Clinic Id') }}</label>
            {{-- {{ Form::text('activity_factor', $clientProfile->activity_factor, ['class' => 'form-control' . ($errors->has('activity_factor') ? ' is-invalid' : ''), 'placeholder' => 'Activity Factor']) }} --}}
            <div class="col-md-12 mb-3">
                <select id="clinic_id" name="clinic_id" class="form-control select">
                    @foreach ($clinics as $clinic)
                        <option value="{{ $clinic->id }}" @if (old('clinic_id', $assistant->clinic_id) == $clinic->id) selected @endif>
                            {{ $clinic->name }}</option>
                    @endforeach
                </select>
            </div>
            {!! $errors->first('clinic_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="address" class="form-label">{{ __('Address') }}</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                value="{{ old('address', $assistant?->address) }}" id="address" placeholder="Address">
            {!! $errors->first('address', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group">
            <label for="date_of_birth" class="form-label">{{ __('Date Of Birth') }}</label>
            <input type="datetime-local" id="date_of_birth" name="date_of_birth"
                class="form-control @error('date_of_birth') is-invalid @enderror"
                value="{{ old('date_of_birth', \Carbon\Carbon::parse($assistant?->date_of_birth)->format('Y-m-d\TH:i')) }}"
                id="date_of_birth" placeholder="{{ __('Date Of Birth') }}">
            {!! $errors->first('date_of_birth', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="phone_number" class="form-label">{{ __('Phone Number') }}</label>
            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                value="{{ old('phone_number', $assistant?->phone_number) }}" id="phone_number"
                placeholder="Phone Number">
            {!! $errors->first('phone_number', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email', $assistant?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group">
            <label for="password" class="form-label">{{ __('password') }}</label>
            <input class="form-control" type="password" id="password" name="password"
                @error('password') is-invalid @enderror value="{{ old('password', $assistant?->password) }}"
                id="password" placeholder="{{ __('password') }}">
            {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
