@extends('client.layout')

@section('title', 'register')
@section('content')
    <main class="bg-black">
        <div class="container pb-3">
            <form class="bg-white container" action="" method="POST">
                @csrf
                <p class="text-secondary py-3"><small>Xin vui lòng điền vào mẫu dưới đây. Các trường có dấu * là bắt buộc.</small></p>
                <div class="mb-4 row">
                    <label for="inputEmail" class="col-sm-3 col-form-label form-text">Email <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="inputAccount" class="col-sm-3 col-form-label form-text">Tài khoản <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" id="inputAccount" name="user_name" value="{{ old('user_name') }}">
                        @error('user_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="inputAccount" class="col-sm-3 col-form-label form-text">Họ<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="inputAccount" name="last_name" value="{{ old('last_name') }}">
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="inputAccount" class="col-sm-3 col-form-label form-text">Tên<span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="inputAccount" name="first_name" value="{{ old('first_name') }}">
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label form-text">Mật khẩu <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" name="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="text-secondary">
                            <span style="color: rgba(0, 0, 0, 0.393)"><small>Mật khẩu phải:</small></span>
                            <ul style="color: rgba(0, 0, 0, 0.393)">
                                <li><small>Có từ 8 đến 15 ký tự</small></li>
                                <li><small>Chứa một số</small></li>
                                <li><small>Chứa một chữ cái viết thường</small></li>
                                <li><small>Chứa chữ in hoa</small></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row d-flex justify-content-end container">
                    <p class="text-secondary"><small>Bằng cách nhấp vào “tiếp tục”, tôi đã đọc và đồng ý với Thông báo về quyền riêng tư và Điều khoản dịch vụ của MOZANIO.</small></p>
                    <button type="submit" class="btn btn-success col-md-2 text-uppercase my-3">tiếp tục <i class="bi bi-chevron-right"></i></button>
                </div>
            </form>
            
        </div>
    </main>
@endsection
