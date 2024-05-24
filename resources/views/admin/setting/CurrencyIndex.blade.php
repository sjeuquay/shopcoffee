@extends('admin.layout')

@section('title', 'Tiền tệ')

@section('content')
    {{-- START - CONTENT HEADER --}}
    <x-layout.list-header targetModal="currency_form">
        <x-slot name='title'>Tiền tệ</x-slot>
    </x-layout.list-header>
    {{-- END - CONTENT HEADER --}}

    {{-- START - CONTENT BODY --}}
    <table class="table table-responsive table-bordered table-light align-middle text-center mt-3">
        <thead>
            <tr class="table-secondary align-middle">
                <th>ID</th>
                <th>Tên ngắn</th>
                <th>Tên dài</th>
                <th>Tỉ lệ đổi với USD</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $c)
                <tr class="table_row">
                    <td>{{ $c->id }}</td>
                    <td hi-short_name>{{ $c->short_name }}</td>
                    <td hi-long_name>{{ $c->long_name }}</td>
                    <td hi-USD_exchange_rate>{{ number_format($c->USD_exchange_rate, 5) }}</td>
                    <td>
                        <div class="btn-group btn-group-sm">
                            <button class="btn-open_edit btn p-1 btn-info shadow-none"
                                targetId="{{ $c->id }}">Sửa</button>
                            <button data-bs-toggle="modal" data-bs-target="#confirm-delete_currency"
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
        $name_array = ['short_name', 'long_name', 'USD_exchange_rate'];
    @endphp
    <x-form.hyper-interactive id="currency_form" :name-array='$name_array'>
        <x-slot name='titleStore'>Thêm tiền tệ mới</x-slot>
        <x-slot name='titleUpdate'>Sửa tiền tệ</x-slot>
        <x-slot name='actionStore'>{{ route('admin.setting.currency.store') }}</x-slot>
        <x-slot name='actionUpdate'>{{ route('admin.setting.currency.update', '') }}</x-slot>

        {{-- SHORT NAME --}}
        <div class="mb-3">
            <x-form.text-field name="short_name" maxlength="5">
                Tên ngắn
            </x-form.text-field>
        </div>
        {{-- LONG NAME --}}
        <div class="mb-3">
            <x-form.text-field name="long_name" maxlength="50">
                Tên dài
            </x-form.text-field>
        </div>
        {{-- USD EXCHANGE RATE --}}
        <div class="mb-3">
            <x-form.text-field name="USD_exchange_rate" type="number" step="0.00001">
                Tỉ lệ chuyển đổi USD
            </x-form.text-field>
        </div>
    </x-form.hyper-interactive>

    {{-- END - HYPER INTERACTIVE MODAL --}}


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete_currency" method="delete"
        action="{{ route('admin.setting.currency.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa tiền tệ này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}

@endsection
