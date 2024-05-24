<h3>Hãng thiết bị</h3>
<div class="flex-grow-1 d-flex flex-column justify-content-between">
    <div class="info-container d-flex flex-column gap-2">
        {{-- branch_name --}}
        <div class="info-field fs-5 d-flex gap-3 align-items-end">
            <small class="fw-medium">Tên hãng:</small>
            <span class="text-dark">{{ $e->branch->branch_name }}</span>
        </div>
        {{-- status_relate->description --}}
        <div class="info-field fs-5 d-flex gap-3 align-items-end">
            <small class="fw-medium">Trạng thái:</small>
            <small
                class="text-bg-secondary text-uppercase px-1 rounded-2">{{ $e->branch->status }}</small>
        </div>
        {{-- rent_price --}}
        <div class="info-field fs-5 d-flex gap-3 align-items-end">
            <small class="fw-medium">Giá thuê:</small>
            <span class="text-dark">{{ number_format($e->branch->rent_price, 2, '.', ',') }}<sup>₫</sup></span>
        </div>
        {{-- date_manufacture --}}
        <div class="info-field fs-5 d-flex gap-3 align-items-end">
            <small class="fw-medium">Ngày sản xuất:</small>
            <span class="text-dark">{{ optional($e->branch->date_manufacture)->toDateString() ?? 'Trống' }}</span>
        </div>
        {{-- desciption --}}
        <div class="info-field">
            <span class="fs-5 d-flex justify-content-between">
                <small class="fw-medium text-nowrap">Mô tả :</small>
                <button class="toggle-lineclamp btn p-0" lineclamp-target-id="branch_description">
                    <sub>
                        <i class="bi bi-eye"></i>
                        <span>hiển thị</span>
                    </sub>
                </button>
            </span>
            <span id="branch_description" class="text-secondary line-clamp-2">{{ $e->branch->description }}</span>
        </div>
    </div>
    <div class="d-flex justify-content-end pt-3 h-fit mt-auto">
        <sub class="text-muted">Lần cuối cập nhật: {{ $e->branch->updated_time }}</sub>
    </div>
</div>
