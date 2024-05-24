@extends('admin.layout')

@section('title', 'Ingredient Form')

@section('content')
    <a href="{{ route('admin.products.ingredients.index') }}">Quay lại</a>
    <div class="fs-4 my-2">{{ $title }}</div>
    <div class="card-body">
        <form action="{{ $route }}" id="formAccountSettings" method="POST">
            @csrf
            @method($method)
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <x-form.select-field name='product_id' :array='$product_id' optValue='id' optLabel='name'
                            default="Chọn sản phẩm">Sản phẩm
                        </x-form.select-field>
                    </div>
                    <x-form.text-field class="mb-2" name="option_1" placeholder='Nhập lựa chọn' type='text'
                        edit="{{ $ingredient->option_1 ?? '' }}">
                        Lựa chọn 1
                    </x-form.text-field>
                    <x-form.text-field class="mb-2" name="unit_price1" placeholder='Nhập giá' type='text'
                        edit="{{ $ingredient->unit_price1 ?? '' }}">
                        Giá 1
                    </x-form.text-field>
                    <x-form.text-field class="mb-2" name="option_2" placeholder='Nhập lựa chọn' type='text'
                        edit="{{ $ingredient->option_2 ?? '' }}">
                        Lựa chọn 2
                    </x-form.text-field>
                    <x-form.text-field class="mb-2" name="unit_price2" placeholder='NNhập giá' type='text'
                        edit="{{ $ingredient->unit_price2 ?? '' }}">
                        Giá 2
                    </x-form.text-field>
                    <x-form.text-field class="mb-2" name="option_3" placeholder='Nhập lựa chọn' type='text'
                        edit="{{ $ingredient->option_3 ?? '' }}">
                        Lựa chọn 3
                    </x-form.text-field>
                    <x-form.text-field class="mb-2" name="unit_price3" placeholder='Nhập giá' type='text'
                        edit="{{ $ingredient->unit_price3 ?? '' }}">
                        Giá 3
                    </x-form.text-field>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>

    </div>
    @php
        if (Route::is('admin.products.ingredients.create')) {
            $product_id = null;
            $ingredient = null;
        }
    @endphp
    <script type="module">
        var datajson = @json($product_id);
        var datajson1 = @json($ingredient);
        if(datajson) {
            datajson.forEach(element => {
                if (element['id'] === datajson1['product_id']) {
                    var optionElement = document.querySelector(`option[value='${datajson1['product_id']}']`);
                    optionElement.setAttribute('selected', '');
                }
            });
        }
    </script>
@endsection
