@extends('client.layout')

@section('title', 'confimation')
@section('content')
<main class="bg-black">
        <div class="container">
            <div class="row bg-dark">
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="p-3 border-3 border-bottom border-success d-none d-sm-block">
                        <p class="fw-bold text-white">Bước 1 <i class="bi bi-check-lg text-success"></i></p><span class="text-white text-uppercase fs-5">Giỏ hàng</span>
                    </div>
                    <div class="p-3 border-3 border-bottom border-success d-none d-sm-block">
                        <p class="fw-bold text-white">Bước 2 <i class="bi bi-check-lg text-success"></i></p><span class="text-white text-uppercase fs-5">Thông tin</span>
                    </div>
                    <div class="p-3 border-3 border-bottom border-success d-none d-sm-block">
                        <p class="fw-bold text-white">Bước 3 <i class="bi bi-check-lg text-success"></i></p><span class="fw-bold text-white text-uppercase fs-5">Thanh toán</span>
                    </div>
                    <div class="p-3 border-3 border-bottom border-success d-none d-sm-block">
                        <p class="fw-bold text-white">Bước 4 <i class="bi bi-check-lg text-success"></i></p><span class="text-white text-uppercase fs-5">Kiểm tra</span>
                    </div>
                    <div class="p-3 border-3 border-bottom border-success">
                        <p class="fw-bold text-white">Bước 5</p><span class="text-white text-uppercase fs-5">Xác nhận</span>
                    </div>
                </div>
            </div>
            <div class=" py-3">
                <div class="bg-white row">
                    <h3 class="text-center p-3">Đặt hàng thành công <i class="bi bi-check-lg text-success"></i></h3>
                    <strong class="text-center"><small>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</small></strong>
                    <p class="fw-bold fs-5">Thông tin đơn hàng</p>
                    <div class="col-sm-3">
                        <p>Người nhận: <strong class="form-text">Nguyễn Duy Hòa</strong></p>
                        <p>Địa chỉ nhận hàng: <strong class="form-text">123 Hồ Chí Minh</strong></p>
                        <p>Số điện thoại: <strong class="form-text">1234567890</strong></p>
                    </div>
                    <div class="col-sm-9">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Loại sản phẩm</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">
                                        <div class="d-flex justify-content-end">
                                        <i class="bi bi-car-front d-none d-lg-block"></i><small class="text-success d-none d-lg-block"> Đơn hàng đã được đặt |</small><strong class="text-danger"> Chờ đơn vị vận chuyển</strong>
                                        </div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <img src="{{ asset('img/product-1.avif') }}" alt="" width="100">
                                    </th>
                                    <td colspan="2" class="align-middle">
                                        <div class="form-text">
                                            <strong>Tên sản phẩm</strong>
                                            <p><small class="form-text">Phân loại hàng: Màu - Size</small></p>
                                            Số lượng: x1
                                        </div>
                                    </td>
                                    <td class="text-danger text-end">250.000đ
                                        <p class="text-dark">Thành tiền: <span class="fs-4 text-danger">206.000đ</span></p>
                                        <button class="btn btn-outline-dark">Hủy đơn</button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="/shopcoffee" class="text-decoration-none text-warning-emphasis form-text">Tiếp tục mua hàng <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection