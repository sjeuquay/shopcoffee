@extends('admin.layout')

@section('title', 'Oder Form')

@section('content')
    <a href="{{ route('admin.orders.list.index') }}">Quay lại</a>
    <div class="fs-4 my-2">Thêm order</div>
    <div class="card-body">
        <form action="#" id="formAccountSettings" method="POST">

            <div class="mb-3">
                <label for="" class="form-label">User name:</label>
                <input type="text" class="form-control" id="" placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">PRICE:</label>
                <input type="text" class="form-control" id="" placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">ADDRESS:</label>
                <input type="text" class="form-control" id="" placeholder="">
            </div>
            <div class="mb-3">
                <x-form.select-field name="status" :array="$statusId" optValue="id" optLabel="description" default="Hãy chọn">
                    Status
                </x-form.select-field>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
