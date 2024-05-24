@extends('admin.layout')

@section('title', 'Mã quốc gia')

@section('content')
    {{-- START - CONTENT HEADER --}}
    <x-layout.list-header targetModal="countryCode_form">
        <x-slot name='title'>Mã quốc gia</x-slot>
    </x-layout.list-header>
    {{-- END - CONTENT HEADER --}}

    {{-- START - CONTENT BODY --}}
    <table class="table table-responsive table-bordered table-light align-middle text-center mt-3">
        <thead>
            <tr class="table-secondary align-middle">
                <th>Mã số</th>
                <th>Ngôn ngữ</th>
                <th>Tên ngắn</th>
                <th>Tên đầy đủ</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $c)
                <tr class="table_row">
                    <td hi-code>{{ $c->code }}</td>
                    <td hi-language>{{ $c->language }}</td>
                    <td hi-short_name>{{ $c->short_name }}</td>
                    <td hi-full_name>{{ $c->full_name }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn-open_edit btn p-1 btn-info shadow-none"
                                targetId="{{ $c->code }}">Sửa</button>
                            <button data-bs-toggle="modal" data-bs-target="#confirm-delete_countryCode"
                                data-bs-deleteId="{{ $c->code }}" class="btn p-1 btn-danger shadow-none">Xóa</button>
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
        $name_array = ['code', 'language', 'short_name', 'full_name'];
    @endphp
    <x-form.hyper-interactive id="countryCode_form" :name-array='$name_array'>
        <x-slot name='titleStore'>Thêm mã quốc gia mới</x-slot>
        <x-slot name='titleUpdate'>Cập nhật mã quốc gia</x-slot>
        <x-slot name='actionStore'>{{ route('admin.setting.countrycode.store') }}</x-slot>
        <x-slot name='actionUpdate'>{{ route('admin.setting.countrycode.update', '') }}</x-slot>

        {{-- CODE --}}
        <div class="mb-3">
            <x-form.text-field name="code" type='number' required>
                Mã số quốc gia
            </x-form.text-field>
        </div>
        {{-- LANGUAGE --}}
        <div class="mb-3">
            <x-form.text-field name="language" maxlength="20" required>
                Ngôn ngữ
            </x-form.text-field>
        </div>
        {{-- SHORT NAME --}}
        <div class="mb-3">
            <x-form.text-field name="short_name" maxlength="3" required>
                Tên ngắn
            </x-form.text-field>
        </div>
        {{-- FULL NAME --}}
        <div class="mb-3">
            <x-form.text-field name="full_name" maxlength="50" required>
                Tên đầy đủ
            </x-form.text-field>
        </div>
    </x-form.hyper-interactive>

    {{-- END - HYPER INTERACTIVE MODAL --}}


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete_countryCode" method="delete"
        action="{{ route('admin.setting.countrycode.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa mã quốc gia này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}

@endsection
