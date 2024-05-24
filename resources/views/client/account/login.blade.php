@extends('client.layout')

@section('title', 'login')
@section('content')

    <main class="bg-dark">
        <div class="container py-5">
            <div class="row justify-content-around">
                <!-- Modal -->
                <div id="myModal" class="modal" style="display: none;" data-login-attempts="{{ $loginAttempts ?? 0 }}"
                    data-reset-attempts-url="{{ route('reset.attempts') }}">
                    <div class="modal-box">
                        <div class="modal-content" style="max-width:500px;padding:10px;">
                            <div class="modal-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                                    class="bi bi-exclamation-diamond" viewBox="0 0 16 16">
                                    <path
                                        d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.48 1.48 0 0 1 0-2.098zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z" />
                                    <path
                                        d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                </svg>
                            </div>
                            <p>Bạn đã nhập sai mật khẩu quá 5 lần. Vui lòng chờ trong vòng 15 giây trước khi thử lại.</p>
                            <p id="countdown">15</p> <!-- Hiển thị đếm ngược -->
                        </div>
                    </div>
                </div>

                <div id="overlay"
                    style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999;">
                </div>

                <form action="" class="col-md-5 bg-white" method="POST">
                    @csrf
                    <div class="row">
                        <p class="bg-secondary-subtle text-uppercase p-3 fw-bolder" style="font-size: 1rem;">TÔI LÀ MỘT
                            KHÁCH HÀNG CŨ</p>
                    </div>
                    <div class="mb-4 row">
                        <label for="inputUserName" class="col-sm-3 col-form-label form-text">Tài khoản <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('user_name') is-invalid @enderror"
                                id="inputUserName" name="user_name" value="{{ old('user_name') }}">
                            @error('user_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="password" class="col-sm-3 col-form-label form-text">Mật khẩu <span
                                class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="inputPassword" name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-between">
                            <div class="form">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label form-text" for="exampleCheck1">Ghi nhớ tài khoản</label>
                            </div>
                            <a href="/forgotpass" class="text-warning-emphasis text-end nav-link">Quên mật khẩu? <i
                                    class="bi bi-caret-right-fill"></i></a>
                        </div>
                    </div>
                    <div class="row justify-content-around p-3">
                        <button class="btn btn-outline-dark col-md-4 form-text" id="loginButton" type="submit">Đăng nhập <i
                                class="bi bi-chevron-right"></i></button>
                    </div>
                </form>


                <form action="" class="col-md-5 bg-white">
                    <div class="row">
                        <p class="bg-secondary-subtle text-uppercase p-3 fw-bolder" style="font-size: 1rem;">TÔI LÀ MỘT
                            KHÁCH HÀNG MỚI</p>
                    </div>
                    <div class="container">
                        <div class="row">
                            <img class="img-fluid"
                                src="{{ asset('img/LOGIN-Benefit-tiles-778x315v3.avif') }}" alt="">
                        </div>
                        <div class="row text-end justify-content-end pb-3">
                            <a href="/register" class="btn btn-success col-sm-4 form-text">Tiếp tục</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    @vite('resources/js/client/login.js')
@endsection
