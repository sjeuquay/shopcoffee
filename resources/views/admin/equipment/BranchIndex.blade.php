@extends('admin.layout')

@section('title', 'Hãng thiết bị')

@section('content')
    {{-- START - CONTENT HEADER --}}
    <x-layout.list-header targetModal="Branch_form">
        <x-slot name='title'>Hãng thiết bị</x-slot>
    </x-layout.list-header>
    {{-- END - CONTENT HEADER --}}

    {{-- START - CONTENT BODY --}}
    <table class="table table-responsive table-bordered table-light align-middle text-center mt-3">
        <thead>
            <tr class="table-secondary align-middle">
                <th>ID</th>
                <th>Tên hãng</th>
                <th>Mô tả</th>
                <th>Giá thuê</th>
                <th>Trạng thái</th>
                <th>Ngày sản xuất</th>
                <th>Lần cuối cập nhật</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $b)
                <tr class="table_row">
                    <td>{{ $b->id }}</td>
                    <td hi-branch_name>{{ $b->branch_name }}</td>
                    <td hi-description class="text-start w-25">{{ $b->description }}</td>
                    <td hi-rent_price>{{ $b->rent_price }}</td>
                    <td hi-status="{{ $b->status }}">{{ $b->status  }}</td>
                    <td hi-date_manufacture>{{ $b->date_manufacture ? $b->date_manufacture->format('Y-m-d') : null }}</td>
                    <td>{{ $b->updated_time }}</td>
                    <td>
                        <div class="btn-group-sm btn-group-vertical">
                            <button class="btn-open_edit btn p-1 btn-info shadow-none"
                                targetId="{{ $b->id }}">Sửa</button>
                            <button data-bs-toggle="modal" data-bs-target="#confirm-delete_Branch"
                                data-bs-deleteId="{{ $b->id }}" class="btn p-1 btn-danger shadow-none">Xóa</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link bg-secondary text-white" href="#">Trước</a></li>
            <li class="page-item"><a class="page-link bg-primary text-white" href="#">1</a></li>
            <li class="page-item"><a class="page-link bg-secondary text-white" href="#">2</a></li>
            <li class="page-item"><a class="page-link bg-secondary text-white" href="#">3</a></li>
            <li class="page-item"><a class="page-link bg-secondary text-white" href="#">Tiếp theo</a></li>
        </ul>
    </nav>
    {{-- END - CONTENT BODY --}}


    {{-- START - HYPER INTERACTIVE MODAL --}}
    @php
        $name_array = ['branch_name', 'description', 'rent_price', 'status', 'date_manufacture'];
    @endphp
    <x-form.hyper-interactive id="Branch_form" :name-array='$name_array'>
        <x-slot name='titleStore'>Thêm hãng thiết bị mới</x-slot>
        <x-slot name='titleUpdate'>Cập nhật hãng thiết bị</x-slot>
        <x-slot name='actionStore'>{{ route('admin.equipment.branch.store') }}</x-slot>
        <x-slot name='actionUpdate'>{{ route('admin.equipment.branch.update', '') }}</x-slot>

        {{-- branch_name --}}
        <div class="mb-3">
            <x-form.text-field name="branch_name" maxlength='20' required>
                Tên hãng
            </x-form.text-field>
        </div>

        {{-- description --}}
        <div class="mb-3">
            <x-form.textarea name="description" rows="3" maxlength='200' required>
                Mô tả
            </x-form.textarea>
        </div>

        {{-- rent_price --}}
        <div class="mb-3">
            <x-form.text-field name="rent_price" type='number' step='0.001' required>
                Giá thuê
            </x-form.text-field>
        </div>

        {{-- status --}}
        <div class="mb-3">
            <x-form.select-field name='status' required 
                >Trạng thái
                <x-slot name="options">
                    <option selected>Active</option>
                    <option>Inactive</option>
                </x-slot>
            </x-form.select-field>
        </div>

        {{-- date_manufacture --}}
        <div class="mb-3">
            <x-form.text-field name="date_manufacture" type="date">
                Ngày sản xuất
            </x-form.text-field>
        </div>
    </x-form.hyper-interactive>

    {{-- END - HYPER INTERACTIVE MODAL --}}


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete_Branch" method="delete"
        action="{{ route('admin.equipment.branch.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa hãng thiết bị này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}

@endsection
