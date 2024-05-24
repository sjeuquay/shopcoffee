@extends('admin.layout')

@section('title', 'Order Detail Form')

@section('content')
    <a href="{{ route('admin.orders.detail.index') }}">Quay lại</a>
    <div class="fs-4 my-2">Thêm order detail </div>

    <div class="card-body">
        <form action="#" id="formAccountSettings" method="POST">

            <div class="mb-3">
                <label for="catgory_id" class="form-label">Mã sản phẩm</label>
                <select class="form-select" id="catgory_id">
                    <option selected="">Mã sản phẩm</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="catgory_id" class="form-label">Mã đơn hàng</label>
                <select class="form-select" id="catgory_id">
                    <option selected="">Mã đơn hàng</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="catgory_id" class="form-label">Tình trạng</label>
                <select class="form-select" id="catgory_id">
                    <option selected="">Tình trạng</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity_available" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="quantity_available" placeholder="">
            </div>
            <div class="mb-3">
                <label for="pricce" class="form-label">Giá sản phẩm</label>
                <input type="text" class="form-control" id="pricce" placeholder="">
            </div>
            <div class="mb-3">
                <label for="pricce" class="form-label">Giá tổng</label>
                <input type="text" class="form-control" id="pricce" placeholder="">
            </div>


            <button type="submit" class="btn btn-primary">Save</button>



        </form>
    </div>
@endsection
