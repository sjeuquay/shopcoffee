@extends('admin.layout')

@section('title', 'Đặc điểm kỹ thuật sản phẩm')

@section('content')
    <style>
        .input-box {
            margin: 0 0 10px 0;
        }
    </style>
    <div class="container">
        <h1>Đặc điểm kỹ thuật sản phẩm A</h1>
        <form method="POST" class="form-container" action="{{ route('admin.products.specification.store') }}">
            <div class="input-box">
                <x-form.text-field name="length" class="form-control" type="text" placeholder="Nhập độ dài">
                    Độ dài
                </x-form.text-field>
            </div>
            <div class="input-box">
                <x-form.text-field name="width" class="form-control" type="text" placeholder="Nhập độ rộng">
                    Độ rộng
                </x-form.text-field>
            </div>
            <div class="input-box">
                <x-form.text-field name="height" class="form-control" type="text" placeholder="Nhập dung tích thực">
                    Cao
                </x-form.text-field>
            </div>
            <div class="input-box">
                <x-form.select-field
                    name="weight"
                    :array='$weight'
                    optValue="id"
                    optLabel="description"
                    default="Chọn dung tích"
                >
                    Dung tích
                </x-form.select-field>
            </div>
            <div class="input-box">
                <x-form.text-field
                    name="actual_weight"
                    class="form-control"
                    type="text"
                    placeholder="NNhập dung tích thực"
                >
                    Dung tích thực
                </x-form.text-field>
            </div>
            <div class="input-box">
                <x-form.select-field
                    name="size_id"
                    :array='$size'
                    optValue="id"
                    optLabel="description"
                    default="Chọn kích thước"
                >
                    Kích thước
                </x-form.select-field>
            </div>
            <div class="input-box">
                <x-form.text-field
                    name="actual_size"
                    class="form-control"
                    type="text"
                    placeholder="Nhập kích thước chuẩn"
                >
                    Kích thước chuẩn
                </x-form.text-field>
            </div>
            <div class="input-box">
                <x-form.text-field
                    name="specification_price"
                    class="form-control"
                    type="number"
                    placeholder="Nhập giá cho thông số"
                >
                    Kích thước chuẩn
                </x-form.text-field>
            </div>
            <button class="btn btn-primary" type="submit">Lưu</button>
        </form>
    </div>
@endsection
