@extends('admin.layout')

@section('title', 'Product Related List')

@section('content')
    <h5 class="card-header">
        <div class="d-flex flex-wrap gap-2 justify-content-between">
            <div class="fs-4">Quản lý products related</div>
            <a href="{{ route('admin.products.related.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg me-2"></i>
                Thêm sản phẩm
            </a>
        </div>
        @if (session('response_message'))
            {!! session('response_message') !!}
        @endif
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Related_id_list</th>
                        <th>recommend_id_list</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($list as $lt)
                        <tr>
                            <td>#{{ $lt->id }}</td>
                            <td>{{ $lt->related_id_list == null ? 'Không có dữ liệu' : $lt->related_id_list }}</td>
                            <td>{{ $lt->recommend_id_list == null ? 'Không có dữ liệu' : $lt->recommend_id_list }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('admin.products.related.edit', ['related' => $lt->id]) }}">
                                            Edit</a>
                                        <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#confirm-delete" data-bs-deleteId="{{ $lt->id }}">
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </h5>

    {{-- START - DELETE CONFIRM MODAL --}}
    <x-form.confirm-modal id="confirm-delete" method="delete" action="{{ route('admin.products.related.destroy', '') }}"
        varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa nguyên liệu này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}
@endsection
