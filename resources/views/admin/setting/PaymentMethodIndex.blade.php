@extends('admin.layout')

@section('title', 'Payment methods')

@section('content')
    {{-- START - CONTENT HEADER --}}
    <x-layout.list-header targetModal="payment_methods_form">
        <x-slot name='title'>Phương thức thanh toán</x-slot>
    </x-layout.list-header>
    {{-- END - CONTENT HEADER --}}

    {{-- START - CONTENT BODY --}}
    <table class="table table-responsive table-bordered table-light align-middle text-center mt-3">
        <thead>
            <tr class="table-secondary align-middle">
                <th>ID</th>
                <th>Loại</th>
                <th>Mô tả ngắn</th>
                <th>Ghi chú</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $m)
                <tr class="table_row">
                    <td>{{ $m->id }}</td>
                    <td hi-type>{{ $m->type }}</td>
                    <td hi-short_description>{{ $m->short_description }}</td>
                    <td hi-special_notes>{{ $m->special_notes }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn-open_edit btn p-1 btn-info shadow-none"
                                targetId="{{ $m->id }}">Sửa</button>
                            <button data-bs-toggle="modal" data-bs-target="#confirm-delete_payment_methods"
                                data-bs-deleteId="{{ $m->id }}" class="btn p-1 btn-danger shadow-none">Xóa</button>
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


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete_payment_methods" method="delete"
        action="{{ route('admin.setting.paymentmethod.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa tiền tệ này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}


    {{-- START - HYPER INTERACTIVE MODAL --}}
    @php
        $name_array = ['type', 'short_description', 'special_notes'];
    @endphp
    <x-form.hyper-interactive id="payment_methods_form" :name-array="$name_array">
        <x-slot name='actionStore'>{{ route('admin.setting.paymentmethod.store') }}</x-slot>
        <x-slot name='actionUpdate'>{{ route('admin.setting.paymentmethod.update', '') }}</x-slot>
        <x-slot name='titleStore'>Thêm phương thức thanh toán</x-slot>
        <x-slot name='titleUpdate'>Chỉnh sửa phương thức thanh toán</x-slot>

        {{-- TYPE --}}
        <div class="mb-3">
            <x-form.text-field name='type' maxlength='50'>Tên phương thức thanh toán</x-form.text-field>
        </div>
        {{-- SHORT DESCRIPTION --}}
        <div class="mb-3">
            <x-form.text-field name='short_description' maxlength='50'>Mô tả ngắn</x-form.text-field>
        </div>
        {{-- SPECIAL NOTES --}}
        <div class="mb-3">
            <label for="specialNotes" class="form-label">Ghi chú</label>
            <textarea id="special_notes" name="special_notes" class="form-control" rows="3"></textarea>
        </div>

    </x-form.hyper-interactive>

    {{-- END - HYPER INTERACTIVE MODAL --}}
@endsection
