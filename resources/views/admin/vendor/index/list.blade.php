@foreach ($list as $v)
    @php
        $url = route("admin.vendor.show", ["vendor" => $v->id]);
        $cleanedString = preg_replace('/[^a-zA-Z0-9_$]/', "", $v->id);

        if (preg_match("/^\d/", $cleanedString)) {
            $cleanedString = "_" . $cleanedString;
        }
    @endphp

    <x-layout.collapsible-item :routeUrl="$url" :itemName="$cleanedString">
        <x-slot name="label">
            <div class="d-flex gap-2">
                <img
                    class="w-px-50 h-px-50 object-fit-cover rounded-circle"
                    src="{{ asset($v->logo) }}"
                    alt=""
                />
                <div class="text-start">
                    <h4 class="m-0">{{ $v->display_name }}</h4>
                    <small
                        class="vendor_compact_status w-fit p-1 rounded-2 text-bg-secondary"
                    >
                        {{ $v->status->description }}
                    </small>
                </div>
            </div>
        </x-slot>
        <x-slot name="content">
            <div
                class="d-flex w-75 mx-auto justify-content-between gap-5 px-5 mx-5"
            >
                <div class="d-flex flex-column">
                    <div
                        class="fs-5 d-flex gap-2 justify-content-between align-items-center"
                    >
                        <small class="fw-medium">Tên chủ sở hữu:</small>
                        <span class="text-dark">
                            {{ $v->owner_last_name }}
                            {{ $v->owner_first_name }}
                        </span>
                    </div>
                    <div
                        class="fs-5 d-flex gap-2 justify-content-between align-items-center"
                    >
                        <small class="fw-medium">Loại đại lý:</small>
                        <span class="text-dark">
                            {{ $v->type->description }}
                        </span>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div
                        class="fs-5 d-flex gap-2 justify-content-between align-items-center"
                    >
                        <small class="fw-medium">Loại tiền tệ:</small>
                        <small class="text-dark">
                            {{ $v->currency->short_name }}
                        </small>
                    </div>
                    <div
                        class="fs-5 d-flex gap-2 justify-content-between align-items-center"
                    >
                        <small class="fw-medium">Ngày tham gia:</small>
                        <small class="text-dark">
                            {{ substr($v->date_joined, 0, 10) }}
                        </small>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-layout.collapsible-item>
@endforeach
