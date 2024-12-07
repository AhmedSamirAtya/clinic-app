@php
    $appointments = \App\Models\Appointment::with('patient')->get();
    $medicines = \App\Models\Medicine::all();
@endphp

<div class="row padding-1 p-1">
    <div class="col-md-12">
        <label for="appointment_id" class="form-label">{{ __('appointment') }}</label>
        {{-- {{ Form::text('activity_factor', $clientProfile->activity_factor, ['class' => 'form-control' . ($errors->has('activity_factor') ? ' is-invalid' : ''), 'placeholder' => 'Activity Factor']) }} --}}
        <div class="form-group mb-2 mb20">
            <select id="appointment_id" name="appointment_id" class="form-control select">
                @foreach ($appointments as $app)
                    <option value="{{ $app->id }}" @if (old('appointment_id', $prescription?->appointment_id) == $app->id) selected @endif>
                        {{ $app->patient->name }}</option>
                @endforeach
            </select>
        </div>
        {!! $errors->first('appointment_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="col-md-12">
        <div class="form-group mb-2 mb20">
            <label for="diagnosis" class="form-label">{{ __('Diagnosis') }}</label>
            <input type="text" name="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror"
                value="{{ old('diagnosis', $prescription?->diagnosis) }}" id="diagnosis" placeholder="Diagnosis">
            {!! $errors->first('diagnosis', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group">
            <label for="medicines" class="form-label">{{ __('Medicines') }}</label>
            <select multiple="multiple" class="form-control select2" title="medicines" id="medicines"
                name="medicines[]">
                @foreach ($medicines as $medicine)
                    <option value="{{ $medicine->id }}" @if (in_array($medicine->id, $prescription->medicines->pluck('id')->toArray() ?? [])) selected @endif>
                        {{ $medicine->name }}</option>
                @endforeach
            </select>
            {!! $errors->first('medicines', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
@section('custom_scripts')
    <script src="{{ URL::asset('/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection
@section('custom_css')
    <link href="{{ \Illuminate\Support\Facades\URL::asset('/assets/plugins/select2/css/select2.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection
