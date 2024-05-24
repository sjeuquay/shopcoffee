@extends('admin.layout')
@section('title', 'Sửa Quyền')
@section('content')
    <style>
        .form-RolePermission .input-group {
            width: 30% !important;
        }

        .form-RolePermission .input-group input {
            margin-right: 5px;
        }

        .disabled {
            text-decoration: line-through;
        }
    </style>

    <a href="{{ route('admin.user.rolePermission.index') }}">Quay lại</a>
    <div class="container">
        <header class="header d-flex justify-content-between">
            <div class="fs-4">Role Permission {{ $rolePermission->id }}</div>
        </header>
        <hr>

        <div @class(['bg-light shadow p-3 bg-body-tertiary rounded'])>
            <div class="fs-6">Admin Form</div>
            <hr>
            <form action="{{ route('admin.user.rolePermission.update', $rolePermission->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-RolePermission d-flex flex-wrap">
                    <div class="input-group">
                        <input type="checkbox" name="limit_access" id="limit_access" onchange="toggleAccess()">
                        <label for="limit_access">Limit
                            access</label>
                    </div>
                    <div class="input-group">
                        <input type="checkbox" name="can_create_m_staff" id="can_create_m_staff"
                            aria-label="editPermission">
                        <label for="can_create_m_staff" aria-label="editPermission">Có thể tạo người quản lý nhân
                            viên</label>
                    </div>
                    <div class="input-group">
                        <input type="checkbox" name="can_create_v_owner" id="can_create_v_owner"
                            aria-label="editPermission">
                        <label for="can_create_v_owner" aria-label="editPermission">Có
                            thể tạo người
                            bán</label>
                    </div>
                    <div class="input-group">
                        <input type="checkbox" name="can_create_v_staff" id="can_create_v_staff"
                            aria-label="editPermission">
                        <label for="can_create_v_staff" aria-label="editPermission">Có thể tạo nhân viên
                        </label>
                    </div>
                    <div class="input-group">
                        <input type="checkbox" name="can_approve_m_staff" id="can_approve_m_staff"
                            aria-label="editPermission">
                        <label for="can_approve_m_staff" aria-label="editPermission">Có
                            thể phê duyệt người
                            quản lý nhân viên</label>
                    </div>
                    <div class="input-group">
                        <input type="checkbox" name="can_approve_v_owner" id="can_approve_v_owner"
                            aria-label="editPermission">
                        <label for="can_approve_v_owner" aria-label="editPermission">Có
                            thể phê duyệt người
                            bán</label>
                    </div>
                    <div class="input-group">
                        <input type="checkbox" name="can_approve_v_staff" id="can_approve_v_staff"
                            aria-label="editPermission">
                        <label for="can_approve_v_staff" aria-label="editPermission">Có
                            thể phê duyệt nhân
                            viên</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary me-2 mb-4">Lưu</button>
            </form>
        </div>
    </div>
    <script>
        function toggleAccess(role) {
            var limitAccessCheckbox = document.getElementById('limit_access');
            var checkboxes = document.querySelectorAll(`input[aria-label~="editPermission"]`);
            var labels = document.querySelectorAll(`label[aria-label~="editPermission"]`);
            var input = document.querySelectorAll(`input[aria-label~="editPermission"]`);

            for (let i = 0; i < checkboxes.length; i++) {
                checkboxes[i].disabled = limitAccessCheckbox.checked;
                if (limitAccessCheckbox.checked) {
                    input[i].checked = !limitAccessCheckbox.checked;
                    labels[i].classList.add('disabled');
                } else {
                    labels[i].classList.remove('disabled');
                }
            }
        }
    </script>
@endsection
