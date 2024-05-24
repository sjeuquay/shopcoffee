<div class="col-sm-3">
    <!-- Menu desktop -->
    <ul class="list-group list-group-flush desktop-menu d-none d-lg-block">
        <li class="list-group-item d-flex flex-column">
            <strong class="fs-5">Tài khoản của tôi</strong>
            <strong class="form-text">Xin chào, {{ auth()->user()->last_name }}
                {{ auth()->user()->first_name }}</strong>
            <strong class="form-text">Mã tài khoản: {{ auth()->user()->id }}</strong>
        </li>
        <li class="list-group-item"><a href="/orderhistory"
                class="form-text text-decoration-none text-dark"><i class="bi bi-handbag fs-2"></i> Lịch sử
                mua hàng</a></li>
        <li class="list-group-item"><a href="/address" class="form-text text-decoration-none text-dark"><i
                    class="bi bi-list-ul fs-2"></i> Địa chỉ</a></li>
        <li class="list-group-item"><a href="/profile" class="form-text text-decoration-none text-dark"><i
                    class="bi bi-person-check fs-2"></i> Thông tin tài khoản</a></li>
        <li class="list-group-item"><a href="/checkoutpreferences"
                class="form-text text-decoration-none text-dark"><i class="bi bi-receipt-cutoff fs-2"></i>
                Tùy chọn thanh toán</a></li>
    </ul>

    <div class="dropdown d-lg-none">
        <div class="d-flex flex-column">
            <strong class="fs-5">Tài khoản của tôi</strong>
            <strong class="form-text">Xin chào, {{ auth()->user()->last_name }}
                {{ auth()->user()->first_name }}</strong>
            <strong class="form-text">Mã tài khoản: {{ auth()->user()->id }}</strong>
        </div>
        <div class="row justify-content-center position-relative">
            <button class="col-8 btn btn-outline-dark dropdown-toggle d-block" type="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                Menu
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li class="list-group-item"><a href="/orderhistory"
                        class="dropdown-item form-text text-decoration-none text-dark">Lịch sử mua hàng</a>
                </li>
                <li class="list-group-item"><a href="/address"
                        class="dropdown-item form-text text-decoration-none text-dark">Địa chỉ</a></li>
                <li class="list-group-item"><a href="/profile"
                        class="dropdown-item form-text text-decoration-none text-dark">Thông tin tài
                        khoản</a></li>
                <li class="list-group-item"><a href="/checkoutpreferences"
                        class="dropdown-item form-text text-decoration-none text-dark">Tùy chọn thanh
                        toán</a></li>
            </ul>
        </div>
    </div>
</div>