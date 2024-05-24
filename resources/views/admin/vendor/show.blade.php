@extends("admin.layout")

@section("title", "Vendor Detail")

@section("content")
    <div class="d-flex gap-2 align-items-center">
        <h2 class="m-0">Chi tiết đại lý</h2>
        @if (session("response_message"))
            {!! session("response_message") !!}
        @endif
    </div>

    <div class="my-2 d-flex gap-2 align-items-center">
        <x-layout.return-button :fallback="route('admin.vendor.index')" />
        <button
            class="btn btn-info py-1 px-2"
            data-bs-toggle="modal"
            data-bs-target="#edit_vendor-modal"
        >
            Chỉnh sửa
            <i class="bi bi-pencil-square ms-2"></i>
        </button>
        <button
            class="btn btn-danger py-1 px-2"
            data-bs-toggle="modal"
            data-bs-target="#delete_vendor-modal"
        >
            Xóa
            <i class="bi bi-trash ms-2"></i>
        </button>
        <button
            class="btn btn-secondary py-1 px-2"
            data-bs-toggle="modal"
            data-bs-target="#show_owner-modal"
        >
            Chủ sỡ hữu
            <i class="bi bi-person ms-2"></i>
        </button>
    </div>

    <div class="row ms-0 gap-3">
        {{-- START - VENDOR INFO --}}
        <div class="col-4 rounded-3 bg-white p-3">
            @include("admin.vendor.show.info")
        </div>
        {{-- END - VENDOR INFO --}}

        {{-- START - EQUIPMENTS --}}
        <div class="col rounded-3 bg-white p-3">
            @include("admin.vendor.show.equipments")
        </div>
        {{-- END - EQUIPMENTS --}}
    </div>

    <div class="mt-3 rounded-3 bg-white p-3">selling locations</div>

    {{-- EDIT VENDOR MODAL --}}
    @include("admin.vendor.show.edit")

    {{-- EDIT VENDOR MODAL --}}
    @include("admin.vendor.show.owner")

    {{-- DELETE MODAL --}}
    <x-form.confirm-modal
        id="delete_vendor-modal"
        :action="route('admin.vendor.destroy', $v->id)"
        method="DELETE"
    >
        Bạn có chắc chắn muốn xóa đại lý này? Mọi thông tin liên quan sẽ bị xóa
        và không thể khôi phục.
    </x-form.confirm-modal>
@endsection
