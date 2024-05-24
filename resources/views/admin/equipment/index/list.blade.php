@foreach ($list as $e)
    @php
        $url = route('admin.equipment.show', ['equipment' => $e->serial_number]);
        $cleanedString = preg_replace('/[^a-zA-Z0-9_$]/', '', $e->serial_number);

        if (preg_match('/^\d/', $cleanedString)) {
            $cleanedString = '_' . $cleanedString;
        }
    @endphp
    <x-layout.collapsible-item :routeUrl="$url" :itemName="$cleanedString">
        <x-slot name='label'>
            <div class="d-flex flex-column gap-1 justify-content-start text-start">
                <h4 class="m-0"><a href="{{ $url }}" class="normal-link">{{ $e->name }}</a></h4>
                <strong class="fs-5 fw-medium">{{ $e->serial_number }}</strong>
            </div>
        </x-slot>
        <x-slot name="content">
            <div class="d-flex w-75 mx-auto justify-content-between gap-5 px-5
        mx-5">
                <div class="d-flex flex-column">
                    <div class="fs-5 d-flex gap-2 justify-content-between align-items-center">
                        <small class="fw-medium">Tên hãng:</small>
                        <span class="text-dark">{{ $e->branch->branch_name }}</span>
                    </div>
                    <div class="fs-5 d-flex gap-2 justify-content-between align-items-center">
                        <small class="fw-medium">Thời gian tính phí:</small>
                        <span class="text-dark">{{ $e->commission_time_hm }}</span>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="fs-5 d-flex gap-2 justify-content-between align-items-center">
                        <small class="fw-medium">Trạng thái:</small>
                        <small
                            class="text-bg-secondary px-1 rounded-2 text-uppercase">{{ $e->status->description }}</small>
                    </div>
                    <div class="fs-5 d-flex gap-2 justify-content-between">
                        <small class="fw-medium">Đại lý:</small>
                        <small class="text-dark">Chưa có</small>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-layout.collapsible-item>
@endforeach
