@extends('admin.layout')

@section('title', 'User Device List')

@section('content')
    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Quản lý User Device</div>
        <a href="{{ route('admin.user.device.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm user device
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">User name</th>
                <th scope="col">Emei</th>
                <th scope="col">Name</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>1234567890</td>
                <td>Mark</td>
                <td>27-4-2024</td>
                {{-- CRUD  --}}
                <td>

                    <div class="dropdown">
                        <i class="bi bi-three-dots-vertical" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false"></i>
                        <ul class="dropdown-menu">
                            <li>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('admin.user.device.edit', ['device' => 1]) }}">Edit</a>
                            </li>
                            <li>
                                <div type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#Delete">
                                    {{-- #ten+ id  --}}
                                    Delete
                                </div>
                                {{-- <a class="dropdown-item" href="#">Delete</a> --}}
                            </li>
                        </ul>
                    </div>

                </td>
            </tr>
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
