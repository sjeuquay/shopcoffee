@extends('admin.layout')

@section('title', 'Slider Form')

@section('content')
    <a href="{{ route('admin.promotion.index') }}">Quay lại</a>
    <div class="fs-4 my-2">{{ $title }}</div>
    <div class="text-danger mb-3">Những ô (*) bắt buộc phải nhập</div>
    <div class="card-body">
        <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($method)
            <div class="col-md-8">
                <div class="mb-3 ">
                    <x-form.text-field name='code' type='text' placeholder=""
                    edit="{{$promotion->code ?? ''}}">
                        code
                    </x-form.text-field>
                </div>
                <div class="mb-3 ">
                    <x-form.text-field name='minium_eligible_amount' type='text' placeholder="Hãy nhập dữ liệu"
                        edit="{{ $promotion->minium_eligible_amount ?? '' }}">
                        Tiền tối thiểu cho phép <span class="text-danger">*</span>
                    </x-form.text-field>
                </div>
                <div class="mb-3 ">
                    <x-form.text-field name='max_counts_allow' type='text' placeholder="Hãy nhập dữ liệu" 
                        edit="{{ $promotion->max_counts_allow ?? '' }}">
                        Số lượng tối đa cho phép
                    </x-form.text-field>
                </div>
                <div class="mb-3">
                    <x-form.text-field name='use_percentage' type='text' placeholder="Hãy nhập dữ liệu" 
                        edit="{{ $promotion->use_percentage ?? '' }}">
                        Phần trăm sử dụng
                    </x-form.text-field>
                </div>
                <div class="mb-3">
                    <x-form.text-field name='use_ammount' type='text' placeholder="Hãy nhập dữ liệu" 
                        edit="{{ $promotion->use_ammount ?? '' }}">
                        Số lượng sử dụng
                    </x-form.text-field>
                </div>
                <div class="mb-3">
                    <x-form.text-field name='cap_percentage' type='text' placeholder="Hãy nhập dữ liệu"
                        edit="{{ $promotion->cap_percentage ?? '' }}">
                        Phần trăm giới hạn<span class="text-danger">*</span></label>
                    </x-form.text-field>
                </div>
                <div class="mb-3">
                    <x-form.text-field name='cap_amount' type='text' placeholder="Hãy nhập dữ liệu"
                        edit="{{ $promotion->cap_amount ?? '' }}">
                        Số lượng giới hạn<span class="text-danger">*</span></label>
                    </x-form.text-field>
                </div>
                <div class="mb-3">
                    <x-form.text-field name='expiration_date' type='datetime-local' placeholder="Hãy nhập dữ liệu"
                        onchange="handleInputChange()" onblur="handleInputBlur()"
                        edit="{{ $promotion->expiration_date ?? '' }}">
                        Ngày hết hạn<span class="text-danger">*</span></label>
                    </x-form.text-field>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Lưu</button>
            </div>
        </form>
    </div>
@endsection
