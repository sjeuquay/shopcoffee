{{-- tag x-layout.return-button --}}
{{-- THIS BUTTON RETURN TO PREVIOUS PAGE THE USER WAS AT --}}

@props([
    "fallback" => "/",
])
@php
    $returnURL = redirect()
        ->back()
        ->getTargetUrl();
    if ($returnURL == url()->current()) {
        $returnURL = $fallback;
    }
@endphp

<a href="{{ $returnURL }}" class="btn btn-primary py-1 px-2 me-3">
    Quay lại
    <i class="ms-1 bi bi-arrow-return-left"></i>
</a>
