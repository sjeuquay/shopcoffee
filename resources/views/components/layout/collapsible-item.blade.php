@php
    /**
     * TAG x-layout.collapsible-item
     *
     * @param string $routeUrl The url to the detail page of the item
     * @param string $itemName The name to use to accordion header and accordion collapse
     * @param slot $label The label part, or the compact part of the item
     * @param slot $slot The content inside the collapsed part of the item
     */
@endphp
@props([
    'routeUrl' => [],
    'itemName' => [],
])
<!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
<div class="accordion-item collapsible-container p-2 px-3 rounded-3 bg-white border border-secondary-subtle">
    <button class="accordion-header collapsed btn bg-white w-100 p-0 position-relative justify-content-between">
        {{-- COLLAPSE ICON --}}
        <div data-bs-toggle="collapse" data-bs-target="#collapsible-{{ $itemName }}"
            class="collapse-icon z-0 position-absolute bottom-0 text-center w-100 h-100 d-flex justify-content-center align-items-center">
            <div class="w-px-50">
                <div><small class="collapse-icon-close_label text-muted">mở rộng</small></div>
                <i class="bi bi-caret-up text-muted fs-5"></i>
                <div><small class="text-muted collapse-icon-open_label">đóng</small></div>
            </div>
        </div>
        {{-- LABEL --}}
        <div class="collapsible-label z-1">
            {{ $label ?? 'Collapsible Item - Label' }}
        </div>
        {{-- GO TO FULL DETAIL --}}
        <div class="show_detail-button z-1">
            <a href="{{ $routeUrl ?? '#' }}" class="btn btn-outline-primary fw-bold border-2 text-nowrap">Chi tiết</a>
        </div>
    </button>
    <div class="accordion-collapse collapse" id="collapsible-{{ $itemName }}" data-bs-parent="#accordion-parent">
        <div class="pt-1">
            <div class="accordion-body card card-body shadow-none flex-row justify-content-between align-items-center">
                <div class="flex-grow-1">
                    {{ $content ?? 'Collapsible Item - Content' }}
                </div>
            </div>
        </div>
    </div>
</div>
