@extends('client.account.layoutProfile')

@section('title', 'orderhistory')
@section('profile')

                  <div class="col-sm-9">
                      <div class="bg-secondary p-3 row fw-bold text-white">
                      Thanh toán nhanh
                      </div>
                      <div class="bg-white p-3 form-text">
                        <small>Lưu tùy chọn vận chuyển và thanh toán của bạn để thanh toán nhanh.</small>
                      </div>
                      <form action="">
                        <div class="row bg-white justify-content-center">
                            <div class="bg-secondary text-uppercase p-3 fw-bolder text-white">Chọn tùy chọn và địa chỉ giao hàng mặc định</div>
                            <div class="row d-flex flex-column">
                                <p class="form-text text-uppercase">Địa chỉ giao hàng</p>
                                <p>
                                    <strong>Mr. Duy Hoa</strong><br>
                                    <strong>VietNam</strong><br>
                                    <strong>HoChiMinh, 70000</strong>
                                </p>
                                <a href="http://" class="form-text text-decoration-none">Hiện được đặt làm địa chỉ giao hàng mặc định của bạn</a>
                                <a href="http://" class="text-decoration-none form-text text-warning-emphasis" data-bs-toggle="modal" data-bs-target="#exampleModal">Thay đổi địa chỉ giao hàng mặc định của bạn <i class="bi bi-chevron-right"></i></a>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header justify-content-center">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa địa chỉ của tôi</h1>
                                        </div>
                                        <div class="modal-body">
                                            <div class="bg-white">
                                                <p class="text-secondary py-3"><small>Các trường bắt buộc được đánh dấu *</small></p>
                                                <form action="" class="gap-1 d-flex flex-column">
                                                    <div class="row mb-6">
                                                        <div class="col-sm-5">
                                                            <p class="form-text">Địa chỉ giao hàng của tôi là <span class="text-danger">*</span></p>
                                                        </div>
                                                        <div class="col-sm-3 form-check">
                                                            <input type="radio" value="Residential" class="form-check-input residentialRadio" name="addressType" id="residentialRadio">
                                                            <label class="form-check-label form-text" for="residentialRadio">
                                                            Khu dân cư
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-3 form-check">
                                                            <input type="radio" value="Company" class="form-check-input companyRadio" name="addressType" id="companyRadio">
                                                            <label class="form-check-label form-text" for="companyRadio">
                                                           Công ty
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column gap-1 residentialCheckGroups">
                                                        <div class="mb-6 row">
                                                            <label for="inputTitle" class="col-sm-4 col-form-label form-text">Giới tính <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <select class="form-select" id="inputTitle" aria-label="Default select example">
                                                                    <option selected>--</option>
                                                                    <option value="Ms">Ms.</option>
                                                                    <option value="Mr">Mr.</option>
                                                                    <option value="Dr">Dr.</option>
                                                                    <option value="Mrs">Mrs.</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputCountry" class="col-sm-4 col-form-label form-text">Quốc gia <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <select class="form-select" id="inputCountry" aria-label="Default select example">
                                                                    <option selected>--</option>
                                                                    <option value="Việt Nam">Việt Nam</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputFirstName" class="col-sm-4 col-form-label form-text">Tên <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="inputFirstName">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputLastName" class="col-sm-4 col-form-label form-text">Họ <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="inputLastName">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column gap-1 d-none companyCheckGroups">
                                                        <div class="mb-6 row">
                                                            <label for="inputCountry" class="col-sm-4 col-form-label form-text">Quốc gia<span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <select class="form-select" id="inputCountry" aria-label="Default select example">
                                                                    <option selected>--</option>
                                                                    <option value="Việt Nam">Việt Nam</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputCompanyName" class="col-sm-4 col-form-label form-text">Tên công ty <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="inputCompanyName">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputContactFirstName" class="col-sm-4 col-form-label form-text">Tên liên hệ <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="inputContactFirstName">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputLastName" class="col-sm-4 col-form-label form-text">Họ <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="inputLastName">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="mb-6 row">
                                                        <label for="inputAddress1" class="col-sm-4 col-form-label form-text">Địa chỉ 1 <span class="text-danger">*</span></label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="inputAddress1">
                                                        </div>
                                                    </div>
                                                    <div class="mb-6 row">
                                                        <label for="inputAddress2" class="col-sm-4 col-form-label form-text">Địa chỉ 2 </label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="inputAddress2">
                                                        </div>
                                                    </div>
                                                    <div class="mb-6 row">
                                                        <label for="inputCity" class="col-sm-4 col-form-label form-text">Huyện <span class="text-danger">*</span></label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="inputCity">
                                                        </div>
                                                    </div>
                                                    <div class="mb-6 row">
                                                        <label for="inputState" class="col-sm-4 col-form-label form-text">Thành phố <span class="text-danger">*</span></label>
                                                        <div class="col-sm-6">
                                                            <select class="form-select" id="inputState" aria-label="Default select example">
                                                                <option selected>--</option>
                                                                <option value="Quảng Ngãi">Quảng Ngãi</option>
                                                                <option value="TP.Hồ Chí Minh">TP.Hồ Chí Minh</option>
                                                                <option value="Hà Nội">Hà Nội</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-6 row">
                                                        <label for="inputPostal" class="col-sm-4 col-form-label form-text">Mã bưu điện <span class="text-danger">*</span></label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="inputPostal" placeholder="Ví dụ: 70000">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="mb-6 row">
                                                        <label for="inputPhonenumber" class="col-sm-4 col-form-label form-text">Số điện thoại <span class="text-danger">*</span></label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="inputPhonenumber">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="mb-3">
                                                        <div class="textnot1 residentialCheckGroups">
                                                            <label for="validationTextarea" class="form-label form-text">Hướng dẫn giao hàng</label>
                                                            <textarea class="form-control" id="validationTextarea" placeholder="Tin nhắn chứa tối đa 70 ký tự" required></textarea>
                                                            <div class="invalid-feedback">
                                                            Tin nhắn chứa tối đa 70 ký tự
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row companyCheckGroups">
                                                            <label for="inputCountry" class="col-sm-4 col-form-label form-text">Quốc gia <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <select class="form-select" id="inputCountry" aria-label="Default select example">
                                                                    <option selected>--</option>
                                                                    <option value="Việt Nam">Việt Nam</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                            <label class="form-check-label form-text" for="flexCheckDefault">
                                                            Đặt làm địa chỉ giao hàng mặc định
                                                            </label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-outline-dark">Lưu thay đổi</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-3">
                                    <input type="radio" name="row1" class="form-check-input" id="donotchoose">
                                    <label for="donotchoose" class="form-label text-center">Không</label>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-between gap-3 align-items-center">
                                    <input type="radio" class="form-check-input" name="row1">
                                    <i class="bi bi-box-seam fs-1"></i>
                                    <div class="d-flex flex-column text-center align-items-center">
                                        <strong><small>Tiêu chuẩn – Miễn phí</small></strong>
                                        <p class="form-text">Đến sau khi đặt hàng 5-7 ngày</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-between gap-3 align-items-center">
                                    <input type="radio" class="form-check-input" name="row1">
                                    <i class="bi bi-box-seam fs-1"></i>
                                    <div class="d-flex flex-column text-center align-items-center">
                                        <strong><small>Tiêu chuẩn – Trả phí</small></strong>
                                        <p class="form-text">Đến sau khi đặt hàng 2-5 ngày</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="address d-flex gap-3 align-items-center">
                                    <input type="radio" class="form-check-input" name="row1" data-bs-toggle="modal" data-bs-target="#exampleMap">
                                    <i class="bi bi-geo-alt-fill fs-1"></i>
                                    <div class="d-flex flex-column">
                                        <strong><small>Điểm nhận hàng (FedEx or UPS)</small></strong>
                                        <p>Đến sau khi đặt hàng 1-3 ngày</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="address d-flex gap-3 align-items-center">
                                    <input type="radio" class="form-check-input residentialRadio" name="row1" data-bs-toggle="modal" data-bs-target="#exampleMapcheck">
                                    <i class="bi bi-bag-check-fill fs-1"></i>
                                    <div class="d-flex flex-column">
                                        <strong><small>Mozanio Boutique</small></strong>
                                        <p class="form-text">
                                        Tiết kiệm thời gian. Mua hàng trực tuyến, nhận hàng tại cửa hàng.
                                            <br>
                                            Có sẵn tại cửa hàng 2 giờ sau khi bạn đặt hàng trực tuyến. Đơn hàng sẽ được giữ cho đến khi cửa hàng đóng cửa vào ngày hôm sau. Các đơn hàng không có người nhận sẽ bị hủy và hoàn tiền sau 24 giờ kể từ khi mua.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-secondary p-3 row fw-bold text-white">
                                Thanh toán
                            </div>
                            <div class="bg-white row p-3 form-text">
                                <small>Các phương thức thanh toán</small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-3">
                                    <input type="radio" name="row2" id="None" class="form-check-input companyRadio1">
                                    <label for="None" class="form-label">Không</label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <input type="radio" class="form-check-input residentialRadio1" name="row2">
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
                                    <input type="radio" class="form-check-input companyRadio1" name="row2">
                                    <i class="bi bi-google fs-2"></i>
                                    <div class="d-flex flex-column text-center align-items-center">
                                        <strong><small>Google Pay</small></strong>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <input type="radio" class="form-check-input companyRadio1" name="row2">
                                    <i class="bi bi-cash fs-2"></i>
                                    <div class="d-flex flex-column text-center align-items-center">
                                        <strong><small>Thanh toán khi nhận hàng</small></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-secondary p-3 row fw-bold text-white">
                            Kích hoạt Thanh toán nhanh
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="ActivateExpress">
                                <label for="ActivateExpress"><small>Kích hoạt Thanh toán nhanh</small></label>
                                <p class="form-text"><small>Bằng cách chọn hộp này, bạn sẽ bỏ qua các lựa chọn vận chuyển và thanh toán cho mỗi đơn hàng. Bạn luôn có thể cập nhật hoặc xóa tùy chọn của mình.</small></p>  
                            </div>
                            <div class="row justify-content-between p-3">
                                <a href="/shopcoffee" class="btn btn-outline-dark col-sm-3"><i class="bi bi-chevron-left"></i> Trở lại cửa hàng</a>
                                <button class="btn btn-success col-sm-3">Lưu tùy chọn</button>
                            </div>
                        </div>
                    </form>
                  </div>
              
@endsection