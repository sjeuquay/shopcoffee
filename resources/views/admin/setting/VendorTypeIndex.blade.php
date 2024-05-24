@extends('admin.layout')

@section('title', 'Loại đại lý')

@section('content')
    {{-- START - CONTENT HEADER --}}
    <x-layout.list-header target-modal="VendorType_form">
        <x-slot name='title'>Loại đại lý</x-slot>
    </x-layout.list-header>
    {{-- END - CONTENT HEADER --}}

    {{-- START - CONTENT BODY --}}
    <table class="table table-responsive table-bordered table-light align-middle text-center mt-3">
        <thead>
            <tr class="table-secondary align-middle">
                <th>ID</th>
                <th>Mô tả</th>
                <th>Mô tả dài</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $v)
                <tr class="table_row">
                    <td>{{ $v->id }}</td>
                    <td hi-description class="text-start">{{ $v->description }}</td>
                    <td hi-long_description class="text-start">{{ $v->long_description }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn-open_edit btn p-1 btn-info shadow-none"
                                targetId="{{ $v->id }}">Sửa</button>
                            <button data-bs-toggle="modal" data-bs-target="#confirm-delete_VendorType"
                                data-bs-deleteId="{{ $v->id }}" class="btn p-1 btn-danger shadow-none">Xóa</button>
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
        $name_array = ['description', 'long_description'];
    @endphp
    <x-form.hyper-interactive id="VendorType_form" :nameArray="$name_array">
        <x-slot name='actionStore'>{{ route('admin.setting.vendortype.store') }}</x-slot>
        <x-slot name='actionUpdate'>{{ route('admin.setting.vendortype.update', '') }}</x-slot>
        <x-slot name='titleStore'>Thêm loại đại lý mới</x-slot>
        <x-slot name='titleUpdate'>Cập nhật loại đại lý</x-slot>

        <x-form.text-field name="description" maxlength='50' required>
            Mô tả
        </x-form.text-field>
        <x-form.text-field name="long_description" maxlength='200'>
            Mô tả dài
        </x-form.text-field>
    </x-form.hyper-interactive>
    {{-- END - HYPER INTERACTIVE MODAL --}}


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete_VendorType" method="delete"
        action="{{ route('admin.setting.vendortype.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa loại đại lý này
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}

@endsection
