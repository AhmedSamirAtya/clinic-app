@php
    $specializations = \App\Models\Specialization::all();
    $doctors = \App\Models\Doctor::all();
@endphp
<div class="row padding-1 p-1">
    <div class="col-md-12">

       <div class="form-group">
            <select class="form-control" title="Specialization" id="specialization_id" name="specialization_id">
                @foreach ($specializations as $specialization)
                    <option value="{{ $specialization->id }}" @if ($specialization->id == $specializationsDoctor?->specialization_id) selected @endif>
                        {{ $specialization->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('specialization_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="doctor_id" class="form-label">{{ __('Doctor Id') }}</label>
            <select class="form-control" title="Doctor" id="doctor_id" name="doctor_id">
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}" @if ($doctor->id == $specializationsDoctor?->doctor_id) selected @endif>
                        {{ $doctor->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('doctor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
