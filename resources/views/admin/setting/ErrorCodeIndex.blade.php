@extends('admin.layout')

@section('title', 'Controller Error Code')

@section('content')
    {{-- START - CONTENT HEADER --}}
    <x-layout.list-header target-modal="ErrorCode_form">
        <x-slot name='title'>Controller Error Code</x-slot>
    </x-layout.list-header>
    {{-- END - CONTENT HEADER --}}

    {{-- START - CONTENT BODY --}}
    <table class="table table-responsive table-bordered table-light align-middle text-center mt-3">
        <thead>
            <tr class="table-secondary align-middle">
                <th>ID</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $c)
                <tr class="table_row">
                    <td hi-id>{{ $c->id }}</td>
                    <td hi-description class="text-start">{{ $c->description }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn-open_edit btn p-1 btn-info shadow-none"
                                targetId="{{ $c->id }}">Sửa</button>
                            <button data-bs-toggle="modal" data-bs-target="#confirm-delete_ErrorCode"
                                data-bs-deleteId="{{ $c->id }}" class="btn p-1 btn-danger shadow-none">Xóa</button>
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
        $name_array = ['id', 'description'];
    @endphp
    <x-form.hyper-interactive id="ErrorCode_form" :nameArray="$name_array">
        <x-slot name='actionStore'>{{ route('admin.setting.errorcode.store') }}</x-slot>
        <x-slot name='actionUpdate'>{{ route('admin.setting.errorcode.update', '') }}</x-slot>
        <x-slot name='titleStore'>Thêm mã lỗi mới</x-slot>
        <x-slot name='titleUpdate'>Cập nhật mã lỗi</x-slot>

        <x-form.text-field name="id" maxlength='10' required>
            ID
        </x-form.text-field>
        <x-form.text-field name="description" maxlength='100' required>
            Mô tả
        </x-form.text-field>
    </x-form.hyper-interactive>
    {{-- END - HYPER INTERACTIVE MODAL --}}


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete_ErrorCode" method="delete"
        action="{{ route('admin.setting.errorcode.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa mã lỗi này
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}

@endsection
