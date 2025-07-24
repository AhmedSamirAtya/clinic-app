<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="docotr_id" class="form-label">{{ __('Docotr Id') }}</label>
            <input type="text" name="docotr_id" class="form-control @error('docotr_id') is-invalid @enderror" value="{{ old('docotr_id', $specializationsDoctor?->docotr_id) }}" id="docotr_id" placeholder="Docotr Id">
            {!! $errors->first('docotr_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="specialization_id" class="form-label">{{ __('Specialization Id') }}</label>
            <input type="text" name="specialization_id" class="form-control @error('specialization_id') is-invalid @enderror" value="{{ old('specialization_id', $specializationsDoctor?->specialization_id) }}" id="specialization_id" placeholder="Specialization Id">
            {!! $errors->first('specialization_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>