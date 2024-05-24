@extends('admin.layout')

@section('title', 'Status Form')

@section('content')
    <a href="{{ route('admin.setting.status.index') }}">Quay lại</a>
    <div class="card-body">
        <div class="fs-4 my-2">{{ $title }}</div>
        <form action="{{ $route }}" method="POST">
            @csrf
            @method($method)
            <div class="row">
                <div class="mb-3 col-md-6">
                    <x-form.text-field name='status_code' type='text' placeholder="Nhập mã code status"
                        edit="{{ $status->status_code ?? ''}}">
                        Code status<span class="text-danger">*</span></label>
                    </x-form.text-field>
                    <x-form.text-field name='description' type='text' placeholder="Nhập mô tả"
                        edit="{{ $status->description ?? '' }}">
                        Mô tả<span class="text-danger">*</span></label>
                    </x-form.text-field>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2" fdprocessedid="bounwi">Lưu</button>
                <button type="reset" class="btn btn-outline-secondary" onclick="clearForm()">Hủy</button>
            </div>
        </form>
    </div>

    <script>
        function clearForm() {
            setTimeout(function() {
                document.getElementById("description").value = "";
                document.getElementById("status_code").value = "";
            }, 0);
        }
    </script>
@endsection
