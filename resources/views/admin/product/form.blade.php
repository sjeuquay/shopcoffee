@extends('admin.layout')

@section('title', 'Product Form')

@section('content')
    <a href="{{ route('admin.products.list.index') }}">Quay lại</a>
    <div class="fs-4 my-2">{{ $title }}</div>
    <div class="card-body">
        <form action="{{ route('admin.products.list.store') }}" id="formAccountSettings" method="POST"
            enctype="multipart/form-data">
            {{-- Upload ảnh --}}
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <img src="" alt="user-avatar" class="d-block" height="400" id="uploadedAvatar">
                    <div class="button-wrapper my-2">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input name="internal_image_path" type="file" id="upload" class="account-file-input"
                                hidden="" accept="image/png, image/jpeg, image/jpg">
                            @error('internal_image_path')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                    </div>
                </div>
                <div class="row col-md-8">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="catgory_id" class="form-label">Danh mục</label>
                            <select name="category_id" class="form-select">
                                <option value="1" selected>Danh Mục 1</option>
                                <option value="2">Danh Mục 2</option>
                                <option value="3">Danh Mục 3</option>
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Status</label>
                            <select name="is_active" class="form-select" id="is_active">
                                <option value="1" selected>Enable</option>
                                <option value="0">Disable</option>
                            </select>
                            @error('is_active')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="quantity_available" class="form-label">Số lượng sản phẩm</label>
                            <input name="quantity_available" type="number" class="form-control" id="quantity_available"
                                placeholder="">
                            @error('quantity_available')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="unit_price" class="form-label">Giá sản phẩm</label>
                            <input name="unit_price" type="text" class="form-control" id="unit_price" placeholder="">
                            @error('unit_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sku" class="form-label">SKU</label>
                            <input name="sku" type="text" class="form-control" id="sku" placeholder="">
                            @error('sku')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="url_key" class="form-label">URL Key</label>
                            <input name="url_key" type="text" class="form-control" id="url_key" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="base_url" class="form-label">Base Url</label>
                            <input name="base_url" type="text" class="form-control" id="base_url" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <input name="description" type="text" class="form-control" id="description"
                                placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="short_description" class="form-label">Mô tả ngắn</label>
                            <input name="short_description" type="text" class="form-control" id="short_description"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Mô tả meta</label>
                            <textarea name="meta_description" class="form-control" id="meta_description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="form-check mt-3">
                                <input name="is_category_visible" class="form-check-input" type="checkbox"
                                    value="1" id="is_category_visible">
                                <label class="form-check-label" for="is_category_visible">
                                    Cho phép hiển thị danh mục
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check mt-3">
                                <input name="is_category_searchable" class="form-check-input" type="checkbox"
                                    value="1" id="is_category_searchable">
                                <label class="form-check-label" for="is_category_searchable">
                                    Cho phép tìm kiếm
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check mt-3">
                                <input name="is_in_stock" class="form-check-input" type="checkbox" value="1"
                                    id="is_in_stock">
                                <label class="form-check-label" for="is_in_stock">
                                    Còn hàng
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        const uploadInput = document.getElementById('upload');
        const uploadedAvatar = document.getElementById('uploadedAvatar');

        uploadInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                uploadedAvatar.setAttribute('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
        resetButton.addEventListener('click', function() {
            uploadedAvatar.setAttribute('src', '');
            uploadInput.value = '';
        });
    </script>

@endsection
