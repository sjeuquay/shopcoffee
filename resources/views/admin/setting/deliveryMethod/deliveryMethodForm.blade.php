@extends('admin.layout')

@section('title', 'Form phương thức giao hàng')

@section('content')
    <a href="{{ route('admin.setting.deliverymethod.index') }}">Quay lại</a>
    <div class="fs-4 my-2">{{ $title }}</div>
    <div class="card-body">
        <form action="{{ $action }}" id="formAccountSettings" method="POST">
            @csrf
            @method($method)
            <div class="mb-3">
                <x-form.text-field name='type' type='number' placeholder='' edit="{{ $deliveryMethod->type ?? '' }}">
                    Type
                </x-form.text-field>
            </div>
            <div class="mb-3">
                <x-form.text-field name='short_description' type='type' placeholder=''
                    edit="{{ $deliveryMethod->short_description ?? '' }}">
                    SHORT_DESCRIPTION
                </x-form.text-field>
            </div>
            <div class="mb-3">
                <x-form.text-field name='long_description' type='type' placeholder=''
                    edit="{{ $deliveryMethod->long_description ?? '' }}">
                    long_description
                </x-form.text-field>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
