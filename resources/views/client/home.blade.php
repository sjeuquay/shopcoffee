@extends('client.layout')

@section('title', 'home')
@section('content')

    @if (session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif
    <!-- banner -->
    <section>
        <div class="position-relative d-block">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <picture>
                            <source media="(min-width: 1200px)"
                                srcset="{{ asset('img/banner_1440x400.jpg') }}">
                            <source media="(min-width: 768px)"
                                srcset="{{ asset('img/banner2_1600x900.jpg') }}">
                            <source media="(max-width: 768px)"
                                srcset="{{ asset('img/banner3_750x780.jpg') }}">
                            <img src="{{ asset('img/banner_1440x400.jpg') }}" class="d-block w-100"
                                alt="...">
                        </picture>
                        <div class="position-absolute content-banner w-100">
                            <div class="d-flex justify-content-center text-center">
                                <div class="banner_content_width">
                                    <div class="logo-lookup">
                                        <img style="width: 100px;" src="{{ asset('img/blue_logo.svg') }}"
                                            alt="" class="">
                                    </div>
                                    <div class="text-center d-flex flex-column align-items-center box-banner_content">
                                        <h1 class="fw-bold fs-1 title-sm-banner" style="letter-spacing: 10px;color: #000;">
                                            SINGLE ORIGIN NO.
                                            1​​</h1>
                                        <p class="fs-4 fw-light text-banner" style="color: #000;">Hợp tác giữa Blue Bottle
                                            Coffee
                                            và Gitega Hills tại Rwanda</p>
                                    </div>
                                    <div class="">
                                        <button type="button"
                                            class=" text-white rounded-1 text-uppercase btn-banner fw-normal border-0">Mua
                                            ngay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <picture>
                            <source media="(min-width: 1200px)"
                                srcset="{{ asset('img/banner_1440x400.jpg') }}">
                            <source media="(min-width: 768px)"
                                srcset="{{ asset('img/banner2_1600x900.jpg') }}">
                            <source media="(max-width: 768px)"
                                srcset="{{ asset('img/banner3_750x780.jpg') }}">
                            <img src="{{ asset('img/banner_1440x400.jpg') }}" class="d-block w-100"
                                alt="...">
                        </picture>
                        <div class="position-absolute content-banner w-100">
                            <div class="d-flex justify-content-center text-center">
                                <div class="banner_content_width">
                                    <div class="logo-lookup">
                                        <img style="width: 100px;" src="{{ asset('img/blue_logo.svg') }}"
                                            alt="" class="">
                                    </div>
                                    <div class="text-center d-flex flex-column align-items-center box-banner_content">
                                        <h1 class="fw-bold fs-1 title-sm-banner" style="letter-spacing: 10px;color: #000;">
                                            SINGLE ORIGIN NO.
                                            1​​</h1>
                                        <p class="fs-4 fw-light text-banner" style="color: #000;">Hợp tác giữa Blue Bottle
                                            Coffee
                                            và Gitega Hills tại Rwanda</p>
                                    </div>
                                    <div class="">
                                        <button type="button"
                                            class=" text-white rounded-1 text-uppercase btn-banner fw-normal border-0">Mua
                                            ngay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <picture>
                            <source media="(min-width: 1200px)"
                                srcset="{{ asset('img/banner_1440x400.jpg') }}">
                            <source media="(min-width: 768px)"
                                srcset="{{ asset('img/banner2_1600x900.jpg') }}">
                            <source media="(max-width: 768px)"
                                srcset="{{ asset('img/banner3_750x780.jpg') }}">
                            <img src="{{ asset('img/banner_1440x400.jpg') }}" class="d-block w-100"
                                alt="...">
                        </picture>
                        <div class="position-absolute content-banner w-100">
                            <div class="d-flex justify-content-center text-center">
                                <div class="banner_content_width">
                                    <div class="logo-lookup">
                                        <img style="width: 100px;" src="{{ asset('img/blue_logo.svg') }}"
                                            alt="" class="">
                                    </div>
                                    <div class="text-center d-flex flex-column align-items-center box-banner_content">
                                        <h1 class="fw-bold fs-1 title-sm-banner" style="letter-spacing: 10px;color: #000;">
                                            SINGLE ORIGIN NO.
                                            1​​</h1>
                                        <p class="fs-4 fw-light text-banner" style="color: #000;">Hợp tác giữa Blue Bottle
                                            Coffee
                                            và Gitega Hills tại Rwanda</p>
                                    </div>
                                    <div class="">
                                        <button type="button"
                                            class=" text-white rounded-1 text-uppercase btn-banner fw-normal border-0">Mua
                                            ngay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev d-none d-md-block" type="button"
                    data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next d-none d-md-block" type="button"
                    data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- end banner -->

    <!-- Coffee card -->
    <section style="background-color: #fff;">
        <div class="container-xl container-lg py-5">
            <div class="coffe-card_width m-auto">
                <div class="text-center d-flex flex-column justify-content-center align-items-center mb-4">
                    <h2 class="title_coffe-card text-uppercase" style="letter-spacing: 4px">Sản phẩm mới​</h2>
                    <p class="text_coffee-card">
                        Một số các mẫu cà phê mới và cổ điển từ Mozanio để nâng cao trải nghiệm cà phê tại nhà của bạn.
                    </p>
                </div>
                <div class="text-center m-auto card-box-coffee">
                    <div class="row">
                        @if (count($products))
                            @foreach ($products as $p)
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 mb-4">
                                    <form action="{{ route('add-to-cart', ['id' => $p->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="h-product_seller position-relative" style="height: 300px">
                                            <div class="position-relative block-text" style="min-height: 50px">
                                                <div class="d-flex align-items-center justify-content-center" style="margin: 2.5% 5% 0px;height:130px;">
                                                    <div class="d-block">
                                                        <a href="{{ route('product', ['id' => $p->id, 'id_C' => $p->category_id]) }}"
                                                            class="img-sellers">
                                                            <img class="img-product_new"
                                                                src="{{ asset('img/product/' . $p->internal_image_path) }}"
                                                                alt="" style="width: 130px;">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content-product_new" style="padding: 0 5px">
                                                <div class="name-sellers_product" style="height: auto">
                                                    <a href="{{ route('product', ['id' => $p->id, 'id_C' => $p->category_id]) }}"
                                                        class="product-truncate_2">{{ $p->name }}</a>
                                                </div>
                                                <div class="text-sellers" style="line-height: 17px">
                                                    <span style="font-size: 13px;line-height:14px;"
                                                        class="product-truncate_text-2">
                                                        {{ $p->meta_description }}</span>
                                                </div>
                                            </div>
                                            <div class="box-sellers-price" style="position:absolute;bottom:0;">
                                                <div class="" style="min-height: 23px;"></div>
                                                <div class="box-price_wrapper">
                                                    <div class="price-seller">
                                                      <span class="text-success">{{ number_format($p->unit_price, 0, ',', '.') }} ₫</span>
                                                    </div>
                                                    <div class="position-relative">
                                                        <button type="submit" class="btn-price_add">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20   "
                                                                height="20   " fill="currentColor" class="bi bi-plus-lg"
                                                                viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd"
                                                                    d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"
                                                                    stroke="#fff" stroke-width="1" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        @else
                            <div class="m-auto d-flex justify-content-center text-center" style="max-width: 996px">
                                <div class="">
                                    <img style="max-width: 300px" class="w-100"
                                        src="{{ asset('img/productEmty.png') }}" alt="">
                                    <h3 class="text-uppercase text-secondary">Đang hết hàng</h3>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="text-center py-5">
                <a href="{{ route('coffee') }}" class="btn-discover text-center">Đến cửa hàng</a>
            </div>
        </div>
    </section>
    <!-- end Coffee card -->

    <!-- discover coffee -->
    <section class="d-block">
        <div class="position-relative">
            <img src="{{ asset('img/layout_discover.jpg') }}" alt="Discover a world of coffee"
                height="2880" width="800" sizes="100vw" class="discover-img ">
            <div class="discover-coffee_wrapper">
                <h3 class="text-uppercase text-center pb-5 title-discover">Sản phẩm nổi bật</h3>
                <div class="box2-discover" style="max-width: 996px !important">
                    @if (count($Trenning))
                        <div class="row discover-coffee">
                            @foreach ($Trenning as $t)
                                <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12 mx-1 m-discover">
                                    <div class="card discover-card">
                                        <div class="img-discover">
                                            <a href="{{ route('product', ['id' => $p->id, 'id_C' => $p->category_id]) }}"
                                                class="img-discover_link">
                                                <div class="d-flex justify-content-center"
                                                    style="-webkit-box-pack: center;">
                                                    <img src="{{ asset('img/product/' . $t->internal_image_path) }}"
                                                        class="discover-img-box" alt="{{ $p->name }}">
                                                </div>
                                            </a>
                                        </div>
                                        <div
                                            class="card-body d-flex justify-content-center flex-column align-items-center">
                                            <div class="discover-height-title">
                                                <a href="{{ route('product', ['id' => $p->id, 'id_C' => $p->category_id]) }}"
                                                    class="text-center text-decoration-none" style="line-height: 64px;">
                                                    <h5
                                                        class="card-title text-dark fw-bold text-uppercase name-discover-coffee name-truncate_product-3">
                                                        {{ $t->name }}</h5>
                                                </a>
                                            </div>
                                            <p class="card-text text-discover-coffee text-center">
                                                {{ $t->meta_description }}
                                            </p>
                                            <div
                                                class="d-inline-flex justify-content-center footer-card-discover w-100 align-items-center">
                                                <div class="pe-4">
                                                    <span class="text-success fw-bold" style="letter-spacing: 2px;">
                                                        {{ number_format($t->unit_price, 0, ',', '.') }} ₫</span>
                                                </div>
                                                <div class="">
                                                    <a href="" class="btn btn-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                            height="25" fill="currentColor" class="bi bi-plus"
                                                            viewBox="0 1 16 16">
                                                            <path
                                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"
                                                                stroke="#fff" stroke-width="1" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="m-auto d-flex justify-content-center text-center" style="max-width: 996px">
                            <div class="">
                                <img style="max-width: 300px" class="w-100"
                                    src="{{ asset('img/productEmty.png') }}" alt="">
                                <h3 class="text-uppercase text-secondary">Đang hết hàng</h3>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="text-center py-5">
                    <a href="{{ route('coffee') }}" class="btn-discover text-center">Cửa hàng cà phê</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end discover coffee -->
@endsection
