@extends('client.account.layoutProfile')

@section('title', 'profile')
@section('profile')
    <div class="col-sm-9">
        <form action="{{ route('update.put') }}" class="d-flex flex-column gap-3" method="POST">
            @csrf
            @method('PUT')
            <div class="bg-body-secondary p-3 row fw-bold">
                Thông tin cá nhân của tôi
            </div>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <p class="form-text">Điền vào mẫu dưới đây để cập nhật thông tin cá nhân của bạn.</p>
            <div class="md-6 row">
                <label for="FirstName" class="form-label col-sm-4 form-text">Tên <span class="text-danger">*</span></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control @error('FirstName') is-invalid @enderror" id="FirstName"
                        value="{{ auth()->user()->first_name }}" name="FirstName" placeholder="Vui lòng nhập tên của bạn">
                    @error('FirstName')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="md-6 row">
                <label for="LastName" class="form-label col-sm-4 form-text">Họ <span class="text-danger">*</span></label>
                <div class="col-sm-6">
                    <input type="text" class="form-control @error('LastName') is-invalid @enderror" id="LastName"
                        value="{{ auth()->user()->last_name }}" name="LastName" placeholder="Vui lòng nhập họ của bạn">
                    @error('LastName')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="md-6 row">
                <label for="Email" class="form-label col-sm-4 form-text">Địa chỉ Email</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="Email" value="{{ auth()->user()->email }}"
                        name="Email" disabled>
                </div>
            </div>
            <div class="md-6 row">
                <label for="phoneNumber" class="form-label col-sm-4 form-text">Số điện thoại </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control @error('phoneNumber') is-invalid @enderror" id="phoneNumber"
                        value="{{ auth()->user()->phone_number }}" name="phoneNumber"
                        placeholder="Vui lòng nhập vào số điện thoại của bạn">
                    @error('phoneNumber')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="md-6 row justify-content-end p-3">
                <button class="btn btn-outline-dark col-sm-3" type="submit" value="Save">Lưu</button>
            </div>
        </form>
        <hr>
        <form action="{{ route('change.password') }}" class="d-flex flex-column gap-3" method="POST">
            @csrf
            @method('PUT')
            <strong class="fs-4">Đổi mật khẩu</strong>
            <div class="md-6 row">
                <label for="CurrentPassword" class="form-label col-sm-4 form-text">Mật khẩu hiện tại <span
                        class="text-danger">*</span></label>
                <div class="col-sm-6">
                    <input type="password" class="form-control @error('CurrentPassword') is-invalid @enderror"
                        id="CurrentPassword" value="" name="CurrentPassword">
                    @error('CurrentPassword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="md-6 row">
                <label for="NewPassword" class="form-label col-sm-4 form-text">Mật khẩu mới <span
                        class="text-danger">*</span></label>
                <div class="col-sm-6">
                    <input type="password" class="form-control @error('NewPassword') is-invalid @enderror" id="NewPassword"
                        value="" name="NewPassword">
                    @error('NewPassword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <p class="form-text">Mật khẩu phải:</p>
                    <ul>
                        <li class="form-text">Có từ 8 đến 15 ký tự</li>
                        <li class="form-text">Chứa một số</li>
                        <li class="form-text">Chứa một chữ cái viết thường</li>
                        <li class="form-text">Chứa chữ in hoa</li>
                    </ul>
                </div>
            </div>
            <div class="md-6 row">
                <label for="ConfirmNewPassword" class="form-label col-sm-4 form-text">Xác nhận mật khẩu mới <span
                        class="text-danger">*</span></label>
                <div class="col-sm-6">
                    <input type="password" class="form-control @error('ConfirmNewPassword') is-invalid @enderror"
                        id="ConfirmNewPassword" value="" name="ConfirmNewPassword">
                    @error('ConfirmNewPassword')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="md-6 row justify-content-end p-3">
                <button class="btn btn-outline-dark col-sm-3" type="submit" value="Save">Lưu</button>
            </div>
        </form>
    </div>
@endsection
