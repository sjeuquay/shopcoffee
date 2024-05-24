@extends('client.layout')

@section('title', 'payment')
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
                <div class="p-3 border-3 border-bottom border-success">
                    <p class="fw-bold text-white">Bước 3</p><span class="fw-bold text-white text-uppercase fs-5">Thanh toán</span>
                </div>
                <div class="p-3 d-none d-sm-block">
                    <p class="fw-bold text-white">Bước 4</p><span class="text-white text-uppercase fs-5">Kiểm tra</span>
                </div>
                <div class="p-3 d-none d-sm-block">
                    <p class="fw-bold text-white">Bước 5</p><span class="text-white text-uppercase fs-5">Xác nhận</span>
                </div>
            </div>
        </div>
        <div class="row justify-content-between py-3">
            <div class="col-md-8">
                <form action="">
                    <div class="bg-white justify-content-center">
                        <div class="container">
                            <div class="row text-uppercase bg-secondary fw-bolder text-white p-3">Hãy chọn phương thức thanh toán</div>
                            <div class="row bg-secondary-subtle">
                                <div class="d-flex justify-content-between  align-items-center">
                                    <div class="form-text fw-bolder p-2">Thẻ quà tặng</div>
                                    <a data-bs-toggle="modal" data-bs-target="#examplePromoCode" href="" class="form-text text-warning-emphasis text-decoration-none">Bạn có mã khuyến mãi không? <i class="bi bi-chevron-right"></i></a>
                                    <div class="modal fade" id="examplePromoCode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="text-center form-text">Mã khuyến mãi có thể được đổi trên trang Bước 1 - Giỏ hàng.</p>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <input type="checkbox" class="form-check-input" id="toggleFormCheckbox">
                                    <i class="bi bi-credit-card-2-front fs-2"></i>
                                    <div class="d-flex flex-column text-center align-items-center">
                                        <strong><small>Thẻ quà tặng</small></strong>
                                        <p class="form-text">Thẻ quà tặng</p>
                                        <a data-bs-toggle="modal" data-bs-target="#exampleLearnMore" href="http://" class="form-text text-warning-emphasis text-decoration-none">Xem thêm <i class="bi bi-chevron-right"></i></a>
                                        <div class="modal fade" id="exampleLearnMore" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="text-center fs-5 modal-title">Thẻ quà tặng</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="form-text">Chủ thẻ có thể đổi Thẻ quà tặng MOZANIO tại MOZANIO Boutiques, Trực tuyến hoặc bằng cách gọi cho Câu lạc bộ Nespresso theo số 1800-562-1465. Thẻ Quà tặng không có ngày hết hạn và phải được đổi tại quốc gia nơi thẻ được mua.

                                                            Số tiền tối thiểu có thể nạp vào Thẻ Quà tặng MOZANIO là 10 USD với số tiền tối đa là 500 USD, với bước tăng dần là 5 USD.

                                                            Chủ thẻ chịu trách nhiệm về việc sử dụng Thẻ. Trong trường hợp bị thất lạc hoặc trộm cắp, Thẻ Quà Tặng sẽ không được cấp lại với số dư còn lại. Thẻ không thể đổi thành tiền mặt hoặc một phần tiền mặt và không cho phép chủ sở hữu được hưởng bất kỳ khoản chiết khấu nào. Thẻ không được hoàn tiền và không thể nạp lại.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="" class="mt-3 collapse" id="hiddenForm">
                                <div class="mb-6 row">
                                    <label for="inputSerialnumber" class="col-sm-4 col-form-label form-text">Số seri</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputSerialnumber">
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label for="inputScratch" class="col-sm-4 col-form-label form-text">Mã thẻ</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputScratch">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end py-3">
                                    <a href="" class="btn btn-success">Tiếp tục</a>
                                </div>
                            </form>
                            <div class="row bg-secondary-subtle">
                                <div class="form-text fw-bolder p-2">Phương thức thanh toán khác</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <input type="radio" class="form-check-input residentialRadio1" name="row1">
                                    <i class="bi bi-credit-card-fill fs-2"></i>
                                    <div class="d-flex flex-column text-center align-items-center">
                                        <strong><small>Thẻ tín dụng</small></strong>
                                        <a data-bs-toggle="modal" data-bs-target="#exampleCredit" href="http://" class="form-text text-warning-emphasis text-decoration-none">Xem thêm <i class="bi bi-chevron-right"></i></a>
                                        <div class="modal fade" id="exampleCredit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="text-center fs-5 modal-title">Thẻ tín dụng</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="form-text">Địa chỉ thanh toán phải khớp với địa chỉ trên tài khoản thẻ tín dụng.</p>
                                                        <p class="fw-bold text-center">Thẻ được chấp nhận</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="residentialCheckGroups1 d-flex flex-column justify-content-center">
                                <p class="form-text">Chọn loại thẻ và nhập thông tin chi tiết:</p>
                                <div class="mb-6 row">
                                    <label for="inputNumberCard" class="col-sm-4 col-form-label form-text">Số thẻ tín dụng <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputNumberCard" placeholder="Số thẻ tín dụng">
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label for="inputSecurity" class="col-sm-4 col-form-label form-text">Mã bảo mật <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputSecurity">
                                        <a href="http://" data-bs-toggle="modal" data-bs-target="#exampleCVC/CVV" class="text-decoration-none text-warning-emphasis form-text">CVC/CVV là gì? <i class="bi bi-chevron-right"></i></a>
                                        <div class="modal fade" id="exampleCVC/CVV" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p class="text-center form-text modal-title">
                                                            Số 3 chữ số ở mặt sau của VISA, MasterCard.
                                                            Số có 4 chữ số ở mặt trước của American Express.</p>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label for="inputTime" class="col-sm-4 col-form-label form-text">Ngày hết hạn <span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <select class="form-select" id="inputTime" aria-label="Default select example">
                                            <option selected>Tháng</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select class="form-select" id="inputTime" aria-label="Default select example">
                                            <option selected>Năm</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label for="inputHolderCard" class="col-sm-4 col-form-label form-text">Tên chủ thẻ tín dụng <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputHolderCard" placeholder="Tên chủ thẻ tín dụng">
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label form-text" for="flexCheckDefault">
                                        Lưu thẻ này cho đơn đặt hàng trong tương lai
                                    </label>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <input type="radio" class="form-check-input companyRadio1" name="row1">
                                    <i class="bi bi-google fs-2"></i>
                                    <div class="d-flex flex-column text-center align-items-center">
                                        <strong><small>Google Pay</small></strong>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <input type="radio" class="form-check-input companyRadio1" name="row1">
                                    <i class="bi bi-cash fs-2"></i>
                                    <div class="d-flex flex-column text-center align-items-center">
                                        <strong><small>Thanh toán khi nhận hàng</small></strong>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between py-3">
                                <a href="/shipping" class="text-warning-emphasis form-text text-decoration-none"><i class="bi bi-chevron-left"></i> Quay lại</a>
                                <a href="/review" class="btn btn-success">Tiếp tục <i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 d-none d-lg-block">
                <div class="bg-white">
                    <div class="totalcart container py-3">
                        <p class="fw-bold text-center fs-4">Giỏ hàng</p>
                        <h6 class="fw-bold">Tổng sản phẩm <sup>(110)</sup></h6>
                        <hr>
                        <div class="product">
                            <div class="d-flex justify-content-between">
                                <p class="form-text">Barista Creations Flavor Pack</p>
                                <p class="form-text">x1</p>
                                <small class="form-text text-warning-emphasis">$123.00</small>
                            </div>
                            <hr>
                        </div>
                        <div class="d-flex justify-content-between">
                            <strong>Tạm tính</strong>
                            <p><small class="form-text text-warning-emphasis">$123.00</small></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small>Phí vận chuyển</small></p>
                            <p><small class="form-text text-warning-emphasis">Free</small></p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p><small>Thuế</small></p>
                            <p><small class="form-text text-warning-emphasis">$2.57</small></p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h4 class="fw-bold">Tổng</h4>
                            <strong class="text-warning-emphasis">$123.00</strong>
                        </div>
                        <div class="row p-2">
                            <a href="/cart" class="btn btn-outline-dark">Sửa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection