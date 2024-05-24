@extends('admin.layout')
@section('title', 'Phân Quyền')
@section('content')
    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Role Permission</div>
        <a href="{{ route('admin.user.rolePermission.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm role permission
        </a>
    </div>
    @if (session('response_message'))
        {!! session('response_message') !!}
    @endif
    <div class="d-block-inline my-2">
        <form class="input-group" style="width: 320px">
            <input type="text" class="form-control" placeholder="Nhập nội dung">
            <span class="input-group-text bg-primary text-white">Tìm kiếm</span>
        </form>
    </div>

    <table class="table">
        <thead>

            <tr>
                <th scope="col">ID</th>
                <th scope="col">Picked Permission</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @isset($rolePermission_list)
                @foreach ($rolePermission_list as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td class="col-6">
                            @foreach ($column_name_withoutId as $column_name)
                                @if ($item->$column_name == 1)
                                    <span class="badge rounded-pill text-bg-primary">{{ $column_name }}</span>
                                @endif
                            @endforeach
                        </td>
                        {{-- CRUD  --}}
                        <td>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('admin.user.rolePermission.edit', $item->id) }}">Edit</a>
                                    </li>
                                    <li>
                                        <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#confirm-delete_rolePermission"
                                            data-bs-deleteId="{{ $item->id }}">
                                            Delete
                                        </div>
                                        {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endisset


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
    {{-- Model --}}
    <x-form.confirm-modal id="confirm-delete_rolePermission" method="delete"
        action="{{ route('admin.user.rolePermission.destroy', '') }}" varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa sản phẩm này này?
    </x-form.confirm-modal>

    <div class="modal fade" id="Delete" tabindex="-1" aria-labelledby="DeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="exampleModalLabel">Bạn có chắc muốn
                        xóa role này ?</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" type="button" class="btn btn-primary">Save</a>
                </div>
            </div>
        </div>
    </div>
@endsection
