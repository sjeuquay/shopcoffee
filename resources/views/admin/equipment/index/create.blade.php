<form id="create_equipment-modal" action="{{ route('admin.equipment.store') }}" method="POST" class="modal fade"
    tabindex="-1">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">
                    Thêm thiết bị
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                {{-- START - CREATE EQUIPMENT FORM --}}
                <div class="mb-3">
                    <x-form.text-field name="name" maxlength="50" required>
                        Tên thiết bị
                    </x-form.text-field>
                </div>
                <div class="mb-3 row gx-2">
                    {{-- vendor_id --}}
                    <div class="col">
                        <x-form.select-field name="vendor_id" :array="$vendor_list" optValue="id" optLabel="display_name"
                            default="Chọn đại lý ( optional )">
                            Đại lý
                        </x-form.select-field>
                    </div>
                    {{-- branch_id --}}
                    <div class="col">
                        <x-form.select-field name="branch_id" :array="$branch_list" optValue="id" optLabel="branch_name"
                            default='Chọn hãng' required>
                            Hãng thiết bị
                        </x-form.select-field>
                    </div>
                </div>
                {{-- serial_number --}}
                <div class="mb-3">
                    <x-form.text-field name="serial_number" maxlength="50" required>
                        Số sêri
                    </x-form.text-field>
                </div>

                <div class="mb-3 row gx-2">
                    {{-- status_id --}}
                    <div class="col">
                        <x-form.select-field name="status_code" :array="$status_list" optValue="status_code" optLabel="description" required>
                            Trạng thái
                        </x-form.select-field>
                    </div>
                    {{-- total_time_used --}}
                    <div class="col">
                        <x-form.text-field name="total_time_used" type="number" step="0.1" required>
                            Tổng thời gian sử dụng
                        </x-form.text-field>
                    </div>
                </div>
                {{-- description --}}
                <div class="mb-3">
                    <x-form.textarea name="description" maxlength="200" rows="3" required>
                        Mô tả
                    </x-form.textarea>
                </div>

                <div class="mb-3">
                    <x-form.text-field name="commission_time" type="datetime-local" required>
                        Thời gian tính phí
                    </x-form.text-field>
                </div>
                <div class="mb-3">
                    <x-form.text-field name="decommision_time" type="datetime-local">
                        Thời gian ngừng hoạt động ( optional )
                    </x-form.text-field>
                </div>

                {{-- END - CREATE EQUIPMENT FORM --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Đóng
                </button>
                <button type="submit" class="btn btn-info">Lưu</button>
            </div>
        </div>
    </div>
</form>

<script type="module">
    const createForm = document.getElementById("create_equipment-modal");
    const createModal = new bootstrap.Modal(createForm);

    // SHOW THE MODAL IF THERE IS ERROR
    if ("{{ $errors->any() }}") {
        createModal.show();
    }
</script>
