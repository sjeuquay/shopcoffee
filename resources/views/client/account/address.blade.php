@extends('client.account.layoutProfile')

@section('title', 'address')
@section('profile')

    <div class="col-sm-9">
        <div class="bg-body-secondary p-3 row fw-bold">
            Địa chỉ của bạn
        </div>
        <div class="row">
            <div class="col-sm-6">
                <strong>
                    <p class="form-text text-dark">Địa chỉ</p>
                    @if (auth()->user()->address)
                        <p class="form-text text-dark">Mr/Ms {{ auth()->user()->last_name }}
                            {{ auth()->user()->first_name }}</p>
                        <p class="form-text text-dark">{{ auth()->user()->country_code }}</p>
                        <p class="form-text text-dark">{{ str_replace('|,|', ', ', auth()->user()->address) }}
                        </p>
                </strong>
            </div>
            <div class="col-sm-6">
                <p class="form-text text-dark">
                    @if (auth()->user()->phone_number)
                        Số điện thoại: {{ auth()->user()->phone_number }}
                    @else
                        <p class="form-text text-dark">Số điện thoại: Chưa có số điện thoại.</p>
                    @endif
                </p>
            </div>
            <a href="{{ route('edit-address') }}" class="btn btn-outline-dark col-sm-3">CHỈNH SỬA ĐỊA CHỈ</a>
            <span class="form-text"><i class="bi bi-check"></i><small> Địa chỉ giao hàng mặc định của
                    tôi</small></span>
            <span class="form-text"><i class="bi bi-check"></i><small> Địa chỉ thanh toán mặc định của
                    tôi</small></span>
        @else
            <div class="fs-5 form-text">
                <p class="text-dark-emphasis">Hãy thêm địa chỉ của bạn.</p>
            </div>
            @endif
        </div>
        @if (!auth()->user()->address)
            <div class="row bg-secondary-subtle p-3 justify-content-end">
                <a href="/addaddress" class="btn btn-outline-dark col-sm-3">THÊM ĐỊA CHỈ</a>
            </div>
        @endif
    </div>

@endsection
