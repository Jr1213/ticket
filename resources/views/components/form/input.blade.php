<div class="col-md-{{ $width ?? '12' }} mb-2">
    <label class="form-control-label" for="inputDanger1">{{ $title ?? '' }}</label>
    <input type="{{ $type ?? 'text' }}" value="{{ $value ?? '' }}" name="{{ $name }}" placeholder="{{ $placeholder ?? '' }}"
        class="form-control @error($name) is-invalid @enderror " id="inputDanger1">
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
