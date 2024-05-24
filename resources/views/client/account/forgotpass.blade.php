@extends('client.layout')

@section('title', 'forgotpass')
@section('content')

<main class="explore-machines">  
        <picture class="picture picture-explore">
            <source media="(min-width: 1440px)" srcset="{{ asset('img/explore-machines-bg@2x-min.jpg') }}">
            <img src="{{ asset('img/explore-machines-bg-min.jpg') }}" alt="">
        </picture>
        <div class="pb-3 position-relative" style="z-index: 2;">
            <form class="container" action="">
                <p class="py-3 fs-3 fw-blod"><strong>Quên mật khẩu?</strong></p>
                <p class="form-text"><small>Các trường được đánh dấu bằng "*" là bắt buộc</small></p>
                <div class="mb-3 row">
                    <label for="inputEmail" class="col-sm-3 col-form-label form-text">Địa chỉ Email <span class="text-danger">*</span></label>
                    <div class="col-sm-4">
                      <input type="email" class="form-control" id="inputEmail">
                    </div>
                </div>
                <p>Chúng tôi sẽ gửi cho bạn một email có liên kết để hỗ trợ bạn đặt lại mật khẩu. Kiểm tra thông báo hoặc trong thư mục thư rác của bạn để tìm email từ chúng tôi.</p>
                <hr>
                <div class="row p-2">
                    <a href="/login" class="btn btn-success col-md-2 text-uppercase">tiếp tục <i class="bi bi-chevron-right"></i></a>
                </div>
            </form>
        </div>
    </main>

@endsection