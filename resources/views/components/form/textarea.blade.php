@props([
    'value' => old($attributes->get('name'), $attributes->get('value'))
])

<x-form.label :for="$attributes->get('name')" :name="$attributes->get('label')"></x-form.label>
<textarea {{ $attributes->except(['value', 'label'])->merge(['class' => 'form-control']) }}>{{ $value }}</textarea>
<x-form.error :name="$attributes->get('name')" />
