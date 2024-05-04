<div class="col-md-{{ $width ?? '12' }} mb-2">
    <label class="form-control-label" for="inputDanger1">{{ $title ?? '' }}</label>
    <textarea name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
        placeholder="{{ $placeholder ?? '' }}" rows="3">{{ $value ?? '' }}</textarea>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>
