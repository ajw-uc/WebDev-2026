@if($attributes->get('label'))
<x-form.label :for="$attributes->get('name')">{{ $attributes->get('label') }}</x-form.label>
@endif
<input {{ $attributes->merge(['class' => 'form-control bg-body-tertiary']) }}>
<x-form.error :name="$attributes->get('name')" />