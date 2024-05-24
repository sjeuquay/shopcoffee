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
        <form method="POST" class="form-container">
            <div class="input-box">
                <label for="length" class="form-label">Chiều dài</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="length">
                    <div class="input-group-text">cm</div>
                </div>
            </div>
            <div class="input-box">
                <label for="width" class="form-label">Chiều rộng</label>
                <div class="input-group">
                    <input type="text" name="width" class="form-control" id="width">
                    <div class="input-group-text">gram</div>
                </div>
            </div>
            <div class="input-box">
                <label for="height" class="form-label">Chiều cao</label>
                <div class="input-group">
                    <input type="text" name="height" class="form-control" id="height">
                    <div class="input-group-text">cm</div>
                </div>
            </div>
            <div class="input-box">
                <label for="weight_id" class="form-label">ID dung tích</label>
                <div class="input-group">
                    <input type="text" name="weight_id" class="form-control" id="weight_id">
                </div>
            </div>
            <div class="input-box">
                <label for="actual_weight" class="form-label">Dung tích thực</label>
                <div class="input-group">
                    <input type="text" name="actual_weight" class="form-control" id="actual_weight">
                </div>
            </div>
            <div class="input-box">
                <label for="size_id" class="form-label">ID kích thước</label>
                <div class="input-group">
                    <input type="text" name="size_id" class="form-control" id="size_id">
                </div>
            </div>
            <div class="input-box">
                <label for="actual_size" class="form-label">Kích thước chuẩn</label>
                <div class="input-group">
                    <input type="text" name="actual_size" class="form-control" id="actual_size">
                    <div class="input-group-text">cm</div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Lưu</button>
        </form>
    </div>
@endsection
