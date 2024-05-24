<form
    id="edit_vendor-modal"
    action="{{ route("admin.vendor.update", $v->id) }}"
    method="POST"
    class="modal fade"
    tabindex="-1"
    enctype="multipart/form-data"
>
    @csrf
    @method("PUT")
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Chỉnh sửa thông tin đại lý</h1>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                ></button>
            </div>
            <div class="modal-body">
                {{-- START - CREATE EQUIPMENT FORM --}}

                {{-- title --}}
                <div class="mb-3">
                    <x-form.text-field
                        name="title"
                        maxlength="50"
                        required
                        :value="$v->title"
                    >
                        Tên đại lý
                    </x-form.text-field>
                </div>

                <div class="row mb-3 gx-2">
                    {{-- display_name --}}
                    <div class="col">
                        <x-form.text-field
                            name="display_name"
                            maxlength="50"
                            required
                            :value="$v->display_name"
                        >
                            Tên hiển thị
                        </x-form.text-field>
                    </div>

                    {{-- currency_id --}}
                    <div class="col">
                        <x-form.select-field
                            name="currency_id"
                            :array="$currency_list"
                            optValue="id"
                            optLabel="short_name"
                            required
                            :value="$v->currency_id"
                        >
                            Loại tiền tệ
                        </x-form.select-field>
                    </div>
                </div>

                <div class="row mb-3 gx-2">
                    {{-- owner_first_name --}}
                    <div class="col">
                        <x-form.text-field
                            name="owner_last_name"
                            maxlength="50"
                            required
                            :value="$v->owner_last_name"
                        >
                            Tên chủ sở hữu
                        </x-form.text-field>
                    </div>

                    {{-- owner_last_name --}}
                    <div class="col">
                        <x-form.text-field
                            name="owner_first_name"
                            maxlength="20"
                            required
                            :value="$v->owner_first_name"
                        >
                            Họ chủ sở hữu
                        </x-form.text-field>
                    </div>
                </div>

                {{-- account_number --}}
                <div class="mb-3">
                    <x-form.text-field
                        name="account_number"
                        maxlength="20"
                        required
                        :value="$v->account_number"
                    >
                        Mã số tài khoản
                    </x-form.text-field>
                </div>

                <div class="row mb-3 gx-2">
                    {{-- type_id --}}
                    <div class="col">
                        <x-form.select-field
                            name="type_id"
                            :array="$type_list"
                            optValue="id"
                            optLabel="description"
                            required
                            :value="$v->type_id"
                        >
                            Loại đại lý
                        </x-form.select-field>
                    </div>

                    {{-- status_id --}}
                    <div class="col">
                        <x-form.select-field
                            name="status_code"
                            :array="$status_list"
                            optValue="status_code"
                            optLabel="description"
                            default="Chọn trạng thái"
                            required
                            :value="$v->status_code"
                        >
                            Trạng thái
                        </x-form.select-field>
                    </div>
                </div>

                {{-- logo --}}
                <label for="vendor_logo">Logo</label>
                <div class="pt-2 d-flex gap-3">
                    <label for="vendor_logo" class="cursor-pointer">
                        <img
                            id="uploaded_avatar-labelImg"
                            class="rounded-circle w-px-75 h-px-75 object-fit-cover"
                            src="{{ asset($v->logo) }}"
                            alt=""
                        />
                    </label>
                    <span class="flex-grow-1">
                        <input
                            id="vendor_logo"
                            name="logo"
                            type="file"
                            class="form-control"
                        />
                        @error("logo")
                            <small class="error_holder text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </span>
                </div>

                {{-- END - CREATE EQUIPMENT FORM --}}
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Đóng
                </button>
                <button type="submit" class="btn btn-info">Lưu</button>
            </div>
        </div>
    </div>
</form>

<script type="module">
    const createForm = document.getElementById('update_vendor-modal');
    const createModal = new bootstrap.Modal(createForm);

    // SHOW THE MODAL IF THERE IS ERROR
    if ('{{ $errors->any() }}') {
        createModal.show();
    }

    const uploadInput = document.getElementById('vendor_logo');
    const uploadedAvatar = document.getElementById('uploaded_avatar-labelImg');

    uploadInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function (e) {
            uploadedAvatar.setAttribute('src', e.target.result);
        };

        reader.readAsDataURL(file);
    });
</script>
