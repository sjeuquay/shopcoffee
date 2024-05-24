@extends('admin.layout')

@section('title', 'Phương thức giao hàng')

@section('content')
    <div class="d-flex flex-wrap gap-2 justify-content-between">
        <div class="d-flex gap-3 align-items-center">
            <h3 class="m-0">
                Phương thức giao hàng</h3>
            <a class="btn btn-primary text-white" href="{{ route('admin.setting.deliverymethod.create') }}">Add new +</a>
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
    <table class="table table-borderless mt-2">
        <thead class="bg-secondary-subtle">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Type</th>
                <th scope="col">short_description</th>
                <th scope="col">long_description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deliveryMethod as $dm)
                <tr class="bg-white rounded">
                    <td><span class="fw-medium">{{ $dm->id }}</span>
                    </td>
                    <td>{{ $dm->type }}</td>
                    <td>
                        <span class="d-inline-block">
                            {{ $dm->short_description }}
                        </span>
                    </td>
                    <td>
                        <span class="d-inline-block">
                            {{ $dm->long_description }}
                        </span>
                    </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{ route('admin.setting.deliverymethod.edit', $dm->id) }}" class="dropdown-item"
                                    href="javascript:void(0);"> Edit</a>
                                <div type="button" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#confirm-delete" data-bs-deleteId="{{ $dm->id }}">
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
    <x-form.confirm-modal id="confirm-delete" method="delete" action="{{ route('admin.setting.deliverymethod.destroy', '') }}"
        varying="data-bs-deleteId">
        Bạn có thực sự muốn xóa phương thức vận chuyển này?
    </x-form.confirm-modal>
    {{-- END - DELETE CONFIRM MODAL --}}
@endsection
