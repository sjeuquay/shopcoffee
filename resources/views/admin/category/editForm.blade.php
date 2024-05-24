@extends('admin.layout')
@section('title', 'Category Form')
@section('content')
    <a href="{{ route('admin.category.list.index') }}">Quay lại</a>
    <div class="card-body">
        <div class="fs-4 my-2">{{ $title }}</div>
        <div class="my-2 text-danger">Những (*) bắt buộc phải nhập</div>
        <form action="{{ route('admin.category.list.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">

                    <img src="{{ asset('img/category/' . $category->image) }}" alt="Không có hình nào *" class="d-block"
                        height="300" id="uploadedAvatar">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <div class="button-wrapper my-2">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <input type="file" id="upload" name="image" class="account-file-input" hidden=""
                                accept="image/png, image/jpeg">
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" id="resetButton">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="mb-3 ">
                        <x-form.text-field name='name' type='text' placeholder="Nhập tên danh mục"
                            edit="{{ $category->name ?? '' }}">
                            Tên Danh mục<span class="text-danger">*</span></label>
                        </x-form.text-field>
                    </div>
                    <div class="mb-3 ">
                        <x-form.text-field name='description' type='text' placeholder="Nhập mô tả"
                            edit="{{ $category->description ?? '' }}">
                            Mô tả <span class="text-danger">*</span>
                        </x-form.text-field>
                    </div>
                    <div class="mb-3 ">
                        <x-form.text-field name='url_key' type='text' placeholder="Nhập url key"
                            edit="{{ $category->url_key ?? '' }}">
                            Url key <span class="text-danger">*</span>
                        </x-form.text-field>
                    </div>
                    <div class="mb-3">
                        <x-form.text-field name='meta_description' type='text' placeholder="Mô tả dài..." error="false"
                            edit="{{ $category->meta_description ?? '' }}">
                            Mô tả dài
                        </x-form.text-field>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2" fdprocessedid="bounwi">Thêm</button>
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
