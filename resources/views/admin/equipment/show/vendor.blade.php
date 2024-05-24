<h4 class="d-flex justify-content-between align-items-center">
    Đại lý
    @if ($e->vendor)
        <a
            href="{{ route("admin.vendor.show", $e->vendor->id) }}"
            class="fw-medium py-1 px-2 btn btn-outline-primary"
        >
            Chi tiết
        </a>
    @endif
</h4>
@if (! $e->vendor)
    <div class="text-bg-secondary px-2 rounded-3 text-center">
        Hiện chưa được thuê
    </div>
@else
    <div class="info-container">
        <div class="info-field fs-5 d-flex gap-3 align-items-start">
            <img
                src="{{ asset($e->vendor->logo) }}"
                class="w-px-50 h-px-50 rounded-circle"
                alt=""
            />
            <span class="text-dark d-flex flex-column">
                <span class="line-clamp-1" style="word-break: break-all">
                    {{ $e->vendor->display_name }}
                </span>
                <small class="text-bg-secondary px-1 rounded-2 w-fit">
                    {{ $e->vendor->status->description }}
                </small>
            </span>
        </div>
    </div>
@endif
