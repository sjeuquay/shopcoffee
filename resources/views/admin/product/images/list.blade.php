@extends('admin.layout')

@section('title', 'Product Images List')

@section('content')
    <div class="container">
        {{-- Tittle --}}
        <div class="d-flex flex-wrap gap-2 justify-content-between">
            <div>
                <span class="fs-4">Product Image </span>
                @if (session('response_message'))
                    {!! session('response_message') !!}
                @endif
            </div>
            <a href="{{route('admin.products.image.create')}}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>
                Thêm Product Image
            </a>
        </div>

        {{-- Funtion --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center">

            <div class=" d-flex align-items-center justify-content-between">
                {{-- Tìm kiếm thành viên --}}
                <form class="input-group me-2 flex-wrap">
                    <input type="text" class="form-control" placeholder="Nhập nội dung">
                    <span class="input-group-text bg-primary text-white">Tìm kiếm</span>
                </form>
                {{-- Lọc nhóm thành viên --}}
            </div>
        </div>
        <hr>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product_Id</th>
                    <th scope="col">Ảnh lớn</th>
                    <th scope="col">Ảnh nhỏ</th>
                    <th scope="col">Vị trí ảnh</th>
                    <th scope="col">is_front_face</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productImages as $pi)
                    <tr>
                        <th scope="row">#{{$pi->id}}</th>
                        <td>{{$pi->product_id}}</td>
                        <td><img src="{{ asset('img/product/' . $pi->product_large_thumb) }}" alt="" width="200px"></td>
                        <td><img src="{{ asset('img/product/' . $pi->product_small_thumb) }}" alt="" width="200px"></td>
                        <td>{{$pi->product_position}}</td>
                        <td>{{$pi->is_front_face}}</td>
                        {{-- CRUD  --}}
                        <td>
                            <div class="d-flex gap-3">
                                <div>
                                    <a href="{{route('admin.products.image.edit',['image'=>$pi->id])}}" class="badge text-bg-primary status">Sửa</a>
                                </div>
                                <div>
                                    <a data-bs-toggle="modal" data-bs-target="#confirm-delete" data-bs-deleteId="{{$pi->id}}"
                                        class="badge text-bg-danger status cursor-pointer">Xoá</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete" method="delete"
        action="{{ route('admin.products.image.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa ảnh sản phẩm này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}
@endsection
