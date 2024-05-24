<div class="d-flex gap-2">
    <img
        class="w-px-75 h-px-75 rounded-circle object-fit-cover"
        src="{{ asset($v->logo) }}"
        alt=""
    />
    <div class="vendor-label d-flex flex-column gap-2">
        <h3 class="m-0">{{ $v->title }}</h3>
    </div>
</div>

<div class="vendor-info mt-3 d-flex flex-column gap-1">
    <x-layout.info-pair name="Tên hiển thị" :value="$v->display_name" />
    <x-layout.info-pair
        name="Họ tên chủ sở hữu"
        :value="implode(' ', [$v->owner_last_name, $v->owner_first_name])"
    />
    <x-layout.info-pair name="Loại" :value="$v->type->description" />
    <x-layout.info-pair name="Mã số tài khoản" :value="$v->account_number" />
    <x-layout.info-pair
        name="Trạng thái"
        :value="$v->status->description"
        class="text-bg-secondary px-1 rounded-2 text-white fs-6"
    />

    <x-layout.info-pair
        name="Tiền tệ sử dụng"
        :value="$v->currency->short_name"
    />
    <div class="d-flex gap-3">
        <x-layout.info-pair
            name="Ngày nhập"
            :value="$v->date_joined->format('d-m-Y')"
            class="text-muted fs-6"
        />
        @if ($v->date_exit)
            <x-layout.info-pair
                name="Ngày thoát"
                :value="$v->date_exit->format('d-m-Y')"
                class="text-muted fs-6"
            />
        @endif
    </div>

    @if ($v->updated_time)
        <div class="d-flex justify-content-end pt-3">
            <sub class="text-muted">
                Lần cuối cập nhật: {{ $v->updated_time }}
            </sub>
        </div>
    @endif
</div>
