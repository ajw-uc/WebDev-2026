@props([
    'value' => old($attributes->get('name'), $attributes->get('value'))
])

<x-form.label :for="$attributes->get('name')" :name="$attributes->get('label')"></x-form.label>
<input {{ $attributes->except(['value', 'label'])->merge(['class' => 'form-control', 'value' => $value]) }}>
<x-form.error :name="$attributes->get('name')" />
