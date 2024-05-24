@extends('client.layout')

@section('title', 'shop Coffee')
@section('content')

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <!-- banner -->
    <section class="d-block">
        <div class="position-relative">
            <img class="img-fluid w-100 d-none d-md-block" src="{{ asset('img/bannerShopCoffee.jpg') }}" alt=""
                style="min-height: 300px;">
            <img class="img-fluid w-100 d-md-none" src="{{ asset('img/banner_shopCoffee1.jpg') }}" alt="">
            <div class="position-absolute top-0 w-100 h-100">
                <div
                    class="content_img-banner d-flex flex-column justify-content-center align-items-center h-100 text-center text-white">
                    <span style="letter-spacing: 4px;">VERTUO</span>
                    <h1 class="title-shop_banner text-uppercase mb-4 title-banner_shopCoffee" style="font-size: 33px;">TRẢI
                        NGHIỆM CÀ PHÊ TUYỆT VỜI</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->

    <!-- filter shop -->
    <section class="d-block">
        <div class="m-auto pb-2 pt-3" style="max-width: 996px;">
            <form id="filterForm">
                <div class="d-flex justify-content-between">
                    <div class="col-4">
                        <select id="size" class="form-select">
                            <option value="">Tất cả size</option>
                            <option value="S">Size S</option>
                            <option value="M">Size M</option>
                            <option value="L">Size L</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <select id="weight" class="form-select">
                            <option value="">Tất cả trọng lượng</option>
                            <option value="100">100 gam</option>
                            <option value="200">200 gam</option>
                        </select>
                    </div>
                    <a href="" class="btn btn-outline-dark col-3">Lọc</a>
                </div>
            </form>
        </div>
    </section>
    <!-- end filter shop -->

    <!-- product -->
    <div class="position-relative pb-5 pt-4">
        <!-- best seller -->
        <section>
            <div class="m-auto" style="max-width: 996px;">
                <header class="header-product" style="background-image: url({{ asset('img/bestSeller.jpg') }})">
                    <div
                        class="text-white d-flex flex-column justify-content-center align-items-center h-100 box-title_shop">
                        <h2 class="text-uppercase">Sản phẩm bán chạy</h2>
                        <p>Các mẫu cà phê được yêu thích nhất trong cửa hàng
                        </p>
                    </div>
                </header>
                <div class="row mx-0">
                    @if (count($productTrendings))
                        @foreach ($productTrendings as $p)
                            <div class="col-sm-6 col-md-4 col-lg-3 product_grid px-0">
                                <form action="{{ route('add-to-cart', ['id' => $p->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="h-product_seller position-relative">
                                        <div class="position-relative block-text">
                                            <div class="h-100" style="margin: 2.5% 5% 0px;">
                                                <div class="h-100">
                                                    <div class="d-flex align-items-center justify-content-center"
                                                        style="height: 130px;">
                                                        <a href="{{ route('product', ['id' => $p->id, 'id_C' => $p->category_id]) }}"
                                                            class="img-sellers">
                                                            <img src="{{ asset('img/product/' . $p->internal_image_path) }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="name-sellers_product">
                                                        <a href="{{ route('product', ['id' => $p->id, 'id_C' => $p->category_id]) }}"
                                                            class="">{{ $p->name }}</a>
                                                    </div>
                                                    <div class="text-sellers_product">
                                                        <div class="text-sellers">
                                                            <div class="">
                                                                <span
                                                                    class="meta-desristion">{{ $p->meta_description }}</span>
                                                            </div>

                                                        </div>
                                                        <div class="hiden-text">
                                                            <div class=""
                                                                style="color: #da7b0e;letter-spacing: 1px;font-size: 13px;">
                                                                @if (!empty($p->productSpecification))
                                                                    <span>{{ isset($p->productSpecification->length) ? $p->productSpecification->length . 'cm x' : '' }}</span>
                                                                    <span>{{ !empty($p->productSpecification->width) ? $p->productSpecification->width . 'cm' : '' }}</span>
                                                                    <span>{{ !empty($p->productSpecification->height) ? 'x '. $p->productSpecification->height . 'cm' : '' }}</span>
                                                                @else
                                                                    <span>Chưa có kích thước</span>
                                                                @endif
                                                            </div>
                                                            <span class="text-uppercase"
                                                                style="color: #da7b0e;letter-spacing: 2px;font-size: 13px;">size:
                                                                @foreach ($p->allSizes as $size)
                                                                    {{ $size }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-sellers-price" style="position: absolute;bottom:0;">
                                            <div class="" style="min-height: 23px;">
                                            </div>
                                            <div class="icon-sellers_wrapper">
                                                <div class="price-seller">
                                                   <span class="text-success">{{ number_format($p->unit_price, 0, ',', '.') }} ₫</span>
                                                </div>
                                                <div class="position-relative">
                                                    <button type="submit" class="btn-price_add">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-plus-lg"
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
                                <img style="max-width: 300px" class="w-100" src="{{ asset('img/productEmty.png') }}"
                                    alt="">
                                <h3 class="text-uppercase text-secondary">Đang hết hàng</h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- end best seller -->

        <!-- sản phẩm mới -->
        <section>
            <div class="m-auto" style="max-width: 996px;">
                <header class="header-product" style="background-image: url({{ asset('img/BARISTA.jpg') }})">
                    <div
                        class="text-white d-flex flex-column justify-content-center align-items-center h-100 box-title_shop">
                        <h2 class="text-uppercase">Sản phẩm mới</h2>
                    </div>
                </header>
                <div class="row mx-0">
                    @if (count($productTrendings))
                        @foreach ($productNew as $p)
                            <div class="col-sm-6 col-md-4 col-lg-3 product_grid px-0">
                                <form action="{{ route('add-to-cart', ['id' => $p->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="h-product_seller position-relative">
                                        <div class="position-relative block-text">
                                            <div class="h-100" style="margin: 2.5% 5% 0px;">
                                                <div class="h-100">
                                                    <div class="d-flex align-items-center justify-content-center"
                                                        style="height: 130px;">
                                                        <a href="{{ route('product', ['id' => $p->id, 'id_C' => $p->category_id]) }}"
                                                            class="img-sellers">
                                                            <img src="{{ asset('img/product/' . $p->internal_image_path) }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="name-sellers_product">
                                                        <a href="{{ route('product', ['id' => $p->id, 'id_C' => $p->category_id]) }}"
                                                            class="img-sellers">
                                                            <a href="" class="">{{ $p->name }}</a>
                                                    </div>
                                                    <div class="text-sellers_product">
                                                        <div class="text-sellers">
                                                            <div class="">
                                                                <span
                                                                    class="meta-desristion">{{ $p->meta_description }}</span>
                                                            </div>

                                                        </div>
                                                        <div class="hiden-text">
                                                            <div class=""
                                                                style="color: #da7b0e;letter-spacing: 1px;font-size: 13px;">
                                                                @if (!empty($p->productSpecification))
                                                                    <span>{{ !empty($p->productSpecification->length) ? $p->productSpecification->length . 'cm x' : '' }}</span>
                                                                    <span>{{ !empty($p->productSpecification->width) ? $p->productSpecification->width . 'cm' : '' }}</span>
                                                                    <span>{{ !empty($p->productSpecification->height) ? 'x '. $p->productSpecification->height . 'cm' : '' }}</span>
                                                                @else
                                                                    <span>Chưa có kích thước</span>
                                                                @endif
                                                            </div>
                                                            <span class="text-uppercase"
                                                                style="color: #da7b0e;letter-spacing: 2px;font-size: 13px;">size:
                                                                @foreach ($p->allSizes as $size)
                                                                    {{ $size }}
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @endforeach
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-sellers-price" style="position: absolute;bottom:0;">
                                            <div class="" style="min-height: 23px;">
                                            </div>
                                            <div class="icon-sellers_wrapper">
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
                                <img style="max-width: 300px" class="w-100" src="{{ asset('img/productEmty.png') }}"
                                    alt="">
                                <h3 class="text-uppercase text-secondary">Đang hết hàng</h3>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
        <!-- end sản phẩm mới -->

        <!-- category product -->
        @if (isset($categories))
            @foreach ($categories as $c)
                <section id="category-{{ $c->id }}">
                    <div class="m-auto" style="max-width: 996px;">
                        <header class="header-product"
                            style="background-image: url({{ asset('img/barista-creations-capsules-mobile2.jpg') }});height: 125px;">
                            <div
                                class="text-white d-flex flex-column justify-content-center align-items-center h-100 box-title_shop">
                                <h2 class="text-uppercase">{{ $c->name }}</h2>
                                <p>{{ $c->meta_description }}</p>
                            </div>
                        </header>
                        <div class="row mx-0">
                            @if (count($c->products))
                                @foreach ($c->products as $p)
                                    <div class="col-sm-6 col-md-4 col-lg-3 product_grid px-0">
                                        <form action="{{ route('add-to-cart', ['id' => $p->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="h-product_seller position-relative">
                                                <div class="position-relative block-text">
                                                    <div class="h-100" style="margin: 2.5% 5% 0px;">
                                                        <div class="h-100">
                                                            <div class="d-flex align-items-center justify-content-center"
                                                                style="height: 130px;">
                                                                <a href="{{ route('product', ['id' => $p->id, 'id_C' => $p->category_id]) }}"
                                                                    class="img-sellers">
                                                                    <img src="{{ asset('img/product/' . $p->internal_image_path) }}"
                                                                        alt="">
                                                                </a>
                                                            </div>
                                                            <div class="name-sellers_product">
                                                                <a href="{{ route('product', ['id' => $p->id, 'id_C' => $p->category_id]) }}"
                                                                    class="">{{ $p->name }}</a>
                                                            </div>
                                                            <div class="text-sellers_product">
                                                                <div class="text-sellers">
                                                                    <div class="">
                                                                        <span
                                                                            class="meta-desristion">{{ $p->meta_description }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="hiden-text">
                                                                    <div class=""
                                                                        style="color: #da7b0e;letter-spacing: 1px;font-size: 13px;">
                                                                        @if (!empty($p->productSpecification))
                                                                            <span>{{ !empty($p->productSpecification->length) ? $p->productSpecification->length . 'cm x' : '' }}</span>
                                                                            <span>{{ !empty($p->productSpecification->width) ? $p->productSpecification->width . 'cm' : '' }}</span>
                                                                            <span>{{ !empty($p->productSpecification->height) ? 'x '. $p->productSpecification->height . 'cm' : '' }}</span>
                                                                        @else
                                                                            <span>Chưa có kích thước</span>
                                                                        @endif
                                                                    </div>
                                                                    <span class="text-uppercase"
                                                                        style="color: #da7b0e;letter-spacing: 2px;font-size: 13px;">size:
                                                                        @foreach ($p->allSizes as $size)
                                                                            {{ $size }}
                                                                            @if (!$loop->last)
                                                                                ,
                                                                            @endif
                                                                        @endforeach
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="box-sellers-price" style="position: absolute;bottom:0;">
                                                    <div class="" style="min-height: 23px;">
                                                    </div>
                                                    <div class="icon-sellers_wrapper">
                                                        <div class="price-seller">
                                                           <span class="text-success">{{ number_format($p->unit_price, 0, ',', '.') }} ₫</span>
                                                        </div>
                                                        <div class="position-relative">
                                                            <button class="btn-price_add" type="submit"
                                                                name="add-to-cart">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20   "
                                                                    height="20" fill="currentColor"
                                                                    class="bi bi-plus-lg" viewBox="0 0 16 16">
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
                </section>
            @endforeach
        @endif
        <!-- end category product -->
    </div>
    <!-- end product -->

@endsection
