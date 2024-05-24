@extends('admin.layout')

@section('title', 'Controller Sequence')

@section('content')
    {{-- START - CONTENT HEADER --}}
    <x-layout.list-header target-modal="Sequence_form">
        <x-slot name='title'>Trình tự điều khiển</x-slot>
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
            @foreach ($list as $s)
                <tr class="table_row">
                    <td hi-id>{{ $s->id }}</td>
                    <td hi-description class="text-start">{{ $s->description }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn-open_edit btn p-1 btn-info shadow-none"
                                targetId="{{ $s->id }}">Sửa</button>
                            <button data-bs-toggle="modal" data-bs-target="#confirm-delete_Sequence"
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
        $name_array = ['id', 'description'];
    @endphp
    <x-form.hyper-interactive id="Sequence_form" :nameArray="$name_array">
        <x-slot name='actionStore'>{{ route('admin.setting.sequence.store') }}</x-slot>
        <x-slot name='actionUpdate'>{{ route('admin.setting.sequence.update', '') }}</x-slot>
        <x-slot name='titleStore'>Thêm trình tự điều khiển mới</x-slot>
        <x-slot name='titleUpdate'>Cập nhật trình tự điều khiển</x-slot>

        <x-form.text-field name="id" maxlength='5' required>
            ID
        </x-form.text-field>
        <x-form.text-field name="description" maxlength='50' required>
            Mô tả
        </x-form.text-field>
    </x-form.hyper-interactive>
    {{-- END - HYPER INTERACTIVE MODAL --}}


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete_Sequence" method="delete"
        action="{{ route('admin.setting.sequence.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa trình tự này
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}

@endsection
