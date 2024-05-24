@if (session()->has('order'))
    @php
        $order = session('order');
    @endphp

<div class="modal fade" id="orderDetailsModal" tabindex="-1" aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderDetailsModalLabel">Chi tiết đơn hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Thông tin chi tiết đơn hàng -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <div class="p-2 px-3 border border-1" style="background-color:rgb(159 159 159 / 4%);">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span style="font-size: 14px">Đơn hàng: <span class="text-primary">{{ $order->id }}</span></span>
                                        <span style="font-size: 13px;color:#0000007e;">22-01-2024 - 13:50</span>
                                    </div>
                                    <div class="badge bg-success text-white d-flex align-items-center">
                                        <span class="">đã giao hàng</span>
                                    </div>
                                </div>
                            </div>
                            <div class="my-4">
                                <div class="row">
                                    <div class="col-4" style="font-size: 13px">
                                        <div class="border " style="height:150px;">
                                            <h5 class="text-uppercase border-bottom p-3 pb-2" style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                Khách hàng</h5>
                                            <div class="d-flex flex-column px-3">
                                                <span>Lê Đăng Khoa</span>
                                                <span style="color:var(--text-product)">0961921909</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8" style="font-size: 13px">
                                        <div class="border" style="height:150px;">
                                            <h5 class="text-uppercase border-bottom p-3 pb-2" style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                                Người Nhận</h5>
                                            <div class="d-flex flex-column px-3">
                                                <span>Lê Đăng Khoa</span>
                                                <span style="color:var(--text-product)">0961921909</span>
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus eum enim.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-wrapper border">
                                <table class="table table-columns table-history">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Đơn giá</th>
                                            <th class="text-center">Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="border-bottom align-middle">
                                            <td class="align-middle">
                                                <span class="text-history-truncate text-truncate">Chai nước mắm phú quốc hai chai 120g</span>
                                                <p class="mb-0" style="font-size:13px;">Mã vạch: <span style="color: #00000075">234243</span></p>
                                            </td>
                                            <td class="text-center"><span>2</span></td>
                                            <td class="text-center" style="font-weight: 100"><span>1.000.000</span></td>
                                            <td class="text-center"><span>1.000.000</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="border">
                                <h5 class="text-uppercase border-bottom p-3 pb-2" style="font-size: 15px;background-color:rgb(159 159 159 / 4%);">
                                    Phương thức thanh toán</h5>
                                <div class="d-flex flex-column p-3 py-2">
                                    <div class="row">
                                        <div class="col-6"><span>Tiền mặt</span></div>
                                        <div class="col-6 text-end text-success"><span>2.000.000</span>₫</div>
                                    </div>
                                </div>
                            </div>
                            <div class="border my-3">
                                <div class="position-relative p-3 pb-2">
                                    <div class="" style="min-height: 250px;">
                                        <div class="row justify-content-between">
                                            <div class="col-6 text-secondary" style="font-size: 14px">Tạm tính</div>
                                            <div class="col-6 text-end">16.000.000₫</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 text-secondary" style="font-size: 14px">Khuyến mãi</div>
                                            <div class="col-6 text-end text-danger">-30.000₫</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 text-secondary" style="font-size: 14px">Phí vận chuyển</div>
                                            <div class="col-6 text-end">Miễn phí</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 text-secondary" style="font-size: 14px">
                                                <div class="d-flex align-items-center">
                                                    <span class="me-2">Mã giảm giá</span>
                                                    <span style="font-size:8px;border-radius:0 !important;" class="badge text-white bg-danger rounded-0">CAPHESANVIET</span>
                                                </div>
                                            </div>
                                            <div class="col-6 text-end text-danger">-10.000₫</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 text-secondary" style="font-size: 14px">Thành tiền</div>
                                            <div class="col-6 text-end">20.000.000₫</div>
                                        </div>
                                    </div>
                                    <div class="border-top pt-2">
                                        <div class="row align-items-center">
                                            <div class="col-6">Thanh toán</div>
                                            <div class="col-6 text-success text-end" style="font-size: 22px">20.000.000₫</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-outline-dark w-100 text-uppercase" data-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endif

@push('modal')
   
@endpush
