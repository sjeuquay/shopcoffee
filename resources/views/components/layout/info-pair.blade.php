@props([
    "name" => "",
    "value" => [],
    "between" => null,
])
<div
    class="fs-5 d-flex gap-3 align-items-end {{ $between ? "justify-content-between" : "" }}"
>
    <small class="fw-medium">{{ $name }}:</small>
    <span class="text-dark {{ $attributes["class"] }}">{{ $value }}</span>
</div>
