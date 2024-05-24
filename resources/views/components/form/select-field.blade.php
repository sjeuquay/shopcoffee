<!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
<!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
@php
    /**
     * @author schmev91
     * TAG x-form.select-field
     * @param string $name The name of the column
     * @param array $array The array it will loop through
     * @param string $optValue the property that gonna be used as value
     * @param string $optLabel the property that gonna be used as label
     * @param string|null $default The text for inside the default value if provided
     * @param slot|null $options If this is provided, it will use this as options and won't iterate through the array
     */
@endphp

@props([
    'name' => '',
    'array' => [],
    'optValue' => 'value',
    'optLabel' => 'name',
    'value' => [],
    'default' => null,
    'options' => null,
    'required' => null,
])
@php
    if (old($name)) {
        $value = old($name);
    } elseif (empty($value)) {
        $value = '';
    }
@endphp
<label for="{{ $name }}" class="form-label mb-1">{{ $slot }}@if ($required)
        <sup class="text-danger">*</sup>
    @endif
</label>
<select name="{{ $name }}" id="{{ $name }}" class="form-select {{ $attributes['class'] }}"
    {{ $attributes->except('class') }} {{ $required ? 'required' : '' }}>
    @if ($default)
        <option value="">{{ $default }}</option>
    @endif
    @if ($options)
        {{ $options }}
    @else
        @foreach ($array as $item)
            <option value="{{ $item[$optValue] }}" {{ $value == $item[$optValue] ? 'selected' : '' }}>
                {{ $item[$optLabel] }}</option>
        @endforeach
    @endif
</select>
@error($name)
    <small class="error_holder text-danger">{{ $message }}</small>
@enderror
