@extends("admin.layout")

@section("title", $e->serial_number)

@section("content")
    <div class="d-flex gap-2 align-items-center">
        <h2 class="m-0">Chi tiết thiết bị</h2>
        @if (session("response_message"))
            {!! session("response_message") !!}
        @endif
    </div>

    <div class="my-2 d-flex gap-2 align-items-center">
        <x-layout.return-button :fallback="route('admin.equipment.index')" />
        <button
            class="btn btn-info py-1 px-2"
            data-bs-toggle="modal"
            data-bs-target="#edit_equipment-modal"
        >
            Chỉnh sửa
            <i class="bi bi-pencil-square ms-2"></i>
        </button>
        <button
            class="btn btn-danger py-1 px-2"
            data-bs-toggle="modal"
            data-bs-target="#delete_equipment-modal"
        >
            Xóa
            <i class="bi bi-trash ms-2"></i>
        </button>
    </div>

    <div class="row me-0 gap-1 flex-column flex-lg-row">
        {{-- MAJOR ROW - START --}}
        <div class="col d-flex flex-column gap-3">
            <div
                class="p-3 bg-white rounded-3 shadow-sm d-flex flex-column justify-content-between"
            >
                @include("admin.equipment.show.vendor")
            </div>
            <div
                class="p-3 bg-white rounded-3 shadow-sm d-flex flex-column justify-content-between"
            >
                @include("admin.equipment.show.info")
            </div>
        </div>

        <div class="col-12 col-lg-5 px-0 d-flex flex-column gap-3">
            <div class="p-3 bg-white rounded-3 shadow-sm d-flex flex-column">
                @include("admin.equipment.show.branch")
            </div>
        </div>
        {{-- MAJOR ROW - END --}}
    </div>

    <div class="mt-3 p-3 bg-white rounded-3 shadow-sm">
        @include("admin.equipment.show.logs")
    </div>

    {{-- EDIT MODAL --}}
    @include("admin.equipment.show.edit")

    {{-- DELETE MODAL --}}
    <x-form.confirm-modal
        id="delete_equipment-modal"
        :action="route('admin.equipment.destroy', $e->serial_number)"
        method="DELETE"
    >
        Bạn có thực sự muốn xóa thiết bị này? Lưu ý tất cả lịch sử thiết bị cũng
        sẽ bị xóa.
    </x-form.confirm-modal>

    @vite("resources/js/admin/addon/toggle-lineClamp.js")
@endsection
