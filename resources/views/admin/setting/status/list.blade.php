@extends('admin.layout')

@section('title', 'Trạng thái')

@section('content')
    {{-- Tittle --}}
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="fs-4">Quản lý slider</div>
        <a href="{{ route('admin.setting.status.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i>
            Thêm status
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
                <th scope="col">#</th>
                <th scope="col">Mô tả</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($status as $st)
                <tr>
                    <th scope="row">{{ $st->status_code }}</th>
                    <td>
                        {{ $st->description }}
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
                                        href="{{ route('admin.setting.status.edit', ['status' =>  $st->status_code ]) }}">Sửa</a>
                                </li>
                                <li>
                                    <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#confirm-delete" data-bs-deleteId="{{ $st->status_code }}">
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
    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete" method="delete" action="{{ route('admin.setting.status.destroy', '') }}"
        varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa trạng thái này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}

@endsection
