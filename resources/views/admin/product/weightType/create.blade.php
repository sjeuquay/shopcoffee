@extends('admin.layout')

@section('content')
    <a href="{{ route('admin.products.weightType.index') }}">Quay lại</a>
    <div class="card-body">
        <div class="fs-4 my-2">Thêm loại trọng lượng</div>

        <form id="add-size_type" action="{{ route('admin.products.weightType.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6">

                    <x-form.text-field name="description">
                        Mô tả kích cỡ
                    </x-form.text-field>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Thêm</button>
            </div>
        </form>
    </div>
@endsection
