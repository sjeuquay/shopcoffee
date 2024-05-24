@extends('admin.layout')

@section('title', 'Cài đặt cửa hàng')

@section('content')
    {{-- START - CONTENT HEADER --}}
    <x-layout.list-header targetModal="StoreSetting_form">
        <x-slot name='title'>Cài đặt cửa hàng</x-slot>
    </x-layout.list-header>
    {{-- END - CONTENT HEADER --}}

    {{-- START - CONTENT BODY --}}
    <table class="table table-responsive table-bordered table-light align-middle text-center mt-3">
        <thead>
            <tr class="table-secondary align-middle">
                <th>ID</th>
                <th>Định danh quá trình</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $s)
                <tr class="table_row">
                    <td>{{ $s->id }}</td>
                    <td hi-process_identifier>{{ $s->process_identifier }}</td>
                    <td hi-stastus_id='{{ $s->stastus_id }}'>{{ $s->stastus_id ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn-open_edit btn p-1 btn-info shadow-none"
                                targetId="{{ $s->id }}">Sửa</button>
                            <button data-bs-toggle="modal" data-bs-target="#confirm-delete_StoreSetting"
                                data-bs-deleteId="{{ $s->id }}" class="btn p-1 btn-danger shadow-none">Xóa</button>
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
        $name_array = ['process_identifier', 'stastus_id'];
    @endphp
    <x-form.hyper-interactive id="StoreSetting_form" :name-array='$name_array'>
        <x-slot name='titleStore'>Thêm cài đặt mới</x-slot>
        <x-slot name='titleUpdate'>Cập nhật cài đặt</x-slot>
        <x-slot name='actionStore'>{{ route('admin.setting.storesetting.store') }}</x-slot>
        <x-slot name='actionUpdate'>{{ route('admin.setting.storesetting.update', '') }}</x-slot>

        {{-- process_identifier --}}
        <div class="mb-3">
            <x-form.text-field name="process_identifier" maxlength='30' required>
                Định danh quá trình
            </x-form.text-field>
        </div>
        {{-- status_id --}}
        <div class="mb-3">
            <x-form.select-field name='stastus_id' optValue='id' optLabel='description'
                required>
                Trạng thái
                <x-slot name="options">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </x-slot>
            </x-form.select-field>
        </div>
    </x-form.hyper-interactive>

    {{-- END - HYPER INTERACTIVE MODAL --}}


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete_StoreSetting" method="delete"
        action="{{ route('admin.setting.storesetting.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa cài đặt cửa hàng này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}

@endsection
