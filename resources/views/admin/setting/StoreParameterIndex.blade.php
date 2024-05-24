@extends('admin.layout')

@section('title', 'Tham số cửa hàng')

@section('content')
    {{-- START - CONTENT HEADER --}}
    <x-layout.list-header targetModal="StoreParameter_form">
        <x-slot name='title'>Tham số cửa hàng</x-slot>
    </x-layout.list-header>
    {{-- END - CONTENT HEADER --}}

    {{-- START - CONTENT BODY --}}
    <table class="table table-responsive table-bordered table-light align-middle text-center mt-3">
        <thead>
            <tr class="table-secondary align-middle">
                <th>ID</th>
                <th>Tên tham số</th>
                <th>Giá trị</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $s)
                <tr class="table_row">
                    <td>{{ $s->id }}</td>
                    <td hi-parameter_name>{{ $s->parameter_name }}</td>
                    <td hi-value>{{ $s->value }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn-open_edit btn p-1 btn-info shadow-none"
                                targetId="{{ $s->id }}">Sửa</button>
                            <button data-bs-toggle="modal" data-bs-target="#confirm-delete_StoreParameter"
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
        $name_array = ['parameter_name', 'value'];
    @endphp
    <x-form.hyper-interactive id="StoreParameter_form" :name-array='$name_array'>
        <x-slot name='titleStore'>Thêm tham số mới</x-slot>
        <x-slot name='titleUpdate'>Cập nhật tham số</x-slot>
        <x-slot name='actionStore'>{{ route('admin.setting.storeparameter.store') }}</x-slot>
        <x-slot name='actionUpdate'>{{ route('admin.setting.storeparameter.update', '') }}</x-slot>

        {{-- storeparameter --}}
        <div class="mb-3">
            <x-form.text-field name="parameter_name" maxlength='50' required>
                Tên tham số
            </x-form.text-field>
        </div>
        {{-- LANGUAGE --}}
        <div class="mb-3">
            <x-form.text-field name="value" maxlength="20" required>
                Giá trị
            </x-form.text-field>
        </div>
    </x-form.hyper-interactive>

    {{-- END - HYPER INTERACTIVE MODAL --}}


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete_StoreParameter" method="delete"
        action="{{ route('admin.setting.storeparameter.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa tham số này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}

@endsection
