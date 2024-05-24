@extends('client.layout')

@section('title', 'shipping')
@section('content')
<main class="bg-black">
    <div class="container">
        <div class="row bg-dark">
            <div class="d-flex flex-wrap justify-content-between">
                <div class="p-3 border-3 border-bottom border-success d-none d-sm-block">
                    <p class="fw-bold text-white">Bước 1 <i class="bi bi-check-lg text-success"></i></p><span class="text-white text-uppercase fs-5">Giỏ hàng</span>
                </div>
                <div class="p-3 border-3 border-bottom border-success">
                    <p class="fw-bold text-white">Bước 2</p><span class="fw-bold text-white text-uppercase fs-5">Thông tin</span>
                </div>
                <div class="p-3 d-none d-sm-block">
                    <p class="fw-bold text-white">Bước 3</p><span class="text-white text-uppercase fs-5">Thanh toán</span>
                </div>
                <div class="p-3 d-none d-sm-block">
                    <p class="fw-bold text-white">Bước 4</p><span class="text-white text-uppercase fs-5">Kiểm tra</span>
                </div>
                <div class="p-3 d-none d-sm-block">
                    <p class="fw-bold text-white">Bước 5</p><span class="text-white text-uppercase fs-5">Xác nhận</span>
                </div>
            </div>
        </div>
        <div class="row py-3 justify-content-between">
            <div class="col-md-8">
                <form action="">
                    <div class="bg-white justify-content-center">
                        <div class="container">
                            <div class="row bg-secondary text-uppercase p-3 fw-bolder text-white">ĐỊA CHỈ GIAO HÀNG</div>
                            <div class="row d-flex flex-column">
                                <p class="form-text text-uppercase">Địa chỉ</p>
                                <p>

                                    @if (auth()->user()->address)
                                    <strong class="text-dark">{{ auth()->user()->last_name }} {{ auth()->user()->first_name }}</strong><br>
                                <p class="text-warning-emphasis">{{ str_replace('|,|', ', ', auth()->user()->address) }}</p>
                                @else
                                <strong>Chưa có địa chỉ</strong>
                                @endif
                                </p>
                                <a href="http://" class="form-text text-decoration-none">Hiện được đặt làm địa chỉ giao hàng mặc định của bạn</a>
                                <a href="http://" class="text-decoration-none form-text text-warning-emphasis" data-bs-toggle="modal" data-bs-target="#exampleModal">Chỉnh sửa địa chỉ <i class="bi bi-chevron-right"></i></a>

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-center">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa địa chỉ của tôi</h1>
                                            </div>
                                            <div class="modal-body">
                                                <div class="bg-white">
                                                    <form action="{{ route('editAddressShipping') }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <p class="text-secondary py-3"><small>Các trường bắt buộc được đánh dấu *</small></p>
                                                        <div class="d-flex flex-column gap-1">
                                                            <div class="mb-6 row">
                                                                <div class="col-sm-5">
                                                                    <p class="form-text">Địa chỉ của tôi <span class="text-danger">*</span></p>
                                                                </div>
                                                                <div class="col-sm-3 form-check">
                                                                    <input type="radio" value="Residential" class="form-check-input" name="row3" id="residentialRadio">
                                                                    <label class="form-check-label form-text" for="residentialRadio">
                                                                        Khu dân cư
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-3 form-check">
                                                                    <input type="radio" value="Company" class="form-check-input" name="row3" id="companyRadio">
                                                                    <label class="form-check-label form-text" for="companyRadio">
                                                                        Công ty
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-column gap-1 d-none companyCheckGroups1">
                                                                <div class="mb-6 row">
                                                                    <label for="inputCompanyName" class="col-sm-4 col-form-label form-text">Tên công ty <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" id="inputCompanyName" name="inputCompanyName" value="{{ $address['inputCompanyName'] }}" placeholder="{{ $address['inputCompanyName'] }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="mb-6 row">
                                                                <label for="country" class="col-sm-4 col-form-label form-text">Quốc gia <span class="text-danger">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ $address['country'] }}" placeholder="{{ $address['country'] }}">
                                                                    @error('country')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="mb-6 row">
                                                                <label for="district" class="col-sm-4 col-form-label form-text">Huyện, Tỉnh - Thành phố <span class="text-danger">*</span></label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="district" class="form-control @error('district') is-invalid @enderror" id="district" value="{{ $address['district'] }}" placeholder="{{ $address['district'] }}">
                                                                    @error('district')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city" value="{{ $address['city'] }}" placeholder="{{ $address['city'] }}">
                                                                    @error('city')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="mb-6 row">
                                                                <label for="inputAddress" class="col-sm-4 col-form-label form-text">Địa chỉ <span class="text-danger">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="inputAddress" name="inputAddress" value="{{ $address['inputAddress'] }}" placeholder="{{ $address['inputAddress'] }}">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="mb-6 row">
                                                                <label for="inputPostal" class="col-sm-4 col-form-label form-text">Mã bưu điện <span class="text-danger">*</span></label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="inputPostal" name="inputPostal" placeholder="{{ $address['inputPostal'] }}" value="{{ $address['inputPostal'] }}">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex p-3 justify-content-between">
                                                                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Đóng</button>
                                                                <button type="submit" class="btn btn-outline-dark">Lưu thay đổi</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row justify-content-center py-3">
                                <button class="btn btn-outline-dark text-uppercase col-md-4" data-bs-toggle="modal" data-bs-target="#exampleAddress">Thêm địa chỉ</button>
                                <div class="modal fade" id="exampleAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-center">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Địa chỉ mới</h1>
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
                                                                <label for="inputCompanyName" class="col-sm-4 col-form-label form-text">Tên công ty <span class="text-danger">*</span></label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" id="inputCompanyName">
                                                                </div>
                                                            </div>
                                                            <div class="mb-6 row">
                                                                <label for="inputContactName" class="col-sm-4 col-form-label form-text">Tên liên hệ <span class="text-danger">*</span></label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" id="inputContactName">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-6 row">
                                                            <label for="inputAddress1" class="col-sm-4 col-form-label form-text">Địa chỉ <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="inputAddress1">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputAddress2" class="col-sm-4 col-form-label form-text">Địa chỉ 2</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="inputAddress2">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputCity" class="col-sm-4 col-form-label form-text">Quận, Huyện <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="inputCity">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputState" class="col-sm-4 col-form-label form-text">Tỉnh <span class="text-danger">*</span></label>
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
                                                            <label for="inputPhonenumber" class="col-sm-4 col-form-label form-text">Số điện thaoi <span class="text-danger">*</span></label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="inputPhonenumber">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputTypeCountry" class="col-sm-4 col-form-label form-text">Tỉnh, Quốc gia</label>
                                                            <div class="col-sm-3">
                                                                <select class="form-select" id="inputTypeCountry" aria-label="Default select example">
                                                                    <option selected>--</option>
                                                                    <option value="Quảng Ngãi">Quảng Ngãi</option>
                                                                    <option value="TP.Hồ Chí Minh">TP.Hồ Chí Minh</option>
                                                                    <option value="Hà Nội">Hà Nội</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <select class="form-select" id="inputTypeCountry" aria-label="Default select example">
                                                                    <option selected>--</option>
                                                                    <option value="Việt Nam">Việt Nam</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputPhonenumber2" class="col-sm-4 col-form-label form-text">Số điện thoai 2</label>
                                                            <div class="col-sm-6">
                                                                <input type="text" class="form-control" id="inputPhonenumber2">
                                                            </div>
                                                        </div>
                                                        <div class="mb-6 row">
                                                            <label for="inputTypeCountry2" class="col-sm-4 col-form-label form-text">Tỉnh, Quốc gia</label>
                                                            <div class="col-sm-3">
                                                                <select class="form-select" id="inputTypeCountry2" aria-label="Default select example">
                                                                    <option selected>--</option>
                                                                    <option value="Quảng Ngãi">Quảng Ngãi</option>
                                                                    <option value="TP.Hồ Chí Minh">TP.Hồ Chí Minh</option>
                                                                    <option value="Hà Nội">Hà Nội</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <select class="form-select" id="inputTypeCountry2" aria-label="Default select example">
                                                                    <option selected>--</option>
                                                                    <option value="Việt Nam">Việt Nam</option>
                                                                </select>
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
                                                                <label for="inputCountry2" class="col-sm-4 col-form-label form-text">Quốc gia <span class="text-danger">*</span></label>
                                                                <div class="col-sm-6">
                                                                    <select class="form-select" id="inputCountry2" aria-label="Default select example">
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
                                                <button type="button" class="btn btn-outline-dark">Lưu</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row bg-secondary text-uppercase fw-bolder text-white p-3">TÙY CHỌN VẬN CHUYỂN</div>
                            <div class="row bg-secondary-subtle">
                                <div class="form-text fw-bold p-2">Giao hàng tận nhà và văn phòng</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-between gap-3 align-items-center">
                                    <input type="radio" class="form-check-input" name="row1">
                                    <i class="bi bi-box-seam fs-1"></i>
                                    <div class="d-flex flex-column text-center align-items-center">
                                        <strong><small>Tiêu chuẩn – Miễn phí</small></strong>
                                        <p class="form-text">Đến sau khi đặt hàng 5-7 ngày</p>
                                    </div>
                                </div>
                                <p class="text-warning-emphasis form-text">Miễn phí</p>
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
                                <p class="text-warning-emphasis form-text">$6.95</p>
                            </div>
                            <div class="row bg-secondary-subtle">
                                <div class="form-text fw-bold p-2">Giao hàng miễn phí</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="address d-flex gap-3 align-items-center">
                                    <input type="radio" class="form-check-input companyRadio1" name="row2" data-bs-toggle="modal" data-bs-target="#exampleMap">
                                    <i class="bi bi-geo-alt-fill fs-1"></i>
                                    <div class="d-flex flex-column">
                                        <strong><small>Điểm nhận (FedEx or UPS)</small></strong>
                                        <p>Đến sau khi đặt hàng 1-3 ngày</p>
                                        <a href="http://" data-bs-toggle="modal" data-bs-target="#exampleTitleMap" class="form-text text-warning-emphasis text-decoration-none">Xem thêm <i class="bi bi-chevron-right"></i></a>
                                        <div class="modal fade" id="exampleTitleMap" tabindex="-1" aria-labelledby="exampleTitleMap" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5">Điểm nhận (FedEx or UPS)</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="form-text">
                                                            Làm thế nào nó hoạt động?
                                                            Nhờ sự hợp tác của chúng tôi với FedEx và UPS, bạn có thể nhận đơn đặt hàng từ FedEx hoặc UPS
                                                            điểm đón gần bạn. Tất cả những gì bạn phải làm là chọn điểm đón khi thanh toán. Bạn sẽ nhận được e-mail khi đơn đặt hàng của bạn đã sẵn sàng để được nhận. Bạn sẽ được yêu cầu xuất trình ID chính phủ khi nhận đơn đặt hàng. Khi người khác đến nhận đơn đặt hàng của bạn, họ cũng sẽ được yêu cầu xuất trình bằng chứng nhận dạng.
                                                            Giờ mở cửa của các điểm đón khác nhau; chúng sẽ được đề cập khi bạn chọn điểm đón.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-warning-emphasis form-text">Miễn phí</p>
                            </div>
                            <hr>
                            <div class="modal fade" id="exampleMap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header flex-column">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Điểm nhận</h1>
                                            <p class="form-text text-center">Chọn điểm mà bạn muốn đơn hàng của mình được giao</p>
                                        </div>
                                        <div class="modal-body">
                                            <div class="ratio ratio-16x9">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123234.67105676064!2d108.75994464810496!3d15.153759948793123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316852cd89603939%3A0x2e554f035a6642c3!2zVHAuIFF14bqjbmcgTmfDo2ksIFF14bqjbmcgTmfDo2ksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1713921243340!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="address d-flex gap-3 align-items-center">
                                    <input type="radio" class="form-check-input residentialRadio1" name="row2" data-bs-toggle="modal" data-bs-target="#exampleMapcheck">
                                    <i class="bi bi-bag-check-fill fs-1"></i>
                                    <div class="d-flex flex-column">
                                        <strong><small>Cửa hàng cà phê MOZANIO</small></strong>
                                        <p class="form-text">
                                            Tiết kiệm thời gian. Mua hàng trực tuyến, nhận hàng tại cửa hàng.
                                            <br>
                                            Có sẵn tại cửa hàng 2 giờ sau khi bạn đặt hàng trực tuyến. Đơn hàng sẽ được giữ cho đến khi cửa hàng đóng <br> cửa vào ngày hôm sau. Các đơn hàng không có người nhận sẽ bị hủy và hoàn tiền sau 24 giờ kể từ khi mua.
                                        </p>
                                        <div class="mb-6 row residentialCheckGroups1">
                                            <label for="inputPhonenumber" class="col-sm-4 col-form-label form-text">Điện thoại di động <span class="text-danger">*</span></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputPhonenumber">
                                            </div>
                                        </div>
                                        <a href="http://" data-bs-toggle="modal" data-bs-target="#exampleMapcheck" class="form-text text-warning-emphasis text-decoration-none">Lựa chọn <i class="bi bi-chevron-right"></i></a>
                                    </div>
                                </div>
                                <p class="text-warning-emphasis form-text">Miễn phí</p>
                            </div>
                            <div class="modal fade" id="exampleMapcheck" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header flex-column  row">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">CHỌN CỬA HÀNG</h1>
                                            <div class="mb-6 row">
                                                <div class="col-8">
                                                    <input type="text" class="form-control" placeholder="Nhập thành phố của bạn">
                                                </div>
                                                <button class="btn btn-outline-dark col-4">TÌM KIẾM</button>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">35 cửa hàng gần đây</p>
                                        </div>
                                        <div class="modal-footer container">
                                            <div class="form-text">
                                                <p>Cửa hàng cà phê MOZANIO
                                                    <br>
                                                    1180 Broadway Plaza
                                                    <br>
                                                    94596 <span>Walnut Creek</span>
                                                    <br>
                                                    Your order will be ready on <span>Wednesday 04/24 at 02h00 PM</span>
                                                </p>
                                                <a href="http://" class="form-text text-warning-emphasis text-decoration-none">Chi tiết <i class="bi bi-chevron-right"></i></a>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between py-3">
                                <a href="{{ route('checkout') }}" class="text-warning-emphasis form-text text-decoration-none"><i class="bi bi-chevron-left"></i> Quay lại</a>
                                <a href="/payment" class="btn btn-success">Tiếp tục <i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4 d-none d-lg-block">
                <div class="totalcart py-3 container bg-white">
                    <p class="fw-bold text-center fs-4">Giỏ hàng</p>
                    <h6 class="fw-bold">Tổng số lượng <sup>({{session('totalQuantity')}})</sup></h6>
                    <hr>
                    @if ($discountAmount)
                    <div class="d-flex justify-content-between">
                        <p><small>Giảm giá</small></p>
                        <p><small class="form-text text-warning-emphasis">{{ number_format($discountAmount, 0, ',', '.') }} VND</small></p>
                    </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <p><small>Thuế</small></p>
                        <p><small class="form-text text-warning-emphasis">{{ number_format($newTax, 0, ',', '.') }} VND</small></p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h4 class="fw-bold">Tổng</h4>
                        <strong class="text-warning-emphasis">{{ number_format($newTotal, 0, ',', '.') }} VND</strong>
                    </div>
                    <div class="row p-2">
                        <a href="/cart" class="btn btn-outline-dark">Sửa</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        console.log('Form is being submitted');
    });
</script>
@endsection