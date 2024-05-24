@extends('admin.layout')

@section('content')
    <a href="{{ route('admin.products.sizetype.index') }}">Quay lại</a>
    <div class="card-body">
        <div class="fs-4 my-2">Chỉnh sửa thông tin kích cỡ</div>
        <form action="{{ route('admin.products.sizetype.update', $s->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="mb-3 col-md-6">
                    <x-form.text-field name="description" required maxlength="20" value="{{ $s->description }}">
                        Tên thiết bị
                    </x-form.text-field>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Lưu</button>
            </div>
        </form>
    </div>
@endsection
