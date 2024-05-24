@extends('client.layout')

@section('title', 'nextregister')
@section('content')
<main class="bg-black">
        <div class="container">
            <div class="row justify-content-center">
                <div class="bg-white">
                    <p class="text-secondary py-3"><small>Xin vui lòng điền vào mẫu dưới đây. Các trường có dấu * là bắt buộc.</small></p>
                    <form action="" class="gap-1 d-flex flex-column">
                        <div class="row mb-6">
                            <div class="col-sm-4">
                                <p class="form-text">Địa chỉ giao hàng của tôi là <span class="text-danger">*</span></p>
                            </div>
                            <div class="col-sm-4 form-check">
                                <input type="radio" value="Residential" class="form-check-input residentialRadio" name="row1" id="residentialRadio">
                                <label class="form-check-label form-text" for="residentialRadio">
                                    Khu dân cư
                                </label>
                            </div>
                            <div class="col-sm-4 form-check">
                                <input type="radio" value="Company" class="form-check-input companyRadio" name="row1" id="companyRadio">
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
                                <label for="inputCountry" class="col-sm-4 col-form-label form-text">Quốc gia <span class="text-danger">*</span></label>
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
                            <label for="inputAddress2" class="col-sm-4 col-form-label form-text">Dịa chỉ 2 </label>
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
                            <label for="inputPostal" class="col-sm-4 col-form-label form-text">Mã bưu điện  <span class="text-danger">*</span></label>
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
                        <div class="mb-6 row textnot1 residentialCheckGroups">
                            <label for="validationTextarea" class="form-label form-text col-sm-4">Hướng dẫn giao hàng</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="validationTextarea" placeholder="Message for Courier-Max 70 Characters" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <p class="fw-bold bg-secondary-subtle p-3">ĐỊA CHỈ THANH TOÁN</p>
                            <div class="row mb-6">
                                <div class="col-sm-4">
                                    <p class="form-text">Địa chỉ thanh toán của tôi</p>
                                </div>
                                <div class="col-sm-4 form-check">
                                    <input type="radio" value="is the same as my delivery address" class="form-check-input thesameRadio" name="row2"id="residentialRadio1">
                                    <label class="form-check-label form-text" for="residentialRadio1">
                                        giống với địa chỉ giao hàng của tôi
                                    </label>
                                </div>
                                <div class="col-sm-4 form-check">
                                    <input type="radio" value="is different from my delivery address" class="form-check-input differentRadio" name="row2" id="companyRadio1">
                                    <label class="form-check-label form-text" for="companyRadio1">
                                        khác với địa chỉ giao hàng của tôi
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex flex-column gap-1 d-none differentCheckGroups">
                                <div class="row mb-6">
                                    <div class="col-sm-5">
                                        <p class="form-text">Địa chỉ giao hàng của tôi là <span class="text-danger">*</span></p>
                                    </div>
                                    <div class="col-sm-3 form-check">
                                        <input type="radio" value="Residential" class="form-check-input residentialRadio1" name="row3" id="residentialRadio">
                                        <label class="form-check-label form-text" for="residentialRadio">
                                            Khu dân cư
                                        </label>
                                    </div>
                                    <div class="col-sm-3 form-check">
                                        <input type="radio" value="Company" class="form-check-input companyRadio1" name="row3" id="companyRadio">
                                        <label class="form-check-label form-text" for="companyRadio">
                                            Công ty
                                        </label>
                                    </div>
                                </div>
                                <div class="d-flex flex-column gap-1 residentialCheckGroups1">
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
                                <div class="d-flex flex-column gap-1 d-none companyCheckGroups1">
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
                                        <input type="text" class="form-control" id="inputPostal" placeholder="Example: 70000">
                                    </div>
                                </div>
                                <hr>
                                <div class="mb-6 row">
                                    <label for="inputPhonenumber" class="col-sm-4 col-form-label form-text">Số điện thoại <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputPhonenumber">
                                    </div>
                                </div>
                                <div class="mb-6 row">
                                    <label for="inputTypeCountry" class="col-sm-4 col-form-label form-text">Tỉnh, Quốc Gia</label>
                                    <div class="col-sm-3    ">
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
                                    <label for="inputPhonenumber2" class="col-sm-4 col-form-label form-text">Số điện thoại 2</label>
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
                            </div>
                        </div>
                        <div class="row">
                            <p class="fw-bold bg-secondary-subtle p-3">LIÊN HỆ ƯU ĐÃI</p>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <p class="form-text ">Giữ liên lạc với gia đình MOZANIO* về các sản phẩm, dịch vụ, ưu đãi và thông tin độc quyền mới liên quan đến cà phê. Vui lòng xem lại và xác nhận tùy chọn liên hệ của bạn. Bạn vẫn có thể mua MOZANIO cũng như các sản phẩm và dịch vụ liên quan ngay cả khi không đăng ký và bạn có thể thay đổi quyết định bất kỳ lúc nào (để tìm hiểu thêm, hãy xem Thông báo về quyền riêng tư của chúng tôi).</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label form-text" for="flexCheckDefault">
                                    E-mail Sự đồng ý của bạn cho phép chúng tôi truyền đạt những tin tức và ưu đãi mới nhất qua e-mail.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row p-2 justify-content-end">
                            <a href="/home" class="btn btn-success form-text col-sm-4">Lưu địa chỉ của tôi <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </form>
                </div>
                <!-- <div class="col-md-4 d-none d-lg-block">
                    <div class="totalcart bg-white container">
                        <p class="fw-bold text-center">SHOPPING BAG</p>
                        <h6 class="fw-bold">ToTalCount <sup>(110)</sup></h6>
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
                            <strong>SUBTOTAL</strong>
                            <p><small class="form-text text-warning-emphasis">$123.00</small></p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <h4 class="fw-bold">TOTAL</h4>
                            <strong class="text-warning-emphasis">$123.00</strong>
                        </div>
                        <div class="row p-2">
                            <a href="#" class="btn btn-outline-dark">EDIT</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
</main>
@endsection