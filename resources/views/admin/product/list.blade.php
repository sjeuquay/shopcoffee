@extends('admin.layout')
@section('title', 'Product list')

@section('content')
    <div class="card">
        <h5 class="card-header">
            <div class="d-flex flex-wrap gap-2 justify-content-between">
                <div class="fs-4">{{ $title }}</div>
                <a href="{{ route('admin.products.list.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i>
                    Thêm sản phẩm
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
                        <th class="text-center">Ảnh</th>
                        <th>Giá</th>
                        <th>Danh mục</th>
                        <th>Số lượng</th>
                        <th>Status</th>
                        <th>Ngày tạo</th>
                        <th>Actions</th>
                        <th>Thông số</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($productList as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>
                                <div class="d-block text-truncate">{{ $list->name }}</div>
                            </td>
                            <td class="text-center">
                                <img
                                    src="{{ asset('img/product/' . $list->internal_image_path) }}"
                                    alt=""
                                    class="w-25"
                                />
                            </td>
                            <td>{{ $list->unit_price }}</td>
                            <td>{{ $list->category_id }}</td>
                            <td>{{ $list->quantity_available }}</td>
                            <td><span class="badge bg-label-primary me-1">{{ $list->is_active }}</span></td>
                            <td>{{ $list->created_date }}</td>
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
                                        {{--
                                            <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#Detail">
                                            Detail
                                            </div>
                                        --}}
                                        <a
                                            class="dropdown-item"
                                            href="{{ route('admin.products.list.edit', ['list' => $list->id]) }}"
                                        >
                                            Edit
                                        </a>
                                        <div
                                            type="button"
                                            class="dropdown-item"
                                            data-bs-toggle="modal"
                                            data-bs-target="#confirm-delete_product"
                                            data-bs-deleteId="{{ $list->id }} "
                                        >
                                            {{-- #ten+ id --}}
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn">
                                    <a
                                        href="{{ route('admin.products.specification.show', ['specification' => $list->id]) }}"
                                    >
                                        Xem
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Model --}}
            {{--
                <div class="modal fade" id="Detail" tabindex="-1" aria-labelledby="DetailLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-4" id="exampleModalLabel">Thông tin sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                <div class="row">
                <div class="col-md-6">
                <img src="{{ asset('img/product/') }}" alt=""
                class="img-fluid product-image">
                </div>
                <div class="col-md-6">
                <div class="overflow-auto" style="height: 300px" data-bs-spy="scroll">
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Mã sản phẩm: </span>
                #1
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Tên sản phẩm: </span>
                Albert CookAlbert CookAlbert Cook dài quá tôi nó xuống dòng
                !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Danh mục: </span>
                Nước
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Số lượng sản phẩm: </span>
                20
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Cho phép tìm kiếm: </span>
                <span class="badge text-bg-success">Có</span>
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Cho phép hiển thị danh mục: </span>
                <span class="badge text-bg-danger">Không</span>
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">SKU: </span>
                WW80K5233YW/SV
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Mô tả: </span>
                Mô tả
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Mô tả ngắn: </span>
                Mô tả ngắn
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Mô tả meta: </span>
                Mô tả meta
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Giá sản phẩm: </span>
                140.000.000
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">URL Key: </span>
                product-1
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Base Url: </span>
                <a href="#">http://example.com/product-1</a>
                </div>
                </div>
                <div class="product d-flex flex-nowrap">
                <div class="d-block text-wrap mb-2">
                <span class="name fw-bold fs-5">Ngày tạo: </span>
                25/04/2024
                </div>
                </div>
                </div>
                </div>
                </div>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('admin.products.list.edit', ['list' => '1']) }}" type="button"
                class="btn btn-primary">Edit</a>
                </div>
                </div>
                </div>
                </div>
            --}}

            {{-- model --}}
            {{-- START - DELETE CONFIRM MODAL --}}
            <x-form.confirm-modal
                id="confirm-delete_product"
                method="delete"
                action="{{ route('admin.products.list.destroy', '') }}"
                varying="data-bs-deleteId"
            >
                Bạn có thực sự muốn xóa sản phẩm này này?
            </x-form.confirm-modal>
            {{-- END - DELETE CONFIRM MODAL --}}
        </div>
    </div>

    <script></script>
@endsection
