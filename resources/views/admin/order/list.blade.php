@extends('admin.layout')

@section('title', 'Order list')

@section('content')

    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="d-flex gap-3 align-items-center">
            <h3 class="m-0">
                Order list </h3>
            {{-- <a class="btn btn-primary text-white" href="{{ route('admin.orders.list.create') }}">Add new +</a> --}}
        </div>
        <div class="search input-group w-auto">
            <label for="search_vendor" class="input-group-text">
                <i class="bi bi-search"></i>
            </label>
            <input id="search_vendor" type="text" class="form-control" placeholder="search vendor">
            <button type="submit" class="btn btn-primary">Tìm </button>
        </div>
    </div>


    <table class="table table-borderless mt-2">
        <thead class="bg-secondary-subtle">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">User name</th>
                <th scope="col">Mã khuyến mãi</th>
                <th scope="col">Số tiền phải trả</th>
                <th scope="col">Phương thức thanh toán</th>
                <th scope="col">Phương thức xử lý</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Ngày cập nhập</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $od)
                <tr class="bg-white rounded">
                    <td><span class="fw-medium">#{{ $od->id }}</span></td>
                    <td>{{ $od->user_name ?? 'không có dữ liệu'}}</td>
                    <td>{{ $od->prommotion_code ?? 'không có dữ liệu' }}</td>
                    <td>{{ $od->payable_amount }}</td>
                    <td>{{ $od->payment->type ?? 'không có dữ liệu'}}</td>
                    <td>{{ $od->deliveryMethod->short_description ?? 'không có dữ liệu'}}</td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 100px;">
                            {{ $od->ship_address }}
                        </span>
                    </td>
                    @include('admin.order.fieldStatus', ['status_id' => $od->status])
                    <td>{{ $od->date_created }}</td>
                    <td>{{ $od->date_modified }}</td>
                    <td>
                        <div class="d-flex gap-3">
                            <a href="{{ route('admin.orders.apply', ['id' => $od->id]) }}"
                                class="btn btn-outline-primary btn-sm {{ ($od->status->status_code ?? '5') < 4 ? '' : 'd-none' }}">Duyệt
                                đơn </a>
                            <a href="{{ route('admin.orders.cancel', ['id' => $od->id]) }}"
                                class="btn btn-outline-danger btn-sm {{ ($od->status->status_code ?? '5') < 4 ? '' : 'd-none' }}">Hủy
                                đơn </a>
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


    {{-- Model --}}


@endsection
