@extends('admin.layout')

@section('title', 'User list')

@section('content')
    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Quản lý thành viên</div>
        <a href="{{ route('admin.user.list.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm thành viên
        </a>
    </div>

    {{-- Funtion --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        {{-- List trang thái thành viên --}}
        <div class="btn-group my-3 d-flex flex-wrap " role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-primary">All</button>
            <button type="button" class="btn btn-outline-primary">Active</button>
            <button type="button" class="btn btn-outline-primary">Inactive</button>
        </div>

        <div class=" d-flex align-items-center justify-content-between">
            {{-- Tìm kiếm thành viên --}}
            <form class="input-group me-2 flex-wrap">
                <input type="text" class="form-control" placeholder="Nhập nội dung">
                <span class="input-group-text bg-primary text-white">Tìm kiếm</span>
            </form>
            {{-- Lọc nhóm thành viên --}}

            <div class="filter d-flex">
                <div class="title-filter mx-2">Lọc:</div>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Chọn kiểu user
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Admin</a></li>
                        <li><a class="dropdown-item" href="#">Vender</a></li>
                        <li><a class="dropdown-item" href="#">User</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User name</th>
                <th scope="col" class="d-md-none d-sm-none d-none d-lg-block">Email</th>
                <th scope="col">Vai trò</th>
                <th scope="col">country_code</th>
                <th scope="col" class="d-md-none d-sm-none d-none d-lg-block">Join</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_id }}</td>
                    <td>{{ $user->country_code }}</td>
                    <td>{{ $user->date_joined }}</td>
                    {{-- CRUD  --}}
                    <td>
                        <div class="d-flex gap-3">
                            <a href="{{ route('admin.user.update.status', $user->id) }}"
                                class="badge {{ $user->status == 1 ? 'text-bg-primary' : 'text-bg-danger' }}">{{ $user->status == 1 ? 'active' : 'inactive' }}</a>
                            <div class="dropdown">
                                <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li>
                                        <!-- Button trigger modal -->
                                        <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#Detail"> {{-- #ten+ id  --}}
                                            Detail
                                        </div>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ route('admin.user.list.edit', ['list' => 1]) }}">Edit</a>
                                    </li>
                                    <li>
                                        <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#Delete"> {{-- #ten+ id  --}}
                                            Delete
                                        </div>
                                        {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                                    </li>
                                </ul>
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


    <!-- Modal -->

    <div class="modal fade" id="Detail" tabindex="-1" aria-labelledby="DetailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="exampleModalLabel">Thông tin người dùng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="fs-5">
                            <div class="username d-flex gap-2">
                                <div class="">Name:</div>
                                <div class="">Trung Tính</div>
                            </div>
                            <div class="username d-flex gap-2">
                                <div class="">Email:</div>
                                <div class="">abc@gmail.com</div>
                            </div>
                            <div class="username d-flex gap-2">
                                <div class="">Status:</div>
                                <div class="">Admin</div>
                            </div>
                            <div class="username d-flex gap-2">
                                <div class="">Số điện thoại:</div>
                                <div class="">0391482931</div>
                            </div>
                            <div class="username d-flex gap-2">
                                <div class="">Country:</div>
                                <div class="">Việt Nam</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{ route('admin.user.list.edit', ['list' => 1]) }}" type="button"
                        class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Model --}}
    <div class="modal fade" id="Delete" tabindex="-1" aria-labelledby="DeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-4" id="exampleModalLabel">Bạn có chắc muốn xóa người dùng này ?</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" type="button" class="btn btn-primary">Save</a>
                </div>
            </div>
        </div>
    </div>

@endsection
