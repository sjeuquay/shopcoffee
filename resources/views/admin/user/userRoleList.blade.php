@extends('admin.layout')

@section('title', 'User Role List')

@section('content')
    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Quản lý Roles</div>
        <a href="{{ route('admin.user.role.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm role
        </a>
    </div>

    <div class="d-block-inline my-2">
        <form class="input-group" style="width: 320px">
            <input type="text" class="form-control" placeholder="Nhập nội dung">
            <span class="input-group-text bg-primary text-white">Tìm kiếm</span>
        </form>
    </div>
    @if (session('response_message'))
        {!! session('response_message') !!}
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Permission id</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $rl)
                <tr>
                    <th scope="row">#{{ $rl->id }}</th>
                    <td>{{ $rl->permission_id }}</td>
                    <td>
                        {{ $rl->description }}
                    </td>
                    {{-- CRUD  --}}
                    <td>
                        <div class="dropdown">
                            <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false"></i>
                            <ul class="dropdown-menu">
                                <li>
                                </li>
                                <li><a class="dropdown-item" href="{{route('admin.user.role.edit',$rl->id)}}">Edit</a>
                                </li>
                                <li>
                                    <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#confirm-delete" data-bs-deleteId="{{ $rl->id }}">
                                        {{-- #ten+ id  --}}
                                        Xóa
                                    </div>
                                </li>
                            </ul>
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
    <x-form.confirm-modal id="confirm-delete" method="delete" action="{{ route('admin.user.role.destroy', '') }}"
        varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa user role này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}
@endsection
