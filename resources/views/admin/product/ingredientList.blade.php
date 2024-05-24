@extends('admin.layout')

@section('title', 'Product Ingredient List')

@section('content')
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="d-flex gap-3 align-items-center">
            <h3 class="m-0">
                Ingredient list </h3>
            <a class="btn btn-primary text-white" href="{{ route('admin.products.ingredients.create') }}">Add new +</a>
        </div>
        <div class="search input-group w-auto">
            <label for="search_vendor" class="input-group-text">
                <i class="bi bi-search"></i>
            </label>
            <input id="search_vendor" type="text" class="form-control" placeholder="search vendor">
        </div>
    </div>
    @if (session('response_message'))
        {!! session('response_message') !!}
    @endif
    <div class="table-responsive">
        <table class="table table-borderless mt-2">
            <thead class="bg-secondary-subtle">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Product id</th>
                    <th scope="col">Lựa chọn 1</th>
                    <th scope="col">Giá 1</th>
                    <th scope="col">Lựa chọn 1</th>
                    <th scope="col">Giá 1</th>
                    <th scope="col">Lựa chọn 1</th>
                    <th scope="col">Giá 1</th>
                    <th scope="col">Ngày Tạo</th>
                    <th scope="col">Ngày Cập nhập</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ingredients as $ig)
                    <tr class="bg-white rounded">
                        <td><span class="fw-medium">{{ $ig->id }}</span></td>
                        <td>{{ $ig->product_id }}</td>
                        <td>{{ $ig->option_1 }}</td>
                        <td>{{ number_format($ig->unit_price1, 2, ".", ",") }}đ</td>
                        <td>{{ $ig->option_2 }}</td>
                        <td>{{ number_format($ig->unit_price2, 2, ".", ",") }}đ</td>
                        <td>{{ $ig->option_3 }}</td>
                        <td>{{ number_format($ig->unit_price3, 2, ".", ",") }}đ</td>
                        <td>{{ $ig->created_date }}</td>
                        <td>{{ $ig->modified_date }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.products.ingredients.edit', ['ingredient' => $ig->id]) }}">
                                        Edit</a>
                                    <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#confirm-delete" data-bs-deleteId="{{ $ig->id }}">
                                        {{-- #ten+ id  --}}
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
    <x-form.confirm-modal id="confirm-delete" method="delete" action="{{ route('admin.products.ingredients.destroy', '') }}"
        varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa nguyên liệu này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}
@endsection
