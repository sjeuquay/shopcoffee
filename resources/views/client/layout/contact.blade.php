@extends('client.layout')

@section('title', 'contact')
@section('content')

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <!-- banner -->
    <section>
        <div class="banner_contact">
            <div class="d-flex justify-content-center align-items-center h-100">
                <h2 class="text-white text-uppercase title-contact_banner text-center fw-bold">Liên hệ với chúng tôi</h2>
            </div>
        </div>
    </section>
    <!-- end banner -->

    <!-- contact form -->
    <section class="d-block">
        <div class="bg-dark">
            <div class="container py-4" style="max-width: 996px !important;">
                <div class="mb-3">
                    <span class="text-white ">Vui lòng cung cấp cho chúng tôi một số thông tin để chúng tôi có thể hướng dẫn
                        tốt nhất
                        yêu cầu của bạn</span>
                </div>
                <div class="bg-white justify-content-center">
                    <form action="" method="POST">
                        @csrf
                        <div class="bg-secondary text-uppercase p-3 fw-bolder text-white">Chi tiết liên lạc của bạn</div>
                        <div class="p-3">
                            <p class="form-text">Tất cả các trường được đánh dấu * là bắt buộc</p>
                            <div class="mb-6 row align-items-center mb-2">
                                <label for="first_name" class="col-sm-4 col-form-label form-text">Tên <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input name="first_name" type="text"
                                        class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                        placeholder="" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-6 row align-items-center mb-2">
                                <label for="last_name" class="col-sm-4 col-form-label form-text">Họ <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input name="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                        placeholder="">
                                    @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-2">
                                <input type="checkbox" name="is_current_customer">
                                <label for="" class="form-text">Bạn là khách hàng hiện tại?</label>
                            </div>
                            <div class="mb-6 row align-items-center mb-2">
                                <label for="user_name" class="col-sm-4 col-form-label form-text">Tên tài khoản</label>
                                <div class="col-sm-6">
                                    <input name="user_name" type="text"
                                        class="form-control @error('user_name') is-invalid @enderror" id="username"
                                        placeholder="" value="{{ old('user_name') }}">
                                </div>
                            </div>
                            <div class="mb-6 row align-items-center mb-2">
                                <label for="company" class="col-sm-4 col-form-label form-text">Công ty <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input name="company" type="text"
                                        class="form-control @error('company') is-invalid @enderror" id="company"
                                        placeholder="">
                                    @error('company')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-6 row align-items-center mb-2">
                                <label for="company_type" class="col-sm-4 col-form-label form-text">Loại hình doanh
                                    nghiệp</label>
                                <div class="col-sm-6">
                                    <select name="company_type" id="company_type" class="form-select" name="company_type">
                                        <option value="">Vui lòng chọn</option>
                                        <option value="Other">Other</option>
                                        <option value="Premium Food Service">Premium Food Service</option>
                                        <option value="Restaurant or Cafe">Restaurant or Cafe</option>
                                        <option value="Hotel">Hotel</option>
                                        <option value="Office">Office</option>
                                        <option value="Retail">Retail</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-6 row align-items-center mb-2">
                                <label for="position" class="col-sm-4 col-form-label form-text">Chức vụ</label>
                                <div class="col-sm-6">
                                    <input name="position" type="text" class="form-control" id="position"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="mb-6 row align-items-center mb-2">
                                <label for="employee_number" class="col-sm-4 col-form-label form-text">Số lượng nhân
                                    viên</label>
                                <div class="col-sm-6">
                                    <select name="employee_number" id="employee_number" class="form-select"
                                        name="employee_number">
                                        <option value="">Vui lòng chọn</option>
                                        <option value="5-9">5-9</option>
                                        <option value="20-49">20-49</option>
                                        <option value="50-99">50-99</option>
                                        <option value="500-1000">500-1000</option>
                                        <option value="Over 1000">Over 1000</option>
                                        <option value="100-199">100-199</option>
                                        <option value="1-4">1-4</option>
                                        <option value="300-499">300-499</option>
                                        <option value="200-299">200-299</option>
                                        <option value="10-19">10-19</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-6 row align-items-center mb-2">
                                <label for="zip_code" class="col-sm-4 col-form-label form-text">Mã Bưu Chính <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input name="zip_code" type="text"
                                        class="form-control @error('zip_code') is-invalid @enderror" id="zip_code"
                                        placeholder="">
                                    @error('zip_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-6 row align-items-center mb-2">
                                <label for="phone_number" class="col-sm-4 col-form-label form-text">Số điện thoại (ex.
                                    5555555555) <span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input name="phone_number" type="text"
                                        class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                                        placeholder="">
                                    @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-6 row align-items-center mb-2">
                                <label for="email" class="col-sm-4 col-form-label form-text">Email <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <input name="email" type="text"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="bg-secondary text-uppercase p-3 fw-bolder text-white">Hãy giúp chúng tôi tư vấn cho bạn
                        </div>
                        <div class="p-3">
                            <div class="mb-6 row align-items-center mb-2">
                                <label for="contents" class="col-sm-4 col-form-label form-text">Xin vui lòng bao gồm bất
                                    kỳ thông tin có liên quan bổ sung ở đây. <span class="text-danger">*</span></label>
                                <div class="col-sm-6">
                                    <textarea name="contents" class="form-control @error('contents') is-invalid @enderror" id="contents" cols="30"
                                        rows="5"></textarea>
                                    @error('contents')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end py-3">
                            <button type="submit" class="btn btn-success w-25">Gởi</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- end contact form -->

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content content_contact">
                <div class="header-succes_contact">
                    <button type="button" class="close" id="closeModalButton" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="body-success_contact">
                    <div class="icon-success_contact">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-check-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path
                                d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                        </svg>
                    </div>
                    <h3>Cảm ơn bạn đã liên hệ</h3>
                    <p>Chúng tôi sẽ liên lạc lại với bạn trong thời gian sớm nhất có thể</p>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#successModal').modal('show');
                setTimeout(function() {
                    $('#successModal').modal('hide');
                }, 5000);
            });
            document.getElementById('closeModalButton').addEventListener('click', function() {
                $('#successModal').modal('hide');
            });
        </script>
    @endif


@endsection
