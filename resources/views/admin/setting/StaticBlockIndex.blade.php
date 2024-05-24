@extends('admin.layout')

@section('title', 'Static Blocks')

@section('content')
    {{-- START - CONTENT HEADER --}}
    <x-layout.list-header targetModal="StaticBlock_form">
        <x-slot name='title'>Static Blocks</x-slot>
    </x-layout.list-header>
    {{-- END - CONTENT HEADER --}}

    {{-- START - CONTENT BODY --}}
    <table class="table table-responsive table-bordered table-light align-middle text-center mt-3">
        <thead>
            <tr class="table-secondary align-middle">
                <th>ID</th>
                <th>Định danh</th>
                <th>Tên</th>
                <th>Nội dung</th>
                <th>Active</th>
                <th>Section</th>
                <th>Position</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $s)
                <tr class="table_row">
                    <td>{{ $s->id }}</td>
                    <td hi-identifier>{{ $s->identifier }}</td>
                    <td hi-name>{{ $s->name }}</td>
                    <td hi-content>{{ $s->content }}</td>
                    <td hi-active="{{ $s->active }}">{{ $s->active }}</td>
                    <td hi-section>{{ $s->section }}</td>
                    <td hi-position="{{ !isset($s->position) ? '' : ($s->position == 1 ? '1' : '0') }}">
                        {{ !isset($s->position) ? '' : ($s->position == 1 ? 'true' : 'false') }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn-open_edit btn p-1 btn-info shadow-none"
                                targetId="{{ $s->id }}">Sửa</button>
                            <button data-bs-toggle="modal" data-bs-target="#confirm-delete_StaticBlock"
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
        $name_array = ['identifier', 'name', 'content', 'active', 'section', 'position'];
    @endphp
    <x-form.hyper-interactive id="StaticBlock_form" :name-array='$name_array' fullscreen='true'>
        <x-slot name='titleStore'>Thêm static block</x-slot>
        <x-slot name='titleUpdate'>Cập nhật static block</x-slot>
        <x-slot name='actionStore'>{{ route('admin.setting.staticblock.store') }}</x-slot>
        <x-slot name='actionUpdate'>{{ route('admin.setting.staticblock.update', '') }}</x-slot>

        {{-- identifier --}}
        <div class="mb-3">
            <x-form.text-field name="identifier" placeholder='optional' maxlength='20'>
                Định danh
            </x-form.text-field>
        </div>

        {{-- name --}}
        <div class="mb-3">
            <x-form.text-field name="name" maxlength='50' required>
                Tên
            </x-form.text-field>
        </div>

        {{-- content --}}
        <div class="mb-3">
            <x-form.textarea name="content" required>
                Nội dung
            </x-form.textarea>
        </div>

        {{-- section --}}
        <div class="mb-3">
            <x-form.textarea name="section" maxlength='255'>
                Section
            </x-form.textarea>
        </div>

        {{-- active --}}
        <div class="mb-3">
            <x-form.select-field name='active' required>
                Active
                <x-slot name='options'>
                    <option>disable</option>
                    <option>enable</option>
                </x-slot>
            </x-form.select-field>
        </div>

        {{-- position --}}
        <div class="mb-3">
            <x-form.select-field name='position' default='optional'>
                Position
                <x-slot name='options'>
                    <option value="0">false</option>
                    <option value="1">true</option>
                </x-slot>
            </x-form.select-field>
        </div>
    </x-form.hyper-interactive>

    {{-- END - HYPER INTERACTIVE MODAL --}}


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete_StaticBlock" method="delete"
        action="{{ route('admin.setting.staticblock.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa cài đặt cửa hàng này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}

@endsection
