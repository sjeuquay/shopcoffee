@extends('admin.layout')

@section('title', 'đặt lại mật khẩu')

@section('content')

    <div class="container">
        <a href="{{ route('admin.user.resetPasswordAnnounce') }}">Annouce</a>
        <div class="bg-white rounded col-5 p-5 m-auto">
            <p class="fs-3 text-center">Mozanio</p>
            <p>Nhập Gmail vào khung bên dưới, chúng tôi sẽ gửi mã đặt lại mật khẩu</p>
            <form action="{{ route('admin.user.rolepermission') }}" method="post">
                <div class="form-box mb-2">
                    <label for="" class="form-label">Email</label>
                    <div class="input-group">
                        <input type="text" placeholder="Nhập gmail..." class="form-control col-8">
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Gửi</button>
            </form>
        </div>
    </div>

@endsection
