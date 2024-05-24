@extends('admin.layout')
@section('title', 'Promotion list')

@section('content')
    <div class="card">
        <h5 class="card-header">
            <div class="d-flex flex-wrap gap-2 justify-content-between">
                <div class="fs-4">Khuyến mãi</div>
                <a href="{{ route('admin.promotion.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-2"></i>
                    Thêm sản phẩm
                </a>
            </div>
            @if (session('response_message'))
                {!! session('response_message') !!}
            @endif
        </h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Tiền tối thiểu cho phép</th>
                        <th>Số lượng tối đa cho phép</th>
                        <th>Phần trăm sử dụng</th>
                        <th>Số lượng sử dụng</th>
                        <th>Phần trăm giới hạn</th>
                        <th>Số lượng giới hạn</th>
                        <th>Ngày hết hạn</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($promotions as $pt)
                        <tr>
                            <td>#{{ $pt->id }}</td>
                            <td>{{ $pt->code ? $pt->code : 'không có dữ liệu' }}</td>
                            <td>{{ $pt->minium_eligible_amount }}</td>
                            <td>{{ $pt->max_counts_allow ? $pt->max_counts_allow : 'không có dữ liệu' }}</td>
                            <td>{{ $pt->use_percentage ? $pt->use_percentage : 'không có dữ liệu' }}</td>
                            <td>{{ $pt->use_ammount ? $pt->use_ammount : 'không có dữ liệu' }}</td>
                            <td>{{ $pt->cap_percentage }}</td>
                            <td>{{ $pt->cap_percentage }}</td>
                            <td>{{ $pt->expiration_date }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bi bi-three-dots-vertical"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.promotion.edit', $pt->id) }}">
                                            Sửa</a>
                                        <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#confirm-delete" data-bs-deleteId="{{ $pt->id }}">
                                            {{-- #ten+ id  --}}
                                            Xóa
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
            <x-form.confirm-modal id="confirm-delete" method="delete" action="{{ route('admin.promotion.destroy', '') }}"
                varying="data-bs-deleteId">
                Bạn có thực sự muốn xóa danh sách này?
            </x-form.confirm-modal>
            {{-- END - DELETE CONFIRM MODAL --}}
        </div>
    </div>



@endsection
