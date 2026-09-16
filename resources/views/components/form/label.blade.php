@if ($attributes->get('for') && $attributes->get('name'))
    <label for="{{ $for }}" class="form-label">{{ $name }}</label>
@endif