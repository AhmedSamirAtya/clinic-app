@php
    $clinics = \App\Models\Clinic::all();
    $users = \App\Models\User::all();
@endphp
<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="form-group">
            <label for="clinic_id" class="form-label">{{ __('Clinic') }}</label>
            <select class="form-control" title="Clinic" id="clinic_id" name="clinic_id">
                @foreach ($clinics as $clinic)
                    <option value="{{ $clinic->id }}">
                        {{ $clinic->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('clinic_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="user_id" class="form-label">{{ __('User') }}</label>
            <select class="form-control" title="Clinic" id="user_id" name="user_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">
                        {{ $user->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('clinic_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
