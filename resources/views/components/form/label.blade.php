@if ($attributes->get('for'))
    <label for="{{ $for }}" class="form-label fw-semibold">{{ $slot }}</label>
@endif