@extends('admin.layout')

@section('title', 'User Device Form')

@section('content')
<a href="{{ route('admin.user.device.index') }}">Quay lại</a>
<div class="card-body">
    <div class="fs-4 my-2">{{$title}}</div>
    <form id="formAccountSettings" method="POST" onsubmit="return false">
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="username" class="form-label">User name</label>
                <input class="form-control" type="text" id="username" name="username" value=""
                    placeholder="Nhập tên user name">
            </div>
            <div class="mb-3 col-md-6">
                <label for="emei" class="form-label">Emei</label>
                <input class="form-control" type="text" id="emei" name="emei" value=""
                    placeholder="Nhập emei">
            </div>

            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">Name</label>
                <input class="form-control" type="text" id="name" name="name" value=""
                    placeholder="Nhập name">
            </div>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2" fdprocessedid="bounwi">Save changes</button>
            <button type="reset" class="btn btn-outline-secondary" fdprocessedid="wrcwi8">Cancel</button>
        </div>
    </form>
</div>
@endsection