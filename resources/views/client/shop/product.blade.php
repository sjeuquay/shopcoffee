@extends('client.layout')

@section('title', 'product')
@section('content')
    {{-- {{ dd($product) }} --}}
    @if (session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif
    <!-- Detail -->
    {{-- {{dd($product->productImages)}} --}}
    <form action="{{ route('add-to-cart', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <section class="position-relative d-block" style="padding: 4rem 0;">
            <div class="position-absolute" style="background-color: #e7e7e7;inset: 0;"></div>
            <div class="cb-bg-img" style="background-image: url({{ asset('img/background_XL.jpg') }});"></div>
            <div class="wrapper-productDetail">
                <div class="backTo-link">
                    <a href="{{ route('coffee') }}" class="text-uppercase">
                        Trở về cửa hàng
                    </a>
                </div>
                <div class="box-img-productDetail justify-content-center">
                    <img src="{{ asset('img/product/' . $product->internal_image_path) }}" alt=""
                        class="img-productDetail" id="mainImage">
                    @if (count($product->productImages))
                        <div class="d-flex justify-content-center align-items-center position-absolute bottom-0">
                            <div class="d-flex img_thumnail" style="padding-top: 20px;">
                                @foreach ($product->productImages as $img)
                                    <div class="position-relative">
                                        <div class="img-product_thumnail__machines" style="cursor: pointer">
                                            <img class="img-thumnail"
                                                src="{{ asset('img/product/' . $img->product_small_thumb) }}"
                                                alt="">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="box-content_productDetail">
                    <div class="wrapper-content_productDetail">
                        <div class="card-content_productDetail">
                            <p class="card-content_technology">Vertuo</p>
                            <p class="card-content_range text-capitalize">
                                {{ !empty($product->category) ? $product->category->name : 'sản phẩm ngoài danh mục' }}</p>
                            <h1 class="card-content_title text-uppercase">{{ $product->name }}</h1>
                            <div class="box-price_productDetail">
                                <div class="" style="margin-bottom: .5rem;">
                                    <p class="price-productDettail" style="color:rgb(53, 126, 0);">
                                        {{ number_format($product->unit_price, 0, ',', '.') }}
                                        ₫</p>
                                    <p class="Capsule-price"></p>
                                    <span></span>
                                </div>
                                <div class="d-block">
                                    <div class="w-100 position-relative">
                                        <button class="btn-productDetail" type="submit">
                                            <span class="text-uppercase">thêm vào túi</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="position-relative" style="padding-bottom: 2.5rem;padding-top: 2.5rem;">
            <div class="position-absolute" style="background-image: linear-gradient(180deg, #faf9f8, #f3eee6);inset: 0;">
            </div>
            <div class="taste-box">
                <div class="w-taste">
                    <h2 class="text-uppercase">Hương vị</h2>
                    <div class="text-tase">
                        {{ $product->short_description }}
                    </div>
                </div>
                <div class="taste-content w-100">
                    <div class="taste-content-col w-75">
                        <div class="taste-content-cell">
                            <div class="taste-content-list d-flex align-items-center">
                                <div class="name-taste">Size:</div>
                                <div class="list-icon_taste d-flex gap-2">
                                    @if ($sizeTypes)
                                        @foreach ($sizeTypes as $index => $s)
                                            <div class="">
                                                <input type="radio" id="size_cup_s_{{ $index }}" name="size_cup"
                                                    class="btn d-none input-size" value="{{ $s->description }}">
                                                <label for="size_cup_s_{{ $index }}"
                                                    class="border border-dark btn-size"
                                                    style="width:45px;letter-spacing:3px">{{ $s->description }}</label>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="">
                                            <input type="radio" name="size_cup" class="btn d-none">
                                            <label for="" class="border border-dark btn-size"
                                                style="width:45px;letter-spacing:3px"></label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="taste-content-cell">
                            <div class="taste-content-list">
                                <div class="name-taste">Nguyên liệu:</div>
                                <div class="list-icon_taste w-100">
                                    <input type="hidden" id="selectedOptions" name="selectedOptions" value="">
                                    <form method="POST" action="{{ route('inredient') }}"
                                        class="w-100 d-flex flex-wrap gap-2 align-items-center">
                                        @csrf
                                        @if (isset($product->Ingredient))
                                            @foreach ($ingredients as $ingredient)
                                                <div class="row row-ingredient">
                                                    @if (!empty($ingredient->option_1))
                                                        <div class="items-icon_taste w-25">
                                                            <input type="checkbox" class="position-absolute"
                                                                name="ingredientId[]"
                                                                id="ingredientCheckbox{{ $ingredient->id }}_1"
                                                                value="{{ $ingredient->id }}"
                                                                data-option="{{ $ingredient->option_1 }}">
                                                            <label for="ingredientCheckbox{{ $ingredient->id }}_1"
                                                                class="form-control text-capitalize form-select-sm border-dark btn-inrefient"
                                                                style="background-color: transparent; cursor: pointer;">{{ $ingredient->option_1 }}</label>
                                                        </div>
                                                    @endif
                                                    @if (!empty($ingredient->option_2))
                                                        <div class="items-icon_taste w-25">
                                                            <input type="checkbox" class="position-absolute"
                                                                name="ingredientId[]"
                                                                id="ingredientCheckbox{{ $ingredient->id }}_2"
                                                                value="{{ $ingredient->id }}"
                                                                data-option="{{ $ingredient->option_2 }}">
                                                            <label for="ingredientCheckbox{{ $ingredient->id }}_2"
                                                                class="form-control text-capitalize form-select-sm border-dark btn-inrefient"
                                                                style="background-color: transparent; cursor: pointer;">{{ $ingredient->option_2 }}</label>
                                                        </div>
                                                    @endif
                                                    @if (!empty($ingredient->option_3))
                                                        <div class="items-icon_taste w-25">
                                                            <input type="checkbox" class="position-absolute"
                                                                name="ingredientId[]"
                                                                id="ingredientCheckbox{{ $ingredient->id }}_3"
                                                                value="{{ $ingredient->id }}"
                                                                data-option="{{ $ingredient->option_3 }}">
                                                            <label for="ingredientCheckbox{{ $ingredient->id }}_3"
                                                                class="form-control text-capitalize form-select-sm border-dark btn-inrefient"
                                                                style="background-color: transparent; cursor: pointer;">{{ $ingredient->option_3 }}</label>
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @endif
                                        <input type="hidden" name="ingredient_options[]">
                                        <input type="hidden" name="ingredient_options[]">
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="w-25">
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!-- end Detail -->

    <!-- YOU MAY ALSO LIKE -->
    <section class="py-4">
        <div class="mx-auto" style="max-width: 996px;">
            <h3 class="title-similar text-uppercase">Sản phẩm tương tự</h3>
            <div class="row similar w-100">
                @foreach ($similar as $similar)
                    <div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
                        <div class="card discover-card bg-white border-0">
                            <div class="img-discover">
                                <a href="{{ route('product', ['id' => $similar->id, 'id_C' => $similar->category_id]) }}"
                                    class="img-discover_link">
                                    <div class="d-flex justify-content-center" style="-webkit-box-pack: center;">
                                        <img src="{{ asset('img/product/' . $similar->internal_image_path) }}"
                                            class=" discover-img-box" alt="{{ $similar->name }}">
                                    </div>
                                </a>
                            </div>
                            <div class="card-body d-flex justify-content-center flex-column align-items-center">
                                <div class="discover-height-title">
                                    <a href="{{ route('product', ['id' => $similar->id, 'id_C' => $similar->category_id]) }}"
                                        class="text-center text-decoration-none" style="line-height: 64px;">
                                        <h5 class="card-title text-dark fw-bold text-uppercase name-discover-coffee">
                                            {{ $similar->name }}
                                        </h5>
                                    </a>
                                </div>
                                <p class="card-text text-discover-coffee text-center">{{ $similar->meta_description }}</p>
                                <div
                                    class="d-inline-flex justify-content-between footer-card-discover w-100 align-items-center">
                                    <div class="pe-4">
                                        <span class="text-success fw-bold" style="letter-spacing: 2px;">
                                            {{ number_format($similar->unit_price, 0, ',', '.') }} ₫</span>
                                    </div>
                                    <div class="">
                                        <a href="" class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                fill="currentColor" class="bi bi-plus" viewBox="0 1 16 16">
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
        </div>
    </section>
    <!-- end YOU MAY ALSO LIKE -->
    <script>
        // Add event listener after the DOM is fully loaded
        //     document.addEventListener('DOMContentLoaded', function() {
        //         // Add event listener to each checkbox
        //         var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        //         checkboxes.forEach(function(checkbox) {
        //             checkbox.addEventListener('change', function() {
        //                 var selectedOptions = [];
        //                 checkboxes.forEach(function(cb) {
        //                     if (cb.checked) {
        //                         var option = cb.getAttribute('data-option');
        //                         var ingredientId = cb.value;
        //                         selectedOptions.push({
        //                             ingredientId: ingredientId,
        //                             option: option
        //                         });
        //                     }
        //                 });
        //                 // Update the value of selectedOptions input
        //                 document.getElementById('selectedOptions').value = JSON.stringify(
        //                     selectedOptions);
        //             });
        //         });
        //     });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var labels = document.querySelectorAll('.btn-inrefient');
            var selectedOptions = document.getElementById('selectedOptions');

            labels.forEach(function(label) {
                label.addEventListener('click', function() {
                    var checkbox = document.getElementById(label.getAttribute('for'));
                    var optionValue = checkbox.getAttribute('data-option');

                    // Cập nhật giá trị của selectedOptions bằng giá trị của data-option
                    selectedOptions.value = optionValue;
                });
            });
        });
    </script>


@endsection
