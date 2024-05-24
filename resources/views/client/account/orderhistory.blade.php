@extends('client.account.layoutProfile')

@section('title', 'orderhistory')
@section('profile')
    <div class="col-sm-9 bg-body-tertiary">
        <div class="row">
            <nav>
                <div class="nav nav-tabs align-items-center" id="nav-tab" role="tablist">
                    <button class="nav-link text-dark active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all"
                        type="button" role="tab" aria-controls="nav-all" aria-selected="true">Tất cả</button>
                    <button class="nav-link text-dark" id="nav-wait-order-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-wait-order" type="button" role="tab" aria-controls="nav-wait-order"
                        aria-selected="false">Đã đặt</button>
                    <button class="nav-link text-dark" id="nav-wait-tab" data-bs-toggle="tab" data-bs-target="#nav-wait"
                        type="button" role="tab" aria-controls="nav-wait" aria-selected="false">Đang vận
                        chuyển</button>
                    <button class="nav-link text-dark" id="nav-complete-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-complete" type="button" role="tab" aria-controls="nav-complete"
                        aria-selected="false">Giao hàng thành công</button>
                    <button class="nav-link text-dark" id="nav-cancel-tab" data-bs-toggle="tab" data-bs-target="#nav-cancel"
                        type="button" role="tab" aria-controls="nav-cancel" aria-selected="false">Đã hủy</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab"
                    tabindex="0">
                    <div class="table-responsive">
                        @if (!empty($orders))
                            @foreach ($orders as $orderdetail)
                                <table class="table my-2 bg-white">
                                    <thead class="table-white">
                                        <tr class="bg-white">
                                            <th class="status-order_title" style="width:190px;max-width:190px;">
                                                Tình
                                                trạng đơn hàng</th>
                                            <th colspan="3">
                                                <div class="d-flex justify-content-end">
                                                    <i class="bi bi-car-front"></i>
                                                    @if (!empty($orderdetail->status))
                                                        @include('client.account.fliedStatus', [
                                                            'status_id' => $orderdetail->status,
                                                        ])
                                                    @else
                                                        <small class="text-body-tertiary ms-2">Chờ xử
                                                            lý</small>
                                                    @endif
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bg-white border-bottom" style="position: relative">
                                            <td style="" colspan="1"
                                                class="border-0 d-flex justify-content-center">
                                                <div class="box-img-history">
                                                    <img src="{{ asset('img/product/' . $orderdetail->OrderDetails[0]->product->internal_image_path) }}"
                                                        alt="" width="100">
                                                </div>
                                            </td>
                                            <td colspan="2" class="align-middle border-0">
                                                <div class="form-text">
                                                    <strong>{{ $orderdetail->OrderDetails[0]->product->name }}</strong>
                                                    <p class="my-0"><small class="form-text">Phân loại hàng:
                                                            {{ $orderdetail->OrderDetails[0]->product->category->name }}</small>
                                                    </p>
                                                    <p class="my-0"><small class="form-text">Size:
                                                            @if (!empty($cartitem))
                                                                {{ $cartitem[0]->size }}
                                                            @endif
                                                        </small>
                                                    </p>
                                                    <div class="form-text">
                                                        <p class="m-0">Số lượng:<span
                                                                class="ms-2">{{ $orderdetail->amount }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-danger align-middle text-end border-0">
                                                <br>
                                                <p class="text-dark">Tổng tiền: <span class="fs-5 text-success">
                                                        {{ number_format($orderdetail->payable_amount, 0, ',', '.') }}</span>
                                                    <span class="text-success">₫</span>
                                                </p>
                                            </td>
                                            <td class="position-absolute p-0 toggle-details border-0"
                                                style="bottom: 0; right: 0; cursor: pointer;margin-right:10px;">
                                                <button type="button" class="btn-detail"
                                                    data-bs-target="#exampleModal{{ $orderdetail->id }}"
                                                    data-bs-toggle="modal"
                                                    style="outline: none; background-color: transparent; border: none; color: var(--text-color); font-size: 13px;">
                                                    chi tiết
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="exampleModal{{ $orderdetail->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="max-width: 1200px">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="orderDetailsModalLabel">Chi tiết
                                                    đơn hàng</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-8">
                                                        <div class="p-2 px-3 border border-1"
                                                            style="background-color:rgb(159 159 159 / 4%);">
                                                            <div class="d-flex justify-content-between">
                                                                <div class="d-flex flex-column">
                                                                    <span style="font-size: 14px">Đơn hàng:
                                                                        <span
                                                                            class="text-primary">{{ $orderdetail->id }}</span></span>
                                                                    <span
                                                                        style="font-size: 13px;color:#0000007e;">{{ $orderdetail->date_created }}</span>
                                                                </div>
                                                                <div class="d-flex align-items-center">
                                                                    <span class="">
                                                                        @if (!empty($orderdetail->status))
                                                                            @include(
                                                                                'client.account.fliedStatus',
                                                                                [
                                                                                    'status_id' =>
                                                                                        $orderdetail->status,
                                                                                ]
                                                                            )
                                                                        @else
                                                                            <small class="text-body-tertiary ms-2">Chờ xử
                                                                                lý</small>
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="my-4">
                                                            <div class="row">
                                                                <div class="col-4" style="font-size: 13px">
                                                                    <div class="border " style="height:150px;">
                                                                        <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                            style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                            Khách hàng</h5>
                                                                        <div class="d-flex flex-column px-3">
                                                                            <span>{{ $orderdetail->users->user_name }}</span>
                                                                            <span
                                                                                style="color:var(--text-product)">{{ $orderdetail->users->phone_number }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-8" style="font-size: 13px">
                                                                    <div class="border" style="height:150px;">
                                                                        <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                            style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                            Người Nhận</h5>
                                                                        <div class="d-flex flex-column px-3">
                                                                            <span>{{ $orderdetail->user_name }}</span>
                                                                            <span
                                                                                style="color:var(--text-product)">{{ $orderdetail->phone }}</span>
                                                                            <p>{{ $orderdetail->ship_address }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="table-wrapper border">
                                                            <table class="table table-columns table-history pb-0 mb-0">
                                                                <thead class="table-light">
                                                                    <tr>
                                                                        <th>Tên sản phẩm</th>
                                                                        <th class="text-center">Số lượng
                                                                        </th>
                                                                        <th class="text-center">Đơn giá
                                                                        </th>
                                                                        <th class="text-center">Tổng tiền
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="tbody-history">
                                                                    @foreach ($orderdetail->OrderDetails as $orderitem)
                                                                        <tr class="align-middle">
                                                                            <td class="align-middle">
                                                                                <span
                                                                                    class="text-history-truncate text-truncate">{{ $orderitem->product->name }}</span>
                                                                                @if (count($orderitem->product->cartitemaddon))
                                                                                    <p class="mb-0"
                                                                                        style="font-size:13px;">
                                                                                        @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                            <span class="m-0 p-0"
                                                                                                style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ $ingredient->optionName }}
                                                                                            </span>
                                                                                            <br>
                                                                                        @endforeach
                                                                                    </p>
                                                                                @endif
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <span>{{ $orderitem->quantity }}</span>
                                                                                @if (count($orderitem->product->cartitemaddon))
                                                                                    <p class="mb-0"
                                                                                        style="font-size:13px;">
                                                                                        @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                            <span class="m-0 p-0"
                                                                                                style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ $ingredient->quantity }}
                                                                                            </span>
                                                                                            <br>
                                                                                        @endforeach
                                                                                    </p>
                                                                                @endif
                                                                            </td>
                                                                            <td class="text-center"
                                                                                style="font-weight: 100">
                                                                                <span>{{ number_format($orderitem->unit_price, 0, ',', '.') }}</span>
                                                                                @if (count($orderitem->product->cartitemaddon))
                                                                                    <p class="mb-0"
                                                                                        style="font-size:13px;">
                                                                                        @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                            <span class="m-0 p-0"
                                                                                                style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ number_format($ingredient->unit_price, 0, ',', '.') }}
                                                                                            </span>
                                                                                            <br>
                                                                                        @endforeach
                                                                                    </p>
                                                                                @endif

                                                                            </td>
                                                                            <td class="text-center">
                                                                                <span>{{ number_format($orderitem->sub_total, 0, ',', '.') }}</span>
                                                                                @if (count($orderitem->product->cartitemaddon))
                                                                                    <p class="mb-0"
                                                                                        style="font-size:13px;">
                                                                                        @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                            <span class="m-0 p-0"
                                                                                                style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ number_format($ingredient->sub_total, 0, ',', '.') }}
                                                                                            </span>
                                                                                            <br>
                                                                                        @endforeach
                                                                                    </p>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4">
                                                        <div class="border">
                                                            <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                Phương thức thanh toán</h5>
                                                            <div class="d-flex flex-column p-3 py-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <span>{{ $orderdetail->payment->short_description }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="border my-3">
                                                            <div class="position-relative p-3 pb-2">
                                                                <div class="" style="min-height: 250px;">
                                                                    <div class="row justify-content-between">
                                                                        <div class="col-6 text-secondary"
                                                                            style="font-size: 14px">Tạm
                                                                            tính
                                                                        </div>
                                                                        @php
                                                                            $total = 0;
                                                                            foreach (
                                                                                $orderdetail->OrderDetails
                                                                                as $item
                                                                            ) {
                                                                                $total += $item->sub_total;
                                                                            }
                                                                        @endphp
                                                                        <div class="col-6 text-end">
                                                                            {{ number_format($total, 0, ',', '.') }}₫</div>
                                                                    </div>
                                                                    @if (!empty($orderdetail->promotion_code) || !empty($orderdetail->discount_amount))
                                                                        <div class="row">
                                                                            <div class="col-6 text-secondary"
                                                                                style="font-size: 14px">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span class="me-2">Mã
                                                                                        giảm giá</span>
                                                                                    <span
                                                                                        style="font-size:8px;border-radius:0 !important;"
                                                                                        class="badge text-white bg-danger rounded-0">{{ $orderdetail->promotion_code }}</span>
                                                                                </div>
                                                                            </div>
                                                                            @if (!empty($orderdetail->discount_amount))
                                                                                <div class="col-6 text-end text-danger">
                                                                                    -{{ number_format($orderdetail->discount_amount, 0, ',', '.') }}₫
                                                                                </div>
                                                                            @else
                                                                                <div class="col-6 text-end text-danger">
                                                                                    -0₫
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                                <div class="border-top pt-2">
                                                                    <div class="row align-items-center">
                                                                        <div class="col-6">Thanh toán
                                                                        </div>
                                                                        <div class="col-6 text-success text-end"
                                                                            style="font-size: 22px">

                                                                            {{ number_format($orderdetail->payable_amount, 0, ',', '.') }}₫
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <button type="button"
                                                                class="btn btn-outline-dark w-100 text-uppercase"
                                                                data-bs-dismiss="modal">Đóng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if ($orders->hasPages())
                                <nav aria-label="Page navigation example" style="width:100%">
                                    <ul class="pagination d-flex justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $orders->previousPageUrl() }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>

                                        <!-- Hiển thị các trang -->
                                        @for ($i = 1; $i <= $orders->lastPage(); $i++)
                                            <li class="page-item {{ $orders->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $orders->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        <!-- Liên kết đến trang kế tiếp -->
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $orders->nextPageUrl() }}" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-wait-order" role="tabpanel" aria-labelledby="nav-wait-order-tab"
                    tabindex="0">
                    <div class="table-responsive">
                        @if (!empty($orderSen) && $orderSen->count() > 0)
                            @foreach ($orderSen as $orderSenitem)
                                @if (count($orderSenitem->OrderDetails))
                                    <table class="table my-2">
                                        <thead>
                                            <tr>
                                                <th class="status-order_title" style="width:190px;max-width:190px;">
                                                    Tình
                                                    trạng đơn hàng</th>
                                                <th colspan="3">
                                                    <div class="d-flex justify-content-end">
                                                        <i class="bi bi-car-front"></i>
                                                        @if (!empty($orderSenitem->status))
                                                            @include('client.account.fliedStatus', [
                                                                'status_id' => $orderSenitem->status,
                                                            ])
                                                        @else
                                                            <small class="text-body-tertiary ms-2">Chờ xử
                                                                lý</small>
                                                        @endif
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr class="bg-white border-bottom" style="position: relative">
                                                <td style="" colspan="1"
                                                    class="border-0 d-flex justify-content-center">
                                                    <div class="box-img-history">
                                                        <img src="{{ asset('img/product/' . $orderSenitem->OrderDetails[0]->product->internal_image_path) }}"
                                                            alt="" width="100">
                                                    </div>
                                                </td>
                                                <td colspan="2" class="align-middle border-0">
                                                    <div class="form-text">
                                                        <strong>{{ $orderSenitem->OrderDetails[0]->product->name }}</strong>
                                                        <p class="my-0"><small class="form-text">Phân loại
                                                                hàng:
                                                                {{ $orderSenitem->OrderDetails[0]->product->category->name }}</small>
                                                        </p>
                                                        <p class="my-0"><small class="form-text">Size:
                                                                @if (!empty($cartitem))
                                                                    {{ $cartitem[0]->size }}
                                                                @endif
                                                            </small>
                                                        </p>
                                                        <div class="form-text">
                                                            <p class="m-0">Số lượng:<span
                                                                    class="ms-2">{{ $orderSenitem->amount }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-danger align-middle text-end border-0">
                                                    <br>
                                                    <p class="text-dark">Tổng tiền: <span class="fs-5 text-success">
                                                            {{ number_format($orderSenitem->payable_amount, 0, ',', '.') }}</span>
                                                        <span class="text-success">₫</span>
                                                    </p>
                                                </td>
                                                <td class="position-absolute p-0 toggle-details border-0"
                                                    style="bottom: 0; right: 0; cursor: pointer;margin-right:10px;">
                                                    <button type="button" class="btn-detail"
                                                        data-bs-target="#exampleModal1{{ $orderSenitem->id }}"
                                                        data-bs-toggle="modal"
                                                        style="outline: none; background-color: transparent; border: none; color: var(--text-color); font-size: 13px;">
                                                        chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="modal fade" id="exampleModal1{{ $orderSenitem->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="max-width: 1200px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="orderDetailsModalLabel">Chi tiết
                                                        đơn hàng</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-8">
                                                            <div class="p-2 px-3 border border-1"
                                                                style="background-color:rgb(159 159 159 / 4%);">
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex flex-column">
                                                                        <span style="font-size: 14px">Đơn hàng:
                                                                            <span
                                                                                class="text-primary">{{ $orderSenitem->id }}</span></span>
                                                                        <span
                                                                            style="font-size: 13px;color:#0000007e;">{{ $orderSenitem->date_created }}</span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="">
                                                                            @if (!empty($orderSenitem->status))
                                                                                @include(
                                                                                    'client.account.fliedStatus',
                                                                                    [
                                                                                        'status_id' =>
                                                                                            $orderSenitem->status,
                                                                                    ]
                                                                                )
                                                                            @else
                                                                                <small class="text-body-tertiary ms-2">Chờ
                                                                                    xử
                                                                                    lý</small>
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="my-4">
                                                                <div class="row">
                                                                    <div class="col-4" style="font-size: 13px">
                                                                        <div class="border " style="height:150px;">
                                                                            <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                                style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                                Khách hàng</h5>
                                                                            <div class="d-flex flex-column px-3">
                                                                                <span>{{ $orderSenitem->users->user_name }}</span>
                                                                                <span
                                                                                    style="color:var(--text-product)">{{ $orderSenitem->users->phone_number }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-8" style="font-size: 13px">
                                                                        <div class="border" style="height:150px;">
                                                                            <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                                style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                                Người Nhận</h5>
                                                                            <div class="d-flex flex-column px-3">
                                                                                <span>{{ $orderSenitem->user_name }}</span>
                                                                                <span
                                                                                    style="color:var(--text-product)">{{ $orderSenitem->phone }}</span>
                                                                                <p>{{ $orderSenitem->ship_address }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="table-wrapper border">
                                                                <table class="table table-columns table-history pb-0 mb-0">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th>Tên sản phẩm</th>
                                                                            <th class="text-center">Số lượng
                                                                            </th>
                                                                            <th class="text-center">Đơn giá
                                                                            </th>
                                                                            <th class="text-center">Tổng tiền
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="tbody-history">
                                                                        @foreach ($orderSenitem->OrderDetails as $orderitem)
                                                                            <tr class="align-middle">
                                                                                <td class="align-middle">
                                                                                    <span
                                                                                        class="text-history-truncate text-truncate">{{ $orderitem->product->name }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ $ingredient->optionName }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <span>{{ $orderitem->quantity }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ $ingredient->quantity }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                                <td class="text-center"
                                                                                    style="font-weight: 100">
                                                                                    <span>{{ number_format($orderitem->unit_price, 0, ',', '.') }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ number_format($ingredient->unit_price, 0, ',', '.') }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif

                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <span>{{ number_format($orderitem->sub_total, 0, ',', '.') }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ number_format($ingredient->sub_total, 0, ',', '.') }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="border">
                                                                <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                    style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                    Phương thức thanh toán</h5>
                                                                <div class="d-flex flex-column p-3 py-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>{{ $orderSenitem->payment->short_description }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="border my-3">
                                                                <div class="position-relative p-3 pb-2">
                                                                    <div class="" style="min-height: 250px;">
                                                                        <div class="row justify-content-between">
                                                                            <div class="col-6 text-secondary"
                                                                                style="font-size: 14px">Tạm
                                                                                tính
                                                                            </div>
                                                                            @php
                                                                                $total = 0;
                                                                                foreach (
                                                                                    $orderSenitem->OrderDetails
                                                                                    as $item
                                                                                ) {
                                                                                    $total += $item->sub_total;
                                                                                }
                                                                            @endphp
                                                                            <div class="col-6 text-end">
                                                                                {{ number_format($total, 0, ',', '.') }}₫
                                                                            </div>
                                                                        </div>
                                                                        @if (!empty($orderSenitem->promotion_code) || !empty($orderSenitem->discount_amount))
                                                                            <div class="row">
                                                                                <div class="col-6 text-secondary"
                                                                                    style="font-size: 14px">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <span class="me-2">Mã
                                                                                            giảm giá</span>
                                                                                        <span
                                                                                            style="font-size:8px;border-radius:0 !important;"
                                                                                            class="badge text-white bg-danger rounded-0">{{ $orderSenitem->promotion_code }}</span>
                                                                                    </div>
                                                                                </div>
                                                                                @if (!empty($orderSenitem->discount_amount))
                                                                                    <div
                                                                                        class="col-6 text-end text-danger">
                                                                                        -{{ number_format($orderSenitem->discount_amount, 0, ',', '.') }}₫
                                                                                    </div>
                                                                                @else
                                                                                    <div
                                                                                        class="col-6 text-end text-danger">
                                                                                        -0₫
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="border-top pt-2">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-6">Thanh toán
                                                                            </div>
                                                                            <div class="col-6 text-success text-end"
                                                                                style="font-size: 22px">

                                                                                {{ number_format($orderSenitem->payable_amount, 0, ',', '.') }}₫
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <button type="button"
                                                                    class="btn btn-outline-dark w-100 text-uppercase"
                                                                    data-bs-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($orderSen->hasPages())
                                <nav aria-label="Page navigation example" style="width:100%">
                                    <ul class="pagination d-flex justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $orderSen->previousPageUrl() }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>

                                        @for ($i = 1; $i <= $orderSen->lastPage(); $i++)
                                            <li class="page-item {{ $orderSen->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $orderSen->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        <li class="page-item">
                                            <a class="page-link" href="{{ $orderSen->nextPageUrl() }}"
                                                aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-wait" role="tabpanel" aria-labelledby="nav-wait-tab"
                    tabindex="0">
                    <div class="table-responsive">
                        @if (!empty($ordershipping) && $ordershipping->count() > 0)
                            @foreach ($ordershipping as $ordershippingitem)
                                @if (count($ordershippingitem->OrderDetails))
                                    <table class="table my-2">
                                        <thead>
                                            <tr>
                                                <th class="status-order_title" style="width:190px;max-width:190px;">
                                                    Tình
                                                    trạng đơn hàng</th>
                                                <th colspan="3">
                                                    <div class="d-flex justify-content-end">
                                                        <i class="bi bi-car-front"></i>
                                                        @if (!empty($ordershippingitem->status))
                                                            @include('client.account.fliedStatus', [
                                                                'status_id' => $ordershippingitem->status,
                                                            ])
                                                        @else
                                                            <small class="text-body-tertiary ms-2">Chờ xử
                                                                lý</small>
                                                        @endif
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white border-bottom" style="position: relative">
                                                <td style="" colspan="1"
                                                    class="border-0 d-flex justify-content-center">
                                                    <div class="box-img-history">
                                                        <img src="{{ asset('img/product/' . $ordershippingitem->OrderDetails[0]->product->internal_image_path) }}"
                                                            alt="" width="100">
                                                    </div>
                                                </td>
                                                <td colspan="2" class="align-middle border-0">
                                                    <div class="form-text">
                                                        <strong>{{ $ordershippingitem->OrderDetails[0]->product->name }}</strong>
                                                        <p class="my-0"><small class="form-text">Phân loại
                                                                hàng:
                                                                {{ $ordershippingitem->OrderDetails[0]->product->category->name }}</small>
                                                        </p>
                                                        <p class="my-0"><small class="form-text">Size:
                                                                @if (!empty($cartitem))
                                                                    {{ $cartitem[0]->size }}
                                                                @endif
                                                            </small>
                                                        </p>
                                                        <div class="form-text">
                                                            <p class="m-0">Số lượng:<span
                                                                    class="ms-2">{{ $ordershippingitem->amount }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-danger align-middle text-end border-0">
                                                    <br>
                                                    <p class="text-dark">Tổng tiền: <span class="fs-5 text-success">
                                                            {{ number_format($ordershippingitem->payable_amount, 0, ',', '.') }}</span>
                                                        <span class="text-success">₫</span>
                                                    </p>
                                                </td>
                                                <td class="position-absolute p-0 toggle-details border-0"
                                                    style="bottom: 0; right: 0; cursor: pointer;margin-right:10px;">
                                                    <button type="button" class="btn-detail"
                                                        data-bs-target="#exampleModal2{{ $ordershippingitem->id }}"
                                                        data-bs-toggle="modal"
                                                        style="outline: none; background-color: transparent; border: none; color: var(--text-color); font-size: 13px;">
                                                        chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="modal fade" id="exampleModal2{{ $ordershippingitem->id }}"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="max-width: 1200px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="orderDetailsModalLabel">Chi tiết
                                                        đơn hàng</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-8">
                                                            <div class="p-2 px-3 border border-1"
                                                                style="background-color:rgb(159 159 159 / 4%);">
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex flex-column">
                                                                        <span style="font-size: 14px">Đơn hàng:
                                                                            <span
                                                                                class="text-primary">{{ $ordershippingitem->id }}</span></span>
                                                                        <span
                                                                            style="font-size: 13px;color:#0000007e;">{{ $ordershippingitem->date_created }}</span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="">
                                                                            @if (!empty($ordershippingitem->status))
                                                                                @include(
                                                                                    'client.account.fliedStatus',
                                                                                    [
                                                                                        'status_id' =>
                                                                                            $ordershippingitem->status,
                                                                                    ]
                                                                                )
                                                                            @else
                                                                                <small class="text-body-tertiary ms-2">Chờ
                                                                                    xử
                                                                                    lý</small>
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="my-4">
                                                                <div class="row">
                                                                    <div class="col-4" style="font-size: 13px">
                                                                        <div class="border " style="height:150px;">
                                                                            <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                                style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                                Khách hàng</h5>
                                                                            <div class="d-flex flex-column px-3">
                                                                                <span>{{ $ordershippingitem->users->user_name }}</span>
                                                                                <span
                                                                                    style="color:var(--text-product)">{{ $ordershippingitem->users->phone_number }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-8" style="font-size: 13px">
                                                                        <div class="border" style="height:150px;">
                                                                            <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                                style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                                Người Nhận</h5>
                                                                            <div class="d-flex flex-column px-3">
                                                                                <span>{{ $ordershippingitem->user_name }}</span>
                                                                                <span
                                                                                    style="color:var(--text-product)">{{ $ordershippingitem->phone }}</span>
                                                                                <p>{{ $ordershippingitem->ship_address }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="table-wrapper border">
                                                                <table class="table table-columns table-history pb-0 mb-0">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th>Tên sản phẩm</th>
                                                                            <th class="text-center">Số lượng
                                                                            </th>
                                                                            <th class="text-center">Đơn giá
                                                                            </th>
                                                                            <th class="text-center">Tổng tiền
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="tbody-history">
                                                                        @foreach ($ordershippingitem->OrderDetails as $orderitem)
                                                                            <tr class="align-middle">
                                                                                <td class="align-middle">
                                                                                    <span
                                                                                        class="text-history-truncate text-truncate">{{ $orderitem->product->name }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ $ingredient->optionName }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <span>{{ $orderitem->quantity }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ $ingredient->quantity }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                                <td class="text-center"
                                                                                    style="font-weight: 100">
                                                                                    <span>{{ number_format($orderitem->unit_price, 0, ',', '.') }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ number_format($ingredient->unit_price, 0, ',', '.') }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif

                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <span>{{ number_format($orderitem->sub_total, 0, ',', '.') }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ number_format($ingredient->sub_total, 0, ',', '.') }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="border">
                                                                <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                    style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                    Phương thức thanh toán</h5>
                                                                <div class="d-flex flex-column p-3 py-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>{{ $ordershippingitem->payment->short_description }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="border my-3">
                                                                <div class="position-relative p-3 pb-2">
                                                                    <div class="" style="min-height: 250px;">
                                                                        <div class="row justify-content-between">
                                                                            <div class="col-6 text-secondary"
                                                                                style="font-size: 14px">Tạm
                                                                                tính
                                                                            </div>
                                                                            @php
                                                                                $total = 0;
                                                                                foreach (
                                                                                    $ordershippingitem->OrderDetails
                                                                                    as $item
                                                                                ) {
                                                                                    $total += $item->sub_total;
                                                                                }
                                                                            @endphp
                                                                            <div class="col-6 text-end">
                                                                                {{ number_format($total, 0, ',', '.') }}₫
                                                                            </div>
                                                                        </div>
                                                                        @if (!empty($ordershippingitem->promotion_code) || !empty($ordershippingitem->discount_amount))
                                                                            <div class="row">
                                                                                <div class="col-6 text-secondary"
                                                                                    style="font-size: 14px">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <span class="me-2">Mã
                                                                                            giảm giá</span>
                                                                                        <span
                                                                                            style="font-size:8px;border-radius:0 !important;"
                                                                                            class="badge text-white bg-danger rounded-0">{{ $ordershippingitem->promotion_code }}</span>
                                                                                    </div>
                                                                                </div>
                                                                                @if (!empty($ordershippingitem->discount_amount))
                                                                                    <div
                                                                                        class="col-6 text-end text-danger">
                                                                                        -{{ number_format($ordershippingitem->discount_amount, 0, ',', '.') }}₫
                                                                                    </div>
                                                                                @else
                                                                                    <div
                                                                                        class="col-6 text-end text-danger">
                                                                                        -0₫
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="border-top pt-2">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-6">Thanh toán
                                                                            </div>
                                                                            <div class="col-6 text-success text-end"
                                                                                style="font-size: 22px">

                                                                                {{ number_format($ordershippingitem->payable_amount, 0, ',', '.') }}₫
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <button type="button"
                                                                    class="btn btn-outline-dark w-100 text-uppercase"
                                                                    data-bs-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($ordershipping->hasPages())
                                <nav aria-label="Page navigation example" style="width:100%">
                                    <ul class="pagination d-flex justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $ordershipping->previousPageUrl() }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>

                                        @for ($i = 1; $i <= $ordershipping->lastPage(); $i++)
                                            <li
                                                class="page-item {{ $ordershipping->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $ordershipping->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        <li class="page-item">
                                            <a class="page-link" href="{{ $ordershipping->nextPageUrl() }}"
                                                aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-complete" role="tabpanel" aria-labelledby="nav-complete-tab"
                    tabindex="0">
                    <div class="table-responsive">
                        @if (!empty($ordersuccess) && $ordersuccess->count() > 0)
                            @foreach ($ordersuccess as $ordersuccessitem)
                                @if (count($ordersuccessitem->OrderDetails))
                                    <table class="table my-2">
                                        <thead>
                                            <tr>
                                                <th class="status-order_title" style="width:190px;max-width:190px;">
                                                    Tình
                                                    trạng đơn hàng</th>
                                                <th colspan="3">
                                                    <div class="d-flex justify-content-end">
                                                        <i class="bi bi-car-front"></i>
                                                        @if (!empty($ordersuccessitem->status))
                                                            @include('client.account.fliedStatus', [
                                                                'status_id' => $ordersuccessitem->status,
                                                            ])
                                                        @else
                                                            <small class="text-body-tertiary ms-2">Chờ xử
                                                                lý</small>
                                                        @endif
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr class="bg-white border-bottom" style="position: relative">
                                                <td style="" colspan="1"
                                                    class="border-0 d-flex justify-content-center">
                                                    <div class="box-img-history">
                                                        <img src="{{ asset('img/product/' . $ordersuccessitem->OrderDetails[0]->product->internal_image_path) }}"
                                                            alt="" width="100">
                                                    </div>
                                                </td>
                                                <td colspan="2" class="align-middle border-0">
                                                    <div class="form-text">
                                                        <strong>{{ $ordersuccessitem->OrderDetails[0]->product->name }}</strong>
                                                        <p class="my-0"><small class="form-text">Phân loại
                                                                hàng:
                                                                {{ $ordersuccessitem->OrderDetails[0]->product->category->name }}</small>
                                                        </p>
                                                        <p class="my-0"><small class="form-text">Size:
                                                                @if (!empty($cartitem))
                                                                    {{ $cartitem[0]->size }}
                                                                @endif
                                                            </small>
                                                        </p>
                                                        <div class="form-text">
                                                            <p class="m-0">Số lượng:<span
                                                                    class="ms-2">{{ $ordersuccessitem->amount }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-danger align-middle text-end border-0">
                                                    <br>
                                                    <p class="text-dark">Tổng tiền: <span class="fs-5 text-success">
                                                            {{ number_format($ordersuccessitem->payable_amount, 0, ',', '.') }}</span>
                                                        <span class="text-success">₫</span>
                                                    </p>
                                                </td>
                                                <td class="position-absolute p-0 toggle-details border-0"
                                                    style="bottom: 0; right: 0; cursor: pointer;margin-right:10px;">
                                                    <button type="button" class="btn-detail"
                                                        data-bs-target="#exampleModal3{{ $ordersuccessitem->id }}"
                                                        data-bs-toggle="modal"
                                                        style="outline: none; background-color: transparent; border: none; color: var(--text-color); font-size: 13px;">
                                                        chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="modal fade" id="exampleModal3{{ $ordersuccessitem->id }}"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="max-width: 1200px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="orderDetailsModalLabel">Chi tiết
                                                        đơn hàng</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-8">
                                                            <div class="p-2 px-3 border border-1"
                                                                style="background-color:rgb(159 159 159 / 4%);">
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex flex-column">
                                                                        <span style="font-size: 14px">Đơn hàng:
                                                                            <span
                                                                                class="text-primary">{{ $ordersuccessitem->id }}</span></span>
                                                                        <span
                                                                            style="font-size: 13px;color:#0000007e;">{{ $ordersuccessitem->date_created }}</span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="">
                                                                            @if (!empty($ordersuccessitem->status))
                                                                                @include(
                                                                                    'client.account.fliedStatus',
                                                                                    [
                                                                                        'status_id' =>
                                                                                            $ordersuccessitem->status,
                                                                                    ]
                                                                                )
                                                                            @else
                                                                                <small class="text-body-tertiary ms-2">Chờ
                                                                                    xử
                                                                                    lý</small>
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="my-4">
                                                                <div class="row">
                                                                    <div class="col-4" style="font-size: 13px">
                                                                        <div class="border " style="height:150px;">
                                                                            <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                                style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                                Khách hàng</h5>
                                                                            <div class="d-flex flex-column px-3">
                                                                                <span>{{ $ordersuccessitem->users->user_name }}</span>
                                                                                <span
                                                                                    style="color:var(--text-product)">{{ $ordersuccessitem->users->phone_number }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-8" style="font-size: 13px">
                                                                        <div class="border" style="height:150px;">
                                                                            <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                                style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                                Người Nhận</h5>
                                                                            <div class="d-flex flex-column px-3">
                                                                                <span>{{ $ordersuccessitem->user_name }}</span>
                                                                                <span
                                                                                    style="color:var(--text-product)">{{ $ordersuccessitem->phone }}</span>
                                                                                <p>{{ $ordersuccessitem->ship_address }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="table-wrapper border">
                                                                <table class="table table-columns table-history pb-0 mb-0">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th>Tên sản phẩm</th>
                                                                            <th class="text-center">Số lượng
                                                                            </th>
                                                                            <th class="text-center">Đơn giá
                                                                            </th>
                                                                            <th class="text-center">Tổng tiền
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="tbody-history">
                                                                        @foreach ($ordersuccessitem->OrderDetails as $orderitem)
                                                                            <tr class="align-middle">
                                                                                <td class="align-middle">
                                                                                    <span
                                                                                        class="text-history-truncate text-truncate">{{ $orderitem->product->name }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ $ingredient->optionName }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <span>{{ $orderitem->quantity }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ $ingredient->quantity }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                                <td class="text-center"
                                                                                    style="font-weight: 100">
                                                                                    <span>{{ number_format($orderitem->unit_price, 0, ',', '.') }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ number_format($ingredient->unit_price, 0, ',', '.') }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif

                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <span>{{ number_format($orderitem->sub_total, 0, ',', '.') }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ number_format($ingredient->sub_total, 0, ',', '.') }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="border">
                                                                <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                    style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                    Phương thức thanh toán</h5>
                                                                <div class="d-flex flex-column p-3 py-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>{{ $ordersuccessitem->payment->short_description }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="border my-3">
                                                                <div class="position-relative p-3 pb-2">
                                                                    <div class="" style="min-height: 250px;">
                                                                        <div class="row justify-content-between">
                                                                            <div class="col-6 text-secondary"
                                                                                style="font-size: 14px">Tạm
                                                                                tính
                                                                            </div>
                                                                            @php
                                                                                $total = 0;
                                                                                foreach (
                                                                                    $ordersuccessitem->OrderDetails
                                                                                    as $item
                                                                                ) {
                                                                                    $total += $item->sub_total;
                                                                                }
                                                                            @endphp
                                                                            <div class="col-6 text-end">
                                                                                {{ number_format($total, 0, ',', '.') }}₫
                                                                            </div>
                                                                        </div>
                                                                        @if (!empty($ordersuccessitem->promotion_code) || !empty($ordersuccessitem->discount_amount))
                                                                            <div class="row">
                                                                                <div class="col-6 text-secondary"
                                                                                    style="font-size: 14px">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <span class="me-2">Mã
                                                                                            giảm giá</span>
                                                                                        <span
                                                                                            style="font-size:8px;border-radius:0 !important;"
                                                                                            class="badge text-white bg-danger rounded-0">{{ $ordersuccessitem->promotion_code }}</span>
                                                                                    </div>
                                                                                </div>
                                                                                @if (!empty($ordersuccessitem->discount_amount))
                                                                                    <div
                                                                                        class="col-6 text-end text-danger">
                                                                                        -{{ number_format($ordersuccessitem->discount_amount, 0, ',', '.') }}₫
                                                                                    </div>
                                                                                @else
                                                                                    <div
                                                                                        class="col-6 text-end text-danger">
                                                                                        -0₫
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="border-top pt-2">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-6">Thanh toán
                                                                            </div>
                                                                            <div class="col-6 text-success text-end"
                                                                                style="font-size: 22px">

                                                                                {{ number_format($ordersuccessitem->payable_amount, 0, ',', '.') }}₫
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <button type="button"
                                                                    class="btn btn-outline-dark w-100 text-uppercase"
                                                                    data-bs-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            @if ($ordersuccess->hasPages())
                                <nav aria-label="Page navigation example" style="width:100%">
                                    <ul class="pagination d-flex justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $ordersuccess->previousPageUrl() }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>

                                        @for ($i = 1; $i <= $ordersuccess->lastPage(); $i++)
                                            <li
                                                class="page-item {{ $ordersuccess->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $ordersuccess->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        <li class="page-item">
                                            <a class="page-link" href="{{ $ordersuccess->nextPageUrl() }}"
                                                aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-cancel" role="tabpanel" aria-labelledby="nav-cancel-tab"
                    tabindex="0">
                    <div class="table-responsive">
                        @if (!empty($ordercancelled) && $ordercancelled->count() > 0)
                            @foreach ($ordercancelled as $ordercancelleditem)
                                @if (count($ordercancelleditem->OrderDetails))
                                    <table class="table my-2">
                                        <thead>
                                            <tr>
                                                <th class="status-order_title" style="width:190px;max-width:190px;">
                                                    Tình
                                                    trạng đơn hàng</th>
                                                <th colspan="3">
                                                    <div class="d-flex justify-content-end">
                                                        <i class="bi bi-car-front"></i>
                                                        @if (!empty($ordercancelleditem->status))
                                                            @include('client.account.fliedStatus', [
                                                                'status_id' => $ordercancelleditem->status,
                                                            ])
                                                        @else
                                                            <small class="text-body-tertiary ms-2">Chờ xử
                                                                lý</small>
                                                        @endif
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="bg-white border-bottom" style="position: relative">
                                                <td style="" colspan="1"
                                                    class="border-0 d-flex justify-content-center">
                                                    <div class="box-img-history">
                                                        <img src="{{ asset('img/product/' . $ordercancelleditem->OrderDetails[0]->product->internal_image_path) }}"
                                                            alt="" width="100">
                                                    </div>
                                                </td>
                                                <td colspan="2" class="align-middle border-0">
                                                    <div class="form-text">
                                                        <strong>{{ $ordercancelleditem->OrderDetails[0]->product->name }}</strong>
                                                        <p class="my-0"><small class="form-text">Phân loại
                                                                hàng:
                                                                {{ $ordercancelleditem->OrderDetails[0]->product->category->name }}</small>
                                                        </p>
                                                        <p class="my-0"><small class="form-text">Size:
                                                                @if (!empty($cartitem))
                                                                    {{ $cartitem[0]->size }}
                                                                @endif
                                                            </small>
                                                        </p>
                                                        <div class="form-text">
                                                            <p class="m-0">Số lượng:<span
                                                                    class="ms-2">{{ $ordercancelleditem->amount }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-danger align-middle text-end border-0">
                                                    <br>
                                                    <p class="text-dark">Tổng tiền: <span class="fs-5 text-success">
                                                            {{ number_format($ordercancelleditem->payable_amount, 0, ',', '.') }}</span>
                                                        <span class="text-success">₫</span>
                                                    </p>
                                                </td>
                                                <td class="position-absolute p-0 toggle-details border-0"
                                                    style="bottom: 0; right: 0; cursor: pointer;margin-right:10px;">
                                                    <button type="button" class="btn-detail"
                                                        data-bs-target="#exampleModal4{{ $ordercancelleditem->id }}"
                                                        data-bs-toggle="modal"
                                                        style="outline: none; background-color: transparent; border: none; color: var(--text-color); font-size: 13px;">
                                                        chi tiết
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="modal fade" id="exampleModal4{{ $ordercancelleditem->id }}"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" style="max-width: 1200px">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="orderDetailsModalLabel">Chi tiết
                                                        đơn hàng</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-8">
                                                            <div class="p-2 px-3 border border-1"
                                                                style="background-color:rgb(159 159 159 / 4%);">
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex flex-column">
                                                                        <span style="font-size: 14px">Đơn hàng:
                                                                            <span
                                                                                class="text-primary">{{ $ordercancelleditem->id }}</span></span>
                                                                        <span
                                                                            style="font-size: 13px;color:#0000007e;">{{ $ordercancelleditem->date_created }}</span>
                                                                    </div>
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="">
                                                                            @if (!empty($ordercancelleditem->status))
                                                                                @include(
                                                                                    'client.account.fliedStatus',
                                                                                    [
                                                                                        'status_id' =>
                                                                                            $ordercancelleditem->status,
                                                                                    ]
                                                                                )
                                                                            @else
                                                                                <small class="text-body-tertiary ms-2">Chờ
                                                                                    xử
                                                                                    lý</small>
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="my-4">
                                                                <div class="row">
                                                                    <div class="col-4" style="font-size: 13px">
                                                                        <div class="border " style="height:150px;">
                                                                            <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                                style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                                Khách hàng</h5>
                                                                            <div class="d-flex flex-column px-3">
                                                                                <span>{{ $ordercancelleditem->users->user_name }}</span>
                                                                                <span
                                                                                    style="color:var(--text-product)">{{ $ordercancelleditem->users->phone_number }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-8" style="font-size: 13px">
                                                                        <div class="border" style="height:150px;">
                                                                            <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                                style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                                Người Nhận</h5>
                                                                            <div class="d-flex flex-column px-3">
                                                                                <span>{{ $ordercancelleditem->user_name }}</span>
                                                                                <span
                                                                                    style="color:var(--text-product)">{{ $ordercancelleditem->phone }}</span>
                                                                                <p>{{ $ordercancelleditem->ship_address }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="table-wrapper border">
                                                                <table class="table table-columns table-history pb-0 mb-0">
                                                                    <thead class="table-light">
                                                                        <tr>
                                                                            <th>Tên sản phẩm</th>
                                                                            <th class="text-center">Số lượng
                                                                            </th>
                                                                            <th class="text-center">Đơn giá
                                                                            </th>
                                                                            <th class="text-center">Tổng tiền
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="tbody-history">
                                                                        @foreach ($ordercancelleditem->OrderDetails as $orderitem)
                                                                            <tr class="align-middle">
                                                                                <td class="align-middle">
                                                                                    <span
                                                                                        class="text-history-truncate text-truncate">{{ $orderitem->product->name }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ $ingredient->optionName }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <span>{{ $orderitem->quantity }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ $ingredient->quantity }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                                <td class="text-center"
                                                                                    style="font-weight: 100">
                                                                                    <span>{{ number_format($orderitem->unit_price, 0, ',', '.') }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ number_format($ingredient->unit_price, 0, ',', '.') }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif

                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <span>{{ number_format($orderitem->sub_total, 0, ',', '.') }}</span>
                                                                                    @if (count($orderitem->product->cartitemaddon))
                                                                                        <p class="mb-0"
                                                                                            style="font-size:13px;">
                                                                                            @foreach ($orderitem->product->cartitemaddon as $ingredient)
                                                                                                <span class="m-0 p-0"
                                                                                                    style="color: #00000075;font-size:10px;letter-spacing:1px;">+{{ number_format($ingredient->sub_total, 0, ',', '.') }}
                                                                                                </span>
                                                                                                <br>
                                                                                            @endforeach
                                                                                        </p>
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="border">
                                                                <h5 class="text-uppercase border-bottom p-3 pb-2"
                                                                    style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                                    Phương thức thanh toán</h5>
                                                                <div class="d-flex flex-column p-3 py-2">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>{{ $ordercancelleditem->payment->short_description }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="border my-3">
                                                                <div class="position-relative p-3 pb-2">
                                                                    <div class="" style="min-height: 250px;">
                                                                        <div class="row justify-content-between">
                                                                            <div class="col-6 text-secondary"
                                                                                style="font-size: 14px">Tạm
                                                                                tính
                                                                            </div>
                                                                            @php
                                                                                $total = 0;
                                                                                foreach (
                                                                                    $ordercancelleditem->OrderDetails
                                                                                    as $item
                                                                                ) {
                                                                                    $total += $item->sub_total;
                                                                                }
                                                                            @endphp
                                                                            <div class="col-6 text-end">
                                                                                {{ number_format($total, 0, ',', '.') }}₫
                                                                            </div>
                                                                        </div>
                                                                        @if (!empty($ordercancelleditem->promotion_code) || count($ordercancelleditem->discount_amount))
                                                                            <div class="row">
                                                                                <div class="col-6 text-secondary"
                                                                                    style="font-size: 14px">
                                                                                    <div class="d-flex align-items-center">
                                                                                        <span class="me-2">Mã
                                                                                            giảm giá</span>
                                                                                        <span
                                                                                            style="font-size:8px;border-radius:0 !important;"
                                                                                            class="badge text-white bg-danger rounded-0">{{ $ordercancelleditem->promotion_code }}</span>
                                                                                    </div>
                                                                                </div>
                                                                                @if (!empty($ordercancelleditem->discount_amount))
                                                                                    <div
                                                                                        class="col-6 text-end text-danger">
                                                                                        -{{ number_format($ordercancelleditem->discount_amount, 0, ',', '.') }}₫
                                                                                    </div>
                                                                                @else
                                                                                    <div
                                                                                        class="col-6 text-end text-danger">
                                                                                        -0₫
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    <div class="border-top pt-2">
                                                                        <div class="row align-items-center">
                                                                            <div class="col-6">Thanh toán
                                                                            </div>
                                                                            <div class="col-6 text-success text-end"
                                                                                style="font-size: 22px">

                                                                                {{ number_format($ordercancelleditem->payable_amount, 0, ',', '.') }}₫
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <button type="button"
                                                                    class="btn btn-outline-dark w-100 text-uppercase"
                                                                    data-bs-dismiss="modal">Đóng</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @endforeach
                            @if ($ordercancelled->hasPages())
                                <nav aria-label="Page navigation example" style="width:100%">
                                    <ul class="pagination d-flex justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $ordercancelled->previousPageUrl() }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>

                                        @for ($i = 1; $i <= $ordercancelled->lastPage(); $i++)
                                            <li
                                                class="page-item {{ $ordercancelled->currentPage() == $i ? 'active' : '' }}">
                                                <a class="page-link"
                                                    href="{{ $ordercancelled->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor

                                        <li class="page-item">
                                            <a class="page-link" href="{{ $ordercancelled->nextPageUrl() }}"
                                                aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
