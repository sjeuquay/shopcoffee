@extends('admin.layout')

@section('title', 'Danh sách Category')

@section('content')
    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Quản lý danh mục</div>
        <a href="{{ route('admin.category.list.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm danh mục
        </a>
    </div>
    @if (session('response_message'))
        {!! session('response_message') !!}
    @endif
    {{-- Funtion --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center">

        <div class=" d-flex align-items-center justify-content-between">
            {{-- Tìm kiếm thành viên --}}
            <form class="input-group me-2 flex-wrap">
                <input type="text" class="form-control" placeholder="Nhập nội dung">
                <span class="input-group-text bg-primary text-white">Tìm kiếm</span>
            </form>
            {{-- Lọc nhóm thành viên --}}

            <div class="filter d-flex">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Sắp xếp
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mới Nhất</a></li>
                        <li><a class="dropdown-item" href="#">Cũ Nhất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Mô tả dài</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $lt)
                <tr>
                    <th scope="row">{{ $lt->id }}</th>
                    <td>
                        <img src="{{ asset('img/category/' . $lt->image) }}" alt="" style="width: 300px">
                    </td>
                    <td>{{ $lt->name }}</td>
                    <td>{{ $lt->description }}</td>
                    <td>{{ $lt->meta_description }}</td>
                    {{-- CRUD  --}}
                    <td>
                        <div class="d-flex gap-3">
                            <div>
                                <a href="{{ route('admin.category.list.edit', ['list' => $lt->id]) }}"
                                    class="badge text-bg-primary status">Sửa</a>
                            </div>
                            <div>
                                <div type="button" class="badge text-bg-danger" data-bs-toggle="modal"
                                    data-bs-target="#confirm-delete" data-bs-deleteId="{{ $lt->id }}">
                                    Xóa
                                </div>
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


    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete" method="delete" action="{{ route('admin.category.list.destroy', '') }}"
        varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa danh mục này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}
@endsection
