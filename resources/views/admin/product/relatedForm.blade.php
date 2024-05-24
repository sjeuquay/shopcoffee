@extends('admin.layout')

@section('title', 'Product Related Form')

@section('content')
    <a href="{{ route('admin.products.related.index') }}">Quay lại</a>
    <div class="fs-4 my-2">{{ $title }}</div>
    <div class="card-body">
        <form method="POST" action="{{ $route }}">
            @csrf
            @method($method)
            <div class="row">
                <div class="mb-3 col-md-6">
                    <x-form.text-field name="related_id_list" type='text'
                        edit="{{ $relatedProduct->related_id_list ?? '' }}">
                        RELATED_ID_LIST
                    </x-form.text-field>
                </div>
                <div class="mb-3 col-md-6">
                    <x-form.text-field name="recommend_id_list" type='text'
                        edit="{{ $relatedProduct->recommend_id_list ?? '' }}">
                        RECOMMEND_ID_LIST
                    </x-form.text-field>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2" fdprocessedid="bounwi">Lưu</button>
            </div>
        </form>
    </div>
@endsection
