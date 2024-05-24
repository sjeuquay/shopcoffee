<form id="edit_equipment-modal" action="{{ route('admin.equipment.update', $e->serial_number) }}" method="POST"
    class="modal fade" tabindex="-1">
    @method('PUT') @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">
                    Chỉnh sửa thiết bị {{ $e->name }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                {{-- START - EDIT EQUIPMENT FORM --}} {{-- name --}}
                <div class="mb-3">
                    <x-form.text-field name="name" :value="$e->name" maxlength="50" required>
                        Tên thiết bị
                    </x-form.text-field>
                </div>
                <div class="mb-3 row gx-2">
                    {{-- vendor_id --}}
                    <div class="col">
                        <x-form.select-field name="vendor_id" :array="$vendor_list" optValue="id" optLabel="display_name"
                            default="Chưa có" :value="$e->vendor_id">
                            Đại lý
                        </x-form.select-field>
                    </div>
                    {{-- branch_id --}}
                    <div class="col">
                        <x-form.select-field name="branch_id" :array="$branch_list" optValue="id" optLabel="branch_name"
                            :value="$e->branch->id" required>
                            Hãng thiết bị
                        </x-form.select-field>
                    </div>
                </div>
                {{-- serial_number --}}
                <div class="mb-3">
                    <x-form.text-field name="serial_number" :value="$e->serial_number" maxlength="50" required>
                        Số sêri
                    </x-form.text-field>
                </div>

                <div class="mb-3 row gx-2">
                    {{-- status_code --}}
                    <div class="col">
                        <x-form.select-field name="status_code" :value="$e->status_code" :array="$status_list" optValue="status_code"
                            optLabel="description" required>
                            Trạng thái
                        </x-form.select-field>
                    </div>
                    {{-- total_time_used --}}
                    <div class="col">
                        <x-form.text-field name="total_time_used" :value="$e->total_time_used" type="number" step="0.1"
                            required>
                            Tổng thời gian sử dụng
                        </x-form.text-field>
                    </div>
                </div>
                {{-- description --}}
                <div class="mb-3">
                    <x-form.textarea name="description" :value="$e->description" maxlength="200" rows="3" required>
                        Mô tả
                    </x-form.textarea>
                </div>

                <div class="mb-3">
                    <x-form.text-field name="commission_time" :value="$e->commission_time" type="datetime-local" required>
                        Thời gian tính phí
                    </x-form.text-field>
                </div>
                <div class="mb-3">
                    <x-form.text-field name="decommision_time" :value="$e->decommision_time" type="datetime-local">
                        Thời gian ngừng hoạt động
                    </x-form.text-field>
                </div>

                {{-- END - EDIT EQUIPMENT FORM --}}
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
    const editForm = document.getElementById("edit_equipment-modal");
    const editModal = new bootstrap.Modal(editForm);

    // SHOW THE MODAL IF THERE IS ERROR
    if ("{{ $errors->any() }}") {
        editModal.show();
    }
</script>
