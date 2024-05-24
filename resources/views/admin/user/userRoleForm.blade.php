@extends('admin.layout')

@section('title', 'User Role Form')

@section('content')
    <a href="{{ route('admin.user.role.index') }}">Quay lại</a>
    <div class="card-body">
        <div class="fs-4 my-2">{{ $title }}</div>
        <form action="{{ $route }}" method="POST">
            @csrf
            @method($method)
            <div class="row">
                <div class="mb-3 col-md-6">
                    <x-form.select-field name='permission_id' :array='$permission_id' optValue='id' optLabel='id'
                        default="Chọn permission">Permision
                    </x-form.select-field>
                </div>
                <div class="mb-3 col-md-6">
                    <x-form.text-field name='description' type='text' placeholder='Nhập mô tả'
                        edit="{{ $userRole->description ?? '' }}">
                        Mô tả
                    </x-form.text-field>
                </div>

            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2" fdprocessedid="bounwi">Save changes</button>
                <button type="reset" class="btn btn-outline-secondary" fdprocessedid="wrcwi8">Cancel</button>
            </div>
        </form>
    </div>
    @php
        if (Route::is('admin.user.role.create')) {
            $permission_id = null;
            $userRole = null;
        }
    @endphp
    <script type="module">
        var datajson = @json($permission_id);
        var datajson1 = @json($userRole);
        if (datajson) {
            datajson.forEach(element => {
                if (element['id'] === datajson1['permission_id']) {
                    var optionElement = document.querySelector(`option[value='${datajson1['permission_id']}']`);
                    optionElement.setAttribute('selected', '');
                }
            });
        }
    </script>
@endsection
