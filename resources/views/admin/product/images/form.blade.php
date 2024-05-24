@extends('admin.layout')

@section('title', 'Product Image Form')

@section('content')
    <a href="{{ route('admin.products.image.index') }}">Quay lại</a>
    <div class="fs-4 my-2">{{ $title }}</div>
    <div class="card-body">
        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
            {{-- Upload ảnh --}}
            @csrf
            @method($method)
            <div class="col-md-4">
                <div class="mb-3">
                    <x-form.select-field name='product_id' :array='$product_id' optValue='id' optLabel='name'
                        default="Chọn sản phẩm">Sản phẩm
                    </x-form.select-field>
                </div>
                <div class="mb-3">
                    <x-form.text-field name="product_large_thumb" type="file" accept="image/png, image/jpeg, image/jpg"
                        onchange="updateImage('productLargeImage', event)">
                        Ảnh lớn
                    </x-form.text-field>
                    <img id="productLargeImage"
                        src="{{ isset($productImg) ? asset('img/product/' . $productImg->product_large_thumb) : '0' }}"
                        alt="" width="200px" class="img-fluid my-2">
                </div>

                <div class="mb-3">
                    <x-form.text-field name="product_small_thumb" type="file" accept="image/png, image/jpeg, image/jpg"
                        onchange=" updateImage('productSmallImage', event) ">
                        Ảnh nhỏ
                    </x-form.text-field>
                    <img id="productSmallImage"
                        src="{{ isset($productImg) ? asset('img/product/' . $productImg->product_small_thumb) : '0' }}"
                        alt="" width="200px" class="img-fluid my-2">
                </div>
                <div class="mb-3">
                    <x-form.text-field name="product_position" type="number" min=0
                        edit="{{ $productImg->product_position ?? '' }}">
                        Vị trí ảnh
                    </x-form.text-field>
                </div>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <div class="form-check mt-3">
                        <input name="is_front_face" class="form-check-input" type="checkbox" id="is_front_face"
                            {{ isset($productImg) && $productImg->is_front_face == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_front_face">
                            In_front_face
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </div>
        </form>
    </div>
    @php
        if (Route::is('admin.products.image.create')) {
            $product_id = null;
            $productImg = null;
        }
    @endphp
    <script>
        var datajson = @json($product_id);
        var datajson1 = @json($productImg);
        if (datajson) {
            datajson.forEach(element => {
                if (element['id'] === datajson1['product_id']) {
                    var optionElement = document.querySelector(`option[value='${datajson1['product_id']}']`);
                    optionElement.setAttribute('selected', '');
                }
            });
        }

        function updateImage(imageId, event) {
            console.log('1');
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var imgElement = document.getElementById(imageId);
                    if (imgElement) {
                        imgElement.src = e.target.result;
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


@endsection
