@extends('admin.layout')

@section('title', $title)

@section('content')
    <div class="card">
        <h5 class="card-header">
            <div class="d-flex flex-wrap gap-2 justify-content-between">
                <div class="fs-4">{{ $title }}</div>
                <a
                    href="{{ route('admin.products.specification.add', ['id' => $product->id]) }}"
                    class="btn btn-primary"
                >
                    <i class="bi bi-plus-lg me-2"></i>
                    Thêm Thông Số
                </a>
            </div>
        </h5>
        @if (session('response_message'))
            {!! session('response_message') !!}
        @endif

        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã SP</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Danh mục</th>
                        <th>Số lượng</th>
                        <th>Status</th>
                        <th>Ngày tạo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($specification_list as $item)
                        <tr>
                            <td>Hello</td>
                            <td>
                                <div class="d-block text-truncate"></div>
                            </td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                            <td>
                                1
                                <span class="badge bg-label-primary me-1"></span>
                            </td>
                            <td>1</td>
                            <td>
                                <div class="dropdown">
                                    <button
                                        type="button"
                                        class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"
                                    >
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="">Edit</a>
                                        <div
                                            type="button"
                                            class="dropdown-item"
                                            data-bs-toggle="modal"
                                            data-bs-target="#confirm-delete_product"
                                            data-bs-deleteId="id"
                                        >
                                            {{-- #ten+ id --}}
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- model --}}
            {{-- START - DELETE CONFIRM MODAL --}}
            <x-form.confirm-modal
                id="confirm-delete_product"
                method="delete"
                action="{{ route('admin.products.list.destroy', '') }}"
                varying="data-bs-deleteId"
            >
                Bạn có thực sự muốn xóa thông số này?
            </x-form.confirm-modal>
            {{-- END - DELETE CONFIRM MODAL --}}
        </div>
    </div>

    <script></script>
@endsection
