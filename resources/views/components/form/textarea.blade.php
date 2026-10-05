@if($attributes->get('label'))
<x-form.label :for="$attributes->get('name')">{{ $attributes->get('label') }}</x-form.label>
@endif
<textarea {{ $attributes->except(['value'])->merge(['class' => 'form-control bg-body-tertiary']) }}>{{ $attributes->get('value') }}</textarea>
<x-form.error :name="$attributes->get('name')" />
