<div class="row">
    {{-- EQUIPMENT INFO --}}
    <div class="col">
        <div class="info-container d-flex flex-column gap-2">
            <x-layout.info-pair name="Tên thiết bị" :value="$e->name" />
            <x-layout.info-pair name="Số sêri" :value="$e->serial_number" />
            <x-layout.info-pair
                name="Trạng thái"
                :value="$e->status->description"
                class="fs-6 text-bg-secondary text-white px-2 rounded-2"
            />
            <x-layout.info-pair
                name="Tổng số giờ sử dụng"
                :value="$e->total_time_used"
            />
            <x-layout.info-pair
                name="Thời gian tính phí"
                :value="$e->commission_time_hm"
            />
            <x-layout.info-pair
                name="Thời gian ngừng hoạt động"
                :value="$e->decommision_time_hm"
            />

            <div class="info-field">
                <span class="fs-5 d-flex justify-content-between">
                    <small class="fw-medium text-nowrap">Mô tả :</small>
                    {{-- UNCOMMENT TO TURN ON DESCRIPTION LINECLAMP --}}
                    <button
                        class="toggle-lineclamp btn p-0"
                        lineclamp-target-id="equipment_description"
                    >
                        <sub>
                            <i class="bi bi-eye-slash"></i>
                            <span>ẩn</span>
                        </sub>
                    </button>
                </span>
                <span id="equipment_description" class="text-secondary">
                    {{ $e->description }}
                </span>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-end pt-3">
    <sub class="text-muted">Lần cuối cập nhật: {{ $e->updated_time }}</sub>
</div>
