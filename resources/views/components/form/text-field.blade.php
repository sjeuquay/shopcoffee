@props([
    'name' => '',
    'type' => 'text',
    'error' => 'true',
    'edit' => '',
    'value' => [],
    'required' => null,
])
@php

    if (old($name, $edit)) {
        $value = old($name, $edit);
    } elseif (empty($value)) {
        $value = '';
    }
@endphp
<div>
    <label for="{{ $name }}" class="form-label mb-1">{{ $slot }}
        @if ($required)
            <sup class="text-danger">*</sup>
        @endif
    </label>
    <input name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" type="{{ $type }}"
        class="form-control {{ $attributes['class'] }}" {{ $attributes->except('class') }}
        {{ $required ? 'required' : '' }}>
    @if ($error === 'true')
        @error($name)
            <small class="error_holder text-danger">{{ $message }}</small>
        @enderror
    @endif
</div>
