@extends('admin.layout')

@section('title', 'Slider Form')

@section('content')
    <a href="{{ route('admin.sliders.index') }}">Quay lại</a>
    <div class="fs-4 my-2">{{ $title }}</div>
    <div class="card-body">
        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($method)
            {{-- Upload ảnh --}}
            <div class="d-flex align-items-start align-items-sm-center gap-2">

                <img src="{{ isset($slider) ? asset('img/slider/' . $slider->slide_image) : '0' }}" alt="Không có hình nào"
                    class="d-block" height="150" id="uploadedAvatar">
                <div class="button-wrapper my-2">
                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                        <span class="d-none d-sm-block">Upload new photo</span>
                        <input type="file" id="upload" name='slide_image' class="account-file-input" hidden=""
                            accept="image/png, image/jpeg">
                    </label>
                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" id="resetButton">
                        <i class="bx bx-reset d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Reset</span>
                    </button>
                </div>
            </div>
            @error('slide_image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <hr>
            <div class="row">
                <div class="mb-3 col-md-3">
                    <x-form.text-field name='slide_index' type='text' placeholder='Nhập slide index'
                        edit="{{ $slider->slide_index ?? '' }}">
                        Slide index
                    </x-form.text-field>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-3">
                    <x-form.text-field name='slide_content' type='text' placeholder='Nhập slide content'
                        edit=" {{ $slider->slide_content ?? '' }}">
                        Slide content
                    </x-form.text-field>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label for="active" class="form-label">Hoạt động</label>
                    <select id="active" class="select2 form-select" name='active'>
                        <option value="disable"
                            {{ Route::is('admin.sliders.edit') && $slider->active == 'disable' ? 'selected' : '' }}>
                            Disable
                        </option>
                        <option value="enable"
                            {{ Route::is('admin.sliders.edit') && $slider->active == 'enable' ? 'selected' : '' }}>Enable
                        </option>
                    </select>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Lưu</button>
            </div>
        </form>
    </div>


    <script>
        const uploadInput = document.getElementById('upload');
        const uploadedAvatar = document.getElementById('uploadedAvatar');
        uploadInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            console.log(file);
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
