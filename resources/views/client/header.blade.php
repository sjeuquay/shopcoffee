<header>
    <div class="headerMenu">
        <div class="sticky-top">
            <nav class="navbar navbar-dark bg-dark">
                <div class="container-fluid container flex-nowrap ">
                    <button class="navbar-toggler d-none block-sm " type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                        aria-label="Toggle navigation">
                        <i class="bi bi-list text-light fs-1"></i>
                    </button>
                    <a class="navbar-brand" href="/home"><img class=""
                            src="{{ asset('img/logo-mozanio-1.png') }}" alt="" width="150"></a>
                    <div class="d-flex gap-2 justify-content-center align-items-center">
                        <!-- Tìm kiếm -->
                        <div class="search">
                            <a class="btn btn-outline-light text-uppercase search-btn" href="#"><i
                                    class="bi bi-search"></i><span class="hide-sm"> Tìm kiếm</span></a>
                            <input type="text" class="search-input d-none form-control" placeholder="Search">
                        </div>
                        <!-- Tài khoản -->
                        <div class="account dropdown">
                            <a class="btn btn-outline-light text-uppercase" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill"></i><span class="hide-sm">
                                    @if (auth()->check())
                                        Chào {{ auth()->user()->last_name }} {{ auth()->user()->first_name }}
                                    @else
                                        Đăng nhập / Đăng ký
                                    @endif
                                </span>
                            </a>
                            @if (auth()->check())
                                <div id="loginFormContainer" class="dropdown-menu dropdown-menu-end position-absolute"
                                    style="width:251px;">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item text-center form-text fw-bold text-capitalize">Tài
                                            khoản của tôi</li>
                                        <li class="list-group-item"><a href="/profile"
                                                class="form-text fw-bold text-decoration-none">Thông tin tài khoản</a>
                                        </li>
                                        <li class="list-group-item"><a href="/orderhistory"
                                                class="form-text fw-bold text-decoration-none">Lịch sử mua hàng</a></li>
                                        </li>
                                        <li class="list-group-item"><a href="/contact"
                                                class="form-text fw-bold text-decoration-none">Liên hệ</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                                class="form-text fw-bold text-warning-emphasis">Đăng xuất</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <div id="loginFormContainer" class="dropdown-menu dropdown-menu-end">
                                    <div class="container">
                                        <strong class="text-uppercase">Đăng nhập</strong>
                                        <p><small class="form-text">Truy cập tài khoản của bạn và đặt hàng:</small></p>
                                        <form action="{{ route('login.post') }}" class="d-flex flex-column gap-2"
                                            method="POST">
                                            @csrf
                                            <input type="text"
                                                class="form-control @error('user_name') is-invalid @enderror"
                                                name="user_name" placeholder="Tài khoản">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="inputPassword" name="password" placeholder="Mật khẩu *">
                                            <a href="/forgotpass"
                                                class="text-decoration-none text-warning-emphasis text-uppercase form-text">Quên
                                                mật khẩu</a>
                                            <div class="form">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label form-text" for="exampleCheck1">Ghi nhớ
                                                    mật
                                                    khẩu</label>
                                            </div>
                                            <button id="loginButton1" class="btn btn-outline-dark text-uppercase"
                                                type="submit">Đăng nhập
                                                <i class="bi bi-chevron-right"></i></button>
                                        </form>
                                        <hr>
                                        <form action="/register" class="d-flex flex-column">
                                            <p class="form-text text-center">Tạo tài khoản mới?</p>
                                            <button class="btn btn-outline-dark text-uppercase" type="submit">Đăng ký
                                                <i class="bi bi-chevron-right"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                            <!-- Người dùng đăng nhập vào tài khoản -->
                        </div>

                        <!-- Giỏ hàng -->
                        <div class="cart">
                            <a class="btn btn-outline-light text-uppercase" href="{{ route('cart') }}">
                                <i class="bi bi-bag-fill"></i>
                                <span class="hide-sm">Giỏ hàng (
                                    <span  id="quantityCart">
                                        @if (session('totalQuantity'))
                                            {{ session('totalQuantity') }}
                                        @else
                                            0
                                        @endif
                                    </span>
                                    )
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                        aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                                <a class="nav-link" href="#"><i class="bi bi-list-check"></i> MOZANIO</a>
                            </h5>
                            <button type="button" class="btn-close btn-close-white text-white"
                                data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body bg-black">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3" id="navmobile">
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-uppercase" href="{{ route('home') }}"> Trang chủ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-uppercase dropdown-toggle" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Menu
                                    </a>
                                    <div class="container">
                                        <ul class="dropdown-menu bg-black dropdown-menu-light rounded-0 border-0">
                                            @foreach ($category as $c)
                                                <li class="nav-item"><a class="nav-link text-success"
                                                        style="font-size: 1rem;"
                                                        href="{{ route('coffee', ['id' => $c->id]) }}">{{ $c->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-uppercase" href="{{ route('agency') }}">Đại lý</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-uppercase" href="{{ route('contact') }}">Liên hệ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-uppercase" href="{{ route('about') }}">Giới thiệu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <?php
        $current_url = $_SERVER['REQUEST_URI'];
        $home_class = $current_url == '/home' || $current_url == '/' ? 'hover-navbar' : '';
        $coffee_class = $current_url == '/shopcoffee' ? 'hover-navbar' : '';
        $contact_class = $current_url == '/contact' ? 'hover-navbar' : '';
        $about_class = $current_url == '/about' ? 'hover-navbar' : '';
        $agency_class = $current_url == '/agency' ? 'hover-navbar' : '';
        ?>
        <nav class="navbar navbar-expand-lg hide-sm" style="background-color: #282829;" id="menu">
            <div class="container-fluid container">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav position-relative justify-content-center gap-5">
                        <li class="nav-item <?php echo $home_class; ?>" aria-current="page">
                            <a class="nav-link text-uppercase px-0" href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li class="nav-item <?php echo $coffee_class; ?>">
                            <a class="nav-link text-uppercase px-0" href="{{ route('coffee') }}">Menu</a>
                            <div class="product-list shadow-sm p-4 mb-5 bg-body-tertiary position-absolute bg-white"
                                style="width: 900px;">
                                <div class="row align-items-center justify-content-between list-category">
                                    <!-- Cột 1: sản phẩm 1 -->
                                    @foreach ($category as $c)
                                        <div class="col-md-3 border-category">
                                            <div class="product text-center">
                                                <a href="" data-route="{{ route('coffee') }}"
                                                    class="text-decoration-none category-link"
                                                    data-category-id="{{ $c->id }}">
                                                    <h5 class="text-dark text-uppercase description-category_title"
                                                        style="font-size: 15px;">{{ $c->name }}</h5>
                                                </a>
                                                <p class="description-category_truncate"
                                                    style="font-size: 13px;color:#282829d1;">
                                                    {{ $c->meta_description }}</p>
                                                <a href="" data-route="{{ route('coffee') }}"
                                                    class="text-decoration-none category-link"
                                                    data-category-id="{{ $c->id }}">
                                                    <img class="img-category" src="{{ asset('img/' . $c->image) }}"
                                                        alt="{{ $c->name }}" width="200" height="200">
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                        <li class="nav-item <?php echo $agency_class; ?>">
                            <a class="nav-link text-uppercase px-0" href="{{ route('agency') }}"></i>Đại lý</a>
                        </li>
                        <li class="nav-item <?php echo $contact_class; ?>">
                            <a class="nav-link text-uppercase px-0" href="{{ route('contact') }}">Liên Hệ</a>
                        </li>
                        <li class="nav-item <?php echo $about_class; ?>">
                            <a class="nav-link text-uppercase px-0" href="{{ route('about') }}"></i>Giới thiệu</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
