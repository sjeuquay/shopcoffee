@extends('admin.layout')

@section('title', 'Order Detail List')

@section('content')
    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Quản lý order detail</div>
        {{-- <a href="{{ route('admin.orders.detail.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm order detail
        </a> --}}
    </div>

    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Order id</th>
                <th scope="col">Product id</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Phụ giá</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetail as $od)
                <tr>
                    <th scope="row">#{{ $od->id ?? 'không có dữ liệu' }}</th>
                    <td>{{ $od->order_id ?? 'không có dữ liệu' }}</td>
                    <td>{{ $od->product_id ?? 'không có dữ liệu' }}</td>
                    <td>{{ $od->quantity ?? 'không có dữ liệu' }}</td>
                    <td>{{ number_format($od->unit_price, 0, '.', '.') ?? 'không có dữ liệu' }}đ</td>
                    <td>{{ number_format($od->sub_total, 0, '.', '.') ?? 'không có dữ liệu' }}đ</td>
                    @include('admin.order.fieldStatus', ['status_id' => $od->order->status])

                    {{-- CRUD  --}}
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <div type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Detail{{$od->id}}"
                                    data-bs-targetId="1">
                                    {{-- #ten+ id  --}}
                                    Xem chi tiết
                                </div>
                            </div>
                        </div>  
                    </td>

                    <div class="modal fade" id="Detail{{$od->id}}" tabindex="-1" aria-labelledby="DetailLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-4" id="exampleModalLabel">Thông tin order
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="d-flex justify-content-between gap-2">
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="user_name" type="text"
                                                    value="{{ $od->order->user_name ?? 'không có dữ liệu' }}" readonly>
                                                    Tên người mua
                                                </x-form.text-field>
                                            </div>
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="name" type="text"
                                                    value="{{ $od->product->name ?? 'không có dữ liệu' }}" readonly>
                                                    Tên sản phẩm
                                                </x-form.text-field>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-between gap-2">
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="category_id" type="text"
                                                    value="{{ $od->product->category->name ?? 'không có dữ liệu' }}"
                                                    readonly>
                                                    Loại sản phẩm
                                                </x-form.text-field>
                                            </div>
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="unit_price" type="text"
                                                    value="{{ number_format($od->product->unit_price,0, '.', '.') ?? 'không có dữ liệu' }}" readonly>
                                                    Giá
                                                </x-form.text-field>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-between gap-2">
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="description" type="text"
                                                    value="{{ $od->product->description ?? 'không có dữ liệu' }}" readonly>
                                                    Mô tả
                                                </x-form.text-field>
                                            </div>
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="sku" type="text"
                                                    value="{{ $od->product->sku ?? 'không có dữ liệu' }}" readonly>
                                                    SKU
                                                </x-form.text-field>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between gap-2">
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="payment_id" type="text"
                                                    value="{{ $od->order->payment->type ?? 'không có dữ liệu' }}" readonly>
                                                    Phương thức thanh toán
                                                </x-form.text-field>
                                            </div>
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="deliveryMethod_id" type="text"
                                                    value="{{ $od->order->deliveryMethod->short_description ?? 'không có dữ liệu' }}"
                                                    readonly>
                                                    Phương thức vận chuyển
                                                </x-form.text-field>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between gap-2">
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="ship_first_name" type="text"
                                                    value="{{ $od->order->ship_first_name ?? 'không có dữ liệu' }}"
                                                    readonly>
                                                    ship_first_name
                                                </x-form.text-field>
                                            </div>
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="ship_last_name" type="text"
                                                    value="{{ $od->order->ship_last_name ?? 'không có dữ liệu' }}"
                                                    readonly>
                                                    ship_last_name
                                                </x-form.text-field>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between gap-2">
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="ship_address" type="text"
                                                    value="{{ $od->order->ship_address ?? 'không có dữ liệu' }}" readonly>
                                                    Thành phố
                                                </x-form.text-field>
                                            </div>
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="ship_address2" type="text"
                                                    value="{{ $od->order->ship_address2 ?? 'không có dữ liệu' }}" readonly>
                                                    ship_last_name
                                                </x-form.text-field>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between gap-2">
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="city" type="text"
                                                    value="{{ $od->order->city ?? 'không có dữ liệu' }}" readonly>
                                                    Thành phố
                                                </x-form.text-field>
                                            </div>
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="state" type="text"
                                                    value="{{ $od->order->state ?? ('không có dữ liệu' ?? 'không có dữ liệu') }}"
                                                    readonly>
                                                    Tiểu bang
                                                </x-form.text-field>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between gap-2">
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="zip" type="text"
                                                    value="{{ $od->order->zip ?? 'không có dữ liệu' }}" readonly>
                                                    Zip
                                                </x-form.text-field>
                                            </div>
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="phone" type="text"
                                                    value="{{ $od->order->phone ?? 'không có dữ liệu' }}" readonly>
                                                    Số điện thoại
                                                </x-form.text-field>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between gap-2">
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="email" type="text"
                                                    value="{{ $od->order->email ?? 'không có dữ liệu' }}" readonly>
                                                    Email
                                                </x-form.text-field>
                                            </div>
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="customer_special_notes" type="textarea"
                                                    value="{{ $od->order->customer_special_notes ?? 'không có dữ liệu' }}"
                                                    readonly>
                                                    customer_special_notes
                                                </x-form.text-field>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between gap-2">
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="internal_notes" type="text"
                                                    value="{{ $od->order->internal_notes ?? 'không có dữ liệu' }}"
                                                    readonly>
                                                    Internal_notes
                                                </x-form.text-field>
                                            </div>
                                            <div class="mb-3 flex-fill">
                                                <x-form.text-field name="status_id" type="textarea"
                                                    value="{{ $od->order->status->description ?? 'không có dữ liệu' }}"
                                                    readonly>
                                                    Trạng thái
                                                </x-form.text-field>
                                            </div>
                                        </div>
                                        <x-form.text-field name="	customer_special_notes" type="text"
                                            value="{{ $od->order->customer_special_notes ?? 'không có dữ liệu' }}"
                                            readonly>
                                            Ghi chú
                                        </x-form.text-field>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
        </tbody>
    </table>
    @php
    @endphp

{{-- 
    <x-form.modal-interactive :arr='$orderDetail'>

    </x-form.modal-interactive> --}}


@endsection
