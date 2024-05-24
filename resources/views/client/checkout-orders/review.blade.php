@extends('client.layout')

@section('title', 'review')
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
                        <p class="fw-bold text-white">Bước 3<i class="bi bi-check-lg text-success"></i></p><span class="text-white text-uppercase fs-5">Thanh toán</span>
                    </div>
                    <div class="p-3 border-3 border-bottom border-success">
                        <p class="fw-bold text-white">Bước 4</p><span class="text-white text-uppercase fs-5">Kiểm tra</span>
                    </div>
                    <div class="p-3 d-none d-sm-block">
                        <p class="fw-bold text-white">Bước 5</p><span class="text-white text-uppercase fs-5">Xác nhận</span>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between py-3">
                <div class="col-md-4">
                    <div class="bg-white">
                        <div class="bg-secondary text-uppercase p-3 fw-bolder text-white">Chi tiết đặt hàng</div>
                        <div class="container">
                            <div class="row form-text text-black">
                                <strong>Mr. Duy Hoa</strong><br>
                                <strong>VietNam</strong><br>
                                <strong>HoChiMinh, 70000</strong>
                            </div>
                            <hr>
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                <i class="bi bi-box-seam fs-1"></i>
                                <p class="form-text">Chế độ chuyển phát:</p>
                                <p class="fw-bold form-text">Tiêu chuẩn – Miễn phí</p>
                            </div>
                            <a href="/shipping" class="text-warning-emphasis text-decoration-none form-text">Thay đổi <i class="bi bi-chevron-right"></i></a>
                        </div>
                        <div class="bg-secondary text-uppercase p-3 fw-bolder text-white">CHI TIẾT THANH TOÁN</div>
                        <div class="container">
                            <div class="row form-text text-black">
                                <strong>Mr. Duy Hoa</strong><br>
                                <strong>VietNam</strong><br>
                                <strong>HoChiMinh, 70000</strong>
                            </div>
                            <hr>
                            <div class="d-flex gap-3 align-items-center">
                                <i class="bi bi-cash fs-2"></i>
                                <div class="d-flex flex-column text-center align-items-center">
                                    <strong><small>Thanh toán khi nhận hàng</small></strong>
                                </div>
                            </div>
                            <a href="/payment" class="text-warning-emphasis text-decoration-none form-text">Thay đổi <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="bg-white">  
                        <div class="container">
                        <div class="row bg-secondary text-uppercase fw-bolder text-white p-3">TÙY CHỌN VẬN CHUYỂN</div>
                        <div class="table-responsive row">
                            <table class="table">
                                <thead>
                                  <tr class="table-secondary">
                                    <th scope="col">VERTUO CAPSULES (60)</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col"></th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr class="text-center">
                                    <td scope="row"><img src="{{ asset('img/product-1.avif') }}" alt="" width="45" height="45"></td>
                                    <td colspan="2">VERTUO 60 CAPSULE DISCOVERY PACK</td>
                                    <td>$73.50</td>
                                    <td>x</td>
                                    <td>1</td>
                                    <td>$73.50</td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                        <div class="d-flex flex-column justify-content-center bg-body-secondary">
                            <a href="/checkout" class="text-warning-emphasis text-decoration-none form-text">Thay đổi <i class="bi bi-chevron-right"></i></a>
                            <p class="fw-bold form-text">Tổng: VERTUO CAPSULES (1)</p>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <p class="form-text">Tạm tính</p>
                                <strong class="text-warning-emphasis form-text"><small>$40.00</small></strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="form-text">Phí vận chuyển</p>
                                <strong class="text-warning-emphasis form-text"><small>Miễn phí</small></strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="form-text">Thuế</p>
                                <strong class="text-warning-emphasis form-text"><small>$2.57</small></strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <strong class="fw-bold">Tổng</strong>
                                <strong class="text-warning-emphasis">$42.57</strong>
                            </div>
                            <hr>
                            <strong>Xác nhận điều khoản bán hàng</strong>
                            <div class="container">
                                <div class="form-check">
                                    <input type="checkbox" name="flexCheckDefault" id="" class="form-check-input">
                                    <label class="form-check-label" for="flexCheckDefault">
                                    <p class="form-text"><small>Bằng cách nhấp vào nút “Xác nhận đơn hàng của bạn” bên dưới, tôi xác nhận rằng tôi đã đọc và chấp nhận Điều kiện bán hàng, Thông báo bảo mật và Điều khoản sử dụng của MOZANIO.</small></p>
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between py-3">
                                <a href="/payment" class="text-decoration-none text-warning-emphasis form-text"><i class="bi bi-chevron-left"></i> Quay lại</a>
                                <a href="/confimation" class="btn btn-success">Tiếp tục <i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </main>
    @endsection